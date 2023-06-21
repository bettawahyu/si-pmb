<?php
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use App\Models\Manage\Agama;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\AgamaRequest;
use Gate;

class AgamaController extends Controller
{

    public function index()
    {
        if (Gate::none(['agama_allow', 'agama_edit'])) {
            return redirect(route("manage.home"));
        }
        $dokre_data['sideBarActive'] = "agama";
		$dokre_data["sideBarActiveFolder"] = "dropdown_website";

        $tableData = Agama::orderBy("id")->get();
        return view("manage.agama.index")->with(compact('dokre_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['agama_allow'])) {
            return redirect(route("manage.agama.index"));
        }
        $dokre_data['sideBarActive'] = "agama";
		$dokre_data["sideBarActiveFolder"] = "dropdown_website";
        $dokre_data['formAction'] = route("manage.agama.store");


        return view("manage.agama.manage")->with(compact('dokre_data'));
    }

    public function store(AgamaRequest $request)
    {
        if (Gate::none(['agama_allow'])) {
            return redirect(route("manage.agama.index"));
        }
        $data = $request->all();

        $Agama = Agama::create($data);
        return redirect(route("manage.agama.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Agama = Agama::find($id);
        if (Gate::none(['agama_allow', 'agama_edit']) || !$Agama) {
            return redirect(route("manage.agama.index"));
        }

        $dokre_data['sideBarActive'] = "agama";
		$dokre_data["sideBarActiveFolder"] = "dropdown_website";
        $dokre_data['formAction'] = route("manage.agama.update", [$Agama->id]);


        $data = $Agama;
        return view("manage.agama.manage")->with(compact('dokre_data', 'data'));
    }

    public function update(AgamaRequest $request,$id)
    {
        if (Gate::none(['agama_allow', 'agama_edit'])) {
            return redirect(route("manage.agama.index"));
        }
        $data = $request->all();
        $Agama = Agama::find($id);
        $Agama->update($data);

        return redirect(route("manage.agama.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['agama_allow'])) {
            return redirect(route("manage.agama.index"));
        }
        Agama::destroy($request->idDel);
        return back();
    }



}

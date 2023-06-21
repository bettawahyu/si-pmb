<?php
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use App\Models\Manage\Frontpage;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\FrontpageRequest;
use Gate;

class FrontpageController extends Controller
{

    public function index()
    {
        if (Gate::none(['frontpage_allow', 'frontpage_edit'])) {
            return redirect(route("admin.home"));
        }
        $dokre_data['sideBarActive'] = "frontpage";
		$dokre_data["sideBarActiveFolder"] = "dropdown_settings";

        $Frontpage = Frontpage::first();
        if($Frontpage){
            return redirect(route("manage.frontpage.edit",[$Frontpage->id]));
        } else {
            return redirect(route("manage.frontpage.create"));
        }

        $tableData = Frontpage::orderByDesc("id")->get();
        return view("manage.frontpage.index")->with(compact('dokre_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['frontpage_allow'])) {
            return redirect(route("manage.frontpage.index"));
        }
        $dokre_data['sideBarActive'] = "frontpage";
		$dokre_data["sideBarActiveFolder"] = "dropdown_settings";
        $dokre_data['formAction'] = route("manage.frontpage.store");


        return view("manage.frontpage.manage")->with(compact('dokre_data'));
    }

    public function store(FrontpageRequest $request)
    {
        if (Gate::none(['frontpage_allow'])) {
            return redirect(route("manage.frontpage.index"));
        }
        $data = $request->all();

        $Frontpage = Frontpage::create($data);

        return redirect(route("manage.frontpage.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Frontpage = Frontpage::find($id);
        if (Gate::none(['frontpage_allow', 'frontpage_edit']) || !$Frontpage) {
            return redirect(route("manage.frontpage.index"));
        }

        $dokre_data['sideBarActive'] = "frontpage";
		$dokre_data["sideBarActiveFolder"] = "dropdown_settings";
        $dokre_data['formAction'] = route("manage.frontpage.update", [$Frontpage->id]);


        $data = $Frontpage;
        return view("manage.frontpage.manage")->with(compact('dokre_data', 'data'));
    }

    public function update(FrontpageRequest $request,$id)
    {
        if (Gate::none(['frontpage_allow', 'frontpage_edit'])) {
            return redirect(route("manage.frontpage.index"));
        }
        $data = $request->all();
        $Frontpage = Frontpage::find($id);
        $Frontpage->update($data);

        return back();
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['frontpage_allow'])) {
            return redirect(route("manage.frontpage.index"));
        }
        Frontpage::destroy($request->idDel);
        return back();
    }



}

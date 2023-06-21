<?php
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use App\Models\Manage\Kelas;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\KelasRequest;
use Gate;

class KelasController extends Controller
{

    public function index()
    {
        if (Gate::none(['kelas_allow', 'kelas_edit'])) {
            return redirect(route("manage.home"));
        }
        $dokre_data['sideBarActive'] = "kelas";
		$dokre_data["sideBarActiveFolder"] = "dropdown_website";

        $tableData = Kelas::orderBy("nama_kelas")->get();
        return view("manage.kelas.index")->with(compact('dokre_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['kelas_allow'])) {
            return redirect(route("manage.kelas.index"));
        }
        $dokre_data['sideBarActive'] = "kelas";
		$dokre_data["sideBarActiveFolder"] = "dropdown_website";
        $dokre_data['formAction'] = route("manage.kelas.store");


        return view("manage.kelas.manage")->with(compact('dokre_data'));
    }

    public function store(KelasRequest $request)
    {
        if (Gate::none(['kelas_allow'])) {
            return redirect(route("manage.kelas.index"));
        }
        $data = $request->all();

        $Kelas = Kelas::create($data);

        return redirect(route("manage.kelas.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Kelas = Kelas::find($id);
        if (Gate::none(['kelas_allow', 'kelas_edit']) || !$Kelas) {
            return redirect(route("manage.kelas.index"));
        }

        $dokre_data['sideBarActive'] = "kelas";
		$dokre_data["sideBarActiveFolder"] = "dropdown_website";
        $dokre_data['formAction'] = route("manage.kelas.update", [$Kelas->id]);


        $data = $Kelas;
        return view("manage.kelas.manage")->with(compact('dokre_data', 'data'));
    }

    public function update(KelasRequest $request,$id)
    {
        if (Gate::none(['kelas_allow', 'kelas_edit'])) {
            return redirect(route("manage.kelas.index"));
        }
        $data = $request->all();
        $Kelas = Kelas::find($id);
        $Kelas->update($data);

        return redirect(route("manage.kelas.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['kelas_allow'])) {
            return redirect(route("manage.kelas.index"));
        }
        Kelas::destroy($request->idDel);
        return back();
    }



}

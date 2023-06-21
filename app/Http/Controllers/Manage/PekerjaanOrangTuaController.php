<?php
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use App\Models\Manage\PekerjaanOrangTua;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\PekerjaanOrangTuaRequest;
use Gate;

class PekerjaanOrangTuaController extends Controller
{

    public function index()
    {
        if (Gate::none(['pekerjaan_orang_tua_allow', 'pekerjaan_orang_tua_edit'])) {
            return redirect(route("manage.home"));
        }
        $dokre_data['sideBarActive'] = "pekerjaan_orang_tua";
		$dokre_data["sideBarActiveFolder"] = "dropdown_website";

        $tableData = PekerjaanOrangTua::orderBy("jenis_pekerjaan")->get();
        return view("manage.pekerjaan_orang_tua.index")->with(compact('dokre_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['pekerjaan_orang_tua_allow'])) {
            return redirect(route("manage.pekerjaan_orang_tua.index"));
        }
        $dokre_data['sideBarActive'] = "pekerjaan_orang_tua";
		$dokre_data["sideBarActiveFolder"] = "dropdown_website";
        $dokre_data['formAction'] = route("manage.pekerjaan_orang_tua.store");


        return view("manage.pekerjaan_orang_tua.manage")->with(compact('dokre_data'));
    }

    public function store(PekerjaanOrangTuaRequest $request)
    {
        if (Gate::none(['pekerjaan_orang_tua_allow'])) {
            return redirect(route("manage.pekerjaan_orang_tua.index"));
        }
        $data = $request->all();

        $PekerjaanOrangTua = PekerjaanOrangTua::create($data);

        return redirect(route("manage.pekerjaan_orang_tua.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $PekerjaanOrangTua = PekerjaanOrangTua::find($id);
        if (Gate::none(['pekerjaan_orang_tua_allow', 'pekerjaan_orang_tua_edit']) || !$PekerjaanOrangTua) {
            return redirect(route("manage.pekerjaan_orang_tua.index"));
        }

        $dokre_data['sideBarActive'] = "pekerjaan_orang_tua";
		$dokre_data["sideBarActiveFolder"] = "dropdown_website";
        $dokre_data['formAction'] = route("manage.pekerjaan_orang_tua.update", [$PekerjaanOrangTua->id]);


        $data = $PekerjaanOrangTua;
        return view("manage.pekerjaan_orang_tua.manage")->with(compact('dokre_data', 'data'));
    }

    public function update(PekerjaanOrangTuaRequest $request,$id)
    {
        if (Gate::none(['pekerjaan_orang_tua_allow', 'pekerjaan_orang_tua_edit'])) {
            return redirect(route("manage.pekerjaan_orang_tua.index"));
        }
        $data = $request->all();
        $PekerjaanOrangTua = PekerjaanOrangTua::find($id);
        $PekerjaanOrangTua->update($data);

        return redirect(route("manage.pekerjaan_orang_tua.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['pekerjaan_orang_tua_allow'])) {
            return redirect(route("manage.pekerjaan_orang_tua.index"));
        }
        PekerjaanOrangTua::destroy($request->idDel);
        return back();
    }



}

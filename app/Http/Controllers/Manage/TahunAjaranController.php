<?php
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use App\Models\Manage\TahunAjaran;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\TahunAjaranRequest;
use Gate;

class TahunAjaranController extends Controller
{

    public function index()
    {
        if (Gate::none(['tahun_ajaran_allow', 'tahun_ajaran_edit'])) {
            return redirect(route("manage.home"));
        }
        $dokre_data['sideBarActive'] = "tahun_ajaran";
		$dokre_data["sideBarActiveFolder"] = "dropdown_website";

        $tableData = TahunAjaran::orderByDesc("id")->get();
        return view("manage.tahun_ajaran.index")->with(compact('dokre_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['tahun_ajaran_allow'])) {
            return redirect(route("manage.tahun_ajaran.index"));
        }
        $dokre_data['sideBarActive'] = "tahun_ajaran";
		$dokre_data["sideBarActiveFolder"] = "dropdown_website";
        $dokre_data['formAction'] = route("manage.tahun_ajaran.store");


		$status_aktif_all = TahunAjaran::STATUS_AKTIF_CONS;
        return view("manage.tahun_ajaran.manage")->with(compact('dokre_data','status_aktif_all'));
    }

    public function store(TahunAjaranRequest $request)
    {
        if (Gate::none(['tahun_ajaran_allow'])) {
            return redirect(route("manage.tahun_ajaran.index"));
        }
        $data = $request->all();

        $TahunAjaran = TahunAjaran::create($data);

        return redirect(route("manage.tahun_ajaran.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $TahunAjaran = TahunAjaran::find($id);
        if (Gate::none(['tahun_ajaran_allow', 'tahun_ajaran_edit']) || !$TahunAjaran) {
            return redirect(route("manage.tahun_ajaran.index"));
        }

        $dokre_data['sideBarActive'] = "tahun_ajaran";
		$dokre_data["sideBarActiveFolder"] = "dropdown_website";
        $dokre_data['formAction'] = route("manage.tahun_ajaran.update", [$TahunAjaran->id]);


		$status_aktif_all = TahunAjaran::STATUS_AKTIF_CONS;
        $data = $TahunAjaran;
        return view("manage.tahun_ajaran.manage")->with(compact('dokre_data', 'data','status_aktif_all'));
    }

    public function update(TahunAjaranRequest $request,$id)
    {
        if (Gate::none(['tahun_ajaran_allow', 'tahun_ajaran_edit'])) {
            return redirect(route("manage.tahun_ajaran.index"));
        }
        $data = $request->all();
        $TahunAjaran = TahunAjaran::find($id);
        $TahunAjaran->update($data);

        return redirect(route("manage.tahun_ajaran.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['tahun_ajaran_allow'])) {
            return redirect(route("manage.tahun_ajaran.index"));
        }
        TahunAjaran::destroy($request->idDel);
        return back();
    }



}

<?php
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use App\Models\Manage\UnggahDokumen;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\UnggahDokumenRequest;
use Gate;

class UnggahDokumenController extends Controller
{

    public function index()
    {
        if (Gate::none(['unggah_dokumen_allow', 'unggah_dokumen_edit'])) {
            return redirect(route("manage.home"));
        }
        $dokre_data['sideBarActive'] = "unggah_dokumen";
		$dokre_data["sideBarActiveFolder"] = "dropdown_website";

        $tableData = UnggahDokumen::orderBy("nama_dokumen")->get();
        return view("manage.unggah_dokumen.index")->with(compact('dokre_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['unggah_dokumen_allow'])) {
            return redirect(route("manage.unggah_dokumen.index"));
        }
        $dokre_data['sideBarActive'] = "unggah_dokumen";
		$dokre_data["sideBarActiveFolder"] = "dropdown_website";
        $dokre_data['formAction'] = route("manage.unggah_dokumen.store");


		$status_aktif_all = UnggahDokumen::STATUS_AKTIF_CONS;
        return view("manage.unggah_dokumen.manage")->with(compact('dokre_data','status_aktif_all'));
    }

    public function store(UnggahDokumenRequest $request)
    {
        if (Gate::none(['unggah_dokumen_allow'])) {
            return redirect(route("manage.unggah_dokumen.index"));
        }
        $data = $request->all();

        $UnggahDokumen = UnggahDokumen::create($data);

        return redirect(route("manage.unggah_dokumen.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $UnggahDokumen = UnggahDokumen::find($id);
        if (Gate::none(['unggah_dokumen_allow', 'unggah_dokumen_edit']) || !$UnggahDokumen) {
            return redirect(route("manage.unggah_dokumen.index"));
        }

        $dokre_data['sideBarActive'] = "unggah_dokumen";
		$dokre_data["sideBarActiveFolder"] = "dropdown_website";
        $dokre_data['formAction'] = route("manage.unggah_dokumen.update", [$UnggahDokumen->id]);


		$status_aktif_all = UnggahDokumen::STATUS_AKTIF_CONS;
        $data = $UnggahDokumen;
        return view("manage.unggah_dokumen.manage")->with(compact('dokre_data', 'data','status_aktif_all'));
    }

    public function update(UnggahDokumenRequest $request,$id)
    {
        if (Gate::none(['unggah_dokumen_allow', 'unggah_dokumen_edit'])) {
            return redirect(route("manage.unggah_dokumen.index"));
        }
        $data = $request->all();
        $UnggahDokumen = UnggahDokumen::find($id);
        $UnggahDokumen->update($data);

        return redirect(route("manage.unggah_dokumen.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['unggah_dokumen_allow'])) {
            return redirect(route("manage.unggah_dokumen.index"));
        }
        UnggahDokumen::destroy($request->idDel);
        return back();
    }



}

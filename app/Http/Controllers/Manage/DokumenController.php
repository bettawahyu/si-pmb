<?php
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use App\Models\Manage\Dokumen;
use App\Models\Manage\Pendaftar;
use App\Models\Manage\UnggahDokumen;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\DokumenRequest;
use Gate;

class DokumenController extends Controller
{

    public function index()
    {
        if (Gate::none(['dokumen_allow', 'dokumen_edit'])) {
            return redirect(route("manage.home"));
        }
        $dokre_data['sideBarActive'] = "Dokumen";
		$dokre_data["sideBarActiveFolder"] = "dropdown_pendaftaran";

        $peserta = Pendaftar::all();
        $tableData = Dokumen::orderBy("id")->get();
        return view("manage.dokumen_pendaftar.index")->with(compact('dokre_data', 'peserta', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['dokumen_allow'])) {
            return redirect(route("manage.dokumen_pendaftar.index"));
        }
        $dokre_data['sideBarActive'] = "Dokumen";
		$dokre_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
        $dokre_data['formAction'] = route("manage.dokumen_pendaftar.store");

        $datas = Dokumen::all();
        $data = UnggahDokumen::all()->sortBy('nama_dokumen')->pluck('nama_dokumen','id');
        return view("manage.dokumen_pendaftar.manage")->with(compact('dokre_data','data', '$datas'));
    }

    public function store(DokumenRequest $request)
    {
        if (Gate::none(['dokumen_allow'])) {
            return redirect(route("manage.dokumen_pendaftar.index"));
        }
        if($request->hasFile('dokumen'))
        {
            foreach ($request->file('dokumen') as $key=>$dok){

                Dokumen::create([
                    'id_pendaftar' => $request->input('id_pendaftar')[$key],
                    'id_unggah' => $request->input('id_unggah')[$key],
                    'dokumen' => $dok->getClientOriginalName(),
                ]);
                $dok->move(public_path('upload/dokumen'),$dok->getClientOriginalName());
            }
        }
        return redirect(route("manage.dokumen_pendaftar.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Dokumen = Dokumen::find($id);
        if (Gate::none(['dokumen_allow', 'dokumen_edit']) || !$Dokumen) {
            return redirect(route("manage.dokumen_pendaftar.index"));
        }

        $dokre_data['sideBarActive'] = "Dokumen";
		$dokre_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
        $dokre_data['formAction'] = route("manage.dokumen_pendaftar.update", [$Dokumen->id]);


        $data = $Dokumen;
        return view("manage.dokumen_pendaftar.manage")->with(compact('dokre_data', 'data'));
    }

    public function update(DokumenRequest $request,$id)
    {
        if (Gate::none(['dokumen_allow', 'dokumen_edit'])) {
            return redirect(route("manage.dokumen_pendaftar.index"));
        }
        $data = $request->all();
        $Dokumen = Dokumen::find($id);
        $Dokumen->update($data);

        return redirect(route("manage.dokumen_pendaftar.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['dokumen_allow'])) {
            return redirect(route("manage.dokumen_pendaftar.index"));
        }
        Dokumen::destroy($request->idDel);
        return back();
    }

    public function detail($id)
    {
        if (Gate::none(['dokumen_allow', 'dokumen_edit'])) {
            return redirect(route("manage.home"));
        }
        $dokre_data['sideBarActive'] = "Dokumen";
		$dokre_data["sideBarActiveFolder"] = "dropdown_pendaftaran";

        $detail = Pendaftar::find($id);
        $dokumen = Dokumen::where('id_pendaftar',$id)->get();
        $nama_dokumen= UnggahDokumen::all()->sortBy("nama_dokumen")->pluck("nama_dokumen", "id");;
        return view("manage.dokumen_pendaftar.detail")->with(compact('dokre_data', 'detail', 'dokumen','nama_dokumen'));
    }

    public function upload($id)
    {
        if (Gate::none(['dokumen_allow', 'dokumen_edit'])) {
            return redirect(route("manage.home"));
        }
        $dokre_data['sideBarActive'] = "Dokumen";
		$dokre_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
        $dokre_data['formAction'] = route("manage.dokumen_pendaftar.store");

        $detail = Pendaftar::find($id);
        //$dokumen = Dokumen::where('id_pendaftar',$id)->get();
        $nama_dok= UnggahDokumen::where('status_aktif','aktif')->get();;
        // dd($nama_dok);
        return view("manage.dokumen_pendaftar.upload")->with(compact('dokre_data', 'detail','nama_dok'));
    }

}

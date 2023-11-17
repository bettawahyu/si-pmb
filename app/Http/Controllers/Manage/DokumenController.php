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
        if (Gate::none(['dokumen_pendaftar_allow', 'dokumen_pendaftar_edit'])) {
            return redirect(route("manage.home"));
        }
         if (auth()->user()->role_id == 3) {
            $dokre_data['sideBarActive'] = "dokumen_pendaftar";
		    $dokre_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
            $dokre_data["fileInfo"] = Pendaftar::$dokre_file_info;
            $pendaftar = Pendaftar::where('email', auth()->user()->email)->first();
            if($pendaftar){
                // return redirect(route("manage.dokumen_pendaftar.index",[$pendaftar->id]));
                return redirect(route("manage.dokumen_pendaftar.detail",[$pendaftar->id]));
            } else {

                return redirect(route("manage.home"));
            }
         }
        $dokre_data['sideBarActive'] = "Dokumen";
		$dokre_data["sideBarActiveFolder"] = "dropdown_pendaftaran";

        $peserta = Pendaftar::all();
        $tableData = Dokumen::orderBy("id")->get()->unique('id_pendaftar');
        // dd($tableData);
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
                $doku = rand(100000,999999).".".$dok->getClientOriginalExtension();
                Dokumen::create([
                    'id_pendaftar' => $request->input('id_pendaftar')[$key],
                    'id_unggah' => $request->input('id_unggah')[$key],
                    'dokumen' => $doku,
                ]);
                $dok->move(public_path('upload/dokumen'),$doku);
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
        // dd($request);
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
        $nama_dok= UnggahDokumen::where('status_aktif','aktif')->get();;
        $cekdok = Dokumen::where('id_pendaftar',$id)->first();
        // dd($cekdok);
        if ($cekdok == NULL)
        {
        return view("manage.dokumen_pendaftar.upload")->with(compact('dokre_data', 'detail','nama_dok'));
        }
        else
        {
        return back()->with('error','Sudah Unggah Berkas, Hapus berkas yang lama.');
        }
    }

    public function hapus($id)
    {
        Dokumen::destroy($id);
        return back()->with('success','Data berhasil dihapus');
    }
}

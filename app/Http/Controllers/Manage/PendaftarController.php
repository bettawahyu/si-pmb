<?php
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */

namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use App\Models\Manage\Pendaftar;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\PendaftarRequest;
use Gate;
use Illuminate\Support\Facades\DB;
use App\Models\Manage\Agama;
use App\Models\Manage\JenisKelamin;
use App\Models\Manage\PekerjaanOrangTua;
use App\Models\Manage\Kelas;
use App\Models\Manage\TahunAjaran;
use App\Models\Manage\Sekolah;
class PendaftarController extends Controller
{

    public function index()
    {
        if (Gate::none(['pendaftar_allow', 'pendaftar_edit'])) {
            return redirect(route("manage.home"));
        }
        if (auth()->user()->role_id == 3) {
            $dokre_data['sideBarActive'] = "pendaftar";
		    $dokre_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
            $dokre_data["fileInfo"] = Pendaftar::$dokre_file_info;

            $pendaftar = Pendaftar::where('email', auth()->user()->email)->first();
            if($pendaftar){
                return redirect(route("manage.pendaftar.edit",[$pendaftar->id]));
            } else {
                return redirect(route("manage.home"));
            }
            return view("manage.pendaftar.index")->with(compact('dokre_data', "pendaftar"));
        }

        $dokre_data['sideBarActive'] = "pendaftar";
		$dokre_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
        $dokre_data["fileInfo"] = Pendaftar::$dokre_file_info;

        $tableData = Pendaftar::orderByDesc("id")->get();
        return view("manage.pendaftar.index")->with(compact('dokre_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['pendaftar_allow'])) {
            return redirect(route("manage.pendaftar.index"));
        }
        $dokre_data['sideBarActive'] = "pendaftar";
		$dokre_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
        $dokre_data['formAction'] = route("manage.pendaftar.store");
        $dokre_data["fileInfo"] = Pendaftar::$dokre_file_info;


        $urut = Pendaftar::count();
        $urut = $urut + 1;
        $nopen = "PSB-".date("y").sprintf("%03d",$urut);
		$agama_all = Agama::all()->sortBy("id")->pluck("nama_agama", "id");
		$jenis_kelamin_all = JenisKelamin::all()->sortBy("jenis_kelamin")->pluck("jenis_kelamin", "id");
		$pekerjaan_orang_tua_all = PekerjaanOrangTua::all()->sortBy("jenis_pekerjaan")->pluck("jenis_pekerjaan", "id");
		$kelas_all = Kelas::all()->sortBy("nama_kelas")->pluck("nama_kelas", "id");
		$tahun_ajaran_all = TahunAjaran::where('status_aktif','aktif')->pluck("tahun_ajaran", "id");
        return view("manage.pendaftar.manage")->with(compact('dokre_data','agama_all','jenis_kelamin_all','pekerjaan_orang_tua_all','kelas_all','tahun_ajaran_all','nopen'));
    }

    public function store(PendaftarRequest $request)
    {
        if (Gate::none(['pendaftar_allow'])) {
            return redirect(route("manage.pendaftar.index"));
        }
        $data = $request->all();

        $Pendaftar = Pendaftar::create($data);

        return redirect(route("manage.pendaftar.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Pendaftar = Pendaftar::find($id);
        if (Gate::none(['pendaftar_allow', 'pendaftar_edit']) || !$Pendaftar) {
            return redirect(route("manage.pendaftar.index"));
        }

        $dokre_data['sideBarActive'] = "pendaftar";
		$dokre_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
        $dokre_data['formAction'] = route("manage.pendaftar.update", [$Pendaftar->id]);
        $dokre_data["fileInfo"] = Pendaftar::$dokre_file_info;

        if (auth()->user()->role_id == 3) {
            $agama_all = DB::table('Agama')->orderBy("id")->pluck("nama_agama", "id");
		    $jenis_kelamin_all = DB::table('Jenis_Kelamin')->orderBy("jenis_kelamin")->pluck("jenis_kelamin", "id");
		    $pekerjaan_orang_tua_all = DB::table('Pekerjaan_Orang_Tua')->orderBy("jenis_pekerjaan")->pluck("jenis_pekerjaan", "id");
		    $kelas_all = DB::table('Kelas')->orderBy("nama_kelas")->pluck("nama_kelas", "id");
            $tahun_ajaran_all = DB::table('Tahun_Ajaran')->where('status_aktif','aktif')->pluck("tahun_ajaran","id");
        }
        else{
            $agama_all = Agama::all()->sortBy("nama_agama")->pluck("nama_agama", "id");
            $jenis_kelamin_all = JenisKelamin::all()->sortBy("jenis_kelamin")->pluck("jenis_kelamin", "id");
            $pekerjaan_orang_tua_all = PekerjaanOrangTua::all()->sortBy("jenis_pekerjaan")->pluck("jenis_pekerjaan", "id");
            $kelas_all = Kelas::all()->sortBy("nama_kelas")->pluck("nama_kelas", "id");
            $tahun_ajaran_all = TahunAjaran::where('status_aktif','aktif')->pluck("tahun_ajaran","id")->prepend('Please Select','');
        }
        $data = $Pendaftar;
        return view("manage.pendaftar.manage")->with(compact('dokre_data', 'data','agama_all','jenis_kelamin_all','pekerjaan_orang_tua_all','kelas_all','tahun_ajaran_all'));
    }

    public function update(PendaftarRequest $request,$id)
    {
        if (Gate::none(['pendaftar_allow', 'pendaftar_edit'])) {
            return redirect(route("manage.pendaftar.index"));
        }
        $data = $request->all();
        $Pendaftar = Pendaftar::find($id);
        $Pendaftar->update($data);

        return redirect(route("manage.pendaftar.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['pendaftar_allow'])) {
            return redirect(route("manage.pendaftar.index"));
        }
        $diterima = DB::table('diterima_siswa_yang_diterima_many')->where('selected_id', $request->idDel)->get();
        $ditolak = DB::table('ditolak_siswa_yang_ditolak_many')->where('selected_id', $request->idDel)->get();
        if($diterima->isEmpty() && $ditolak->isEmpty()){
            Pendaftar::destroy($request->idDel);
            return back();
        }else{
            return back()->with('error', 'Data tidak dapat dihapus karena data siswa ini sudah diterima/ditolak.');
        }


    }

    public function print($id)
    {
        if (Gate::none(['pendaftar_allow'])) {
            return redirect(route("manage.pendaftar.index"));
        }
        $dokre_data['sideBarActive'] = "pendaftar";
		$dokre_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
        $dokre_data["fileInfo"] = Pendaftar::$dokre_file_info;

        $kartu = Pendaftar::find($id);
        $sekolah = Sekolah::all()->first();
		$agama_all = Agama::all()->sortBy("id")->pluck("nama_agama", "id");
		$jenis_kelamin_all = JenisKelamin::all()->sortBy("jenis_kelamin")->pluck("jenis_kelamin", "id");
		$pekerjaan_orang_tua_all = PekerjaanOrangTua::all()->sortBy("jenis_pekerjaan")->pluck("jenis_pekerjaan", "id");
		$kelas_all = Kelas::all()->sortBy("nama_kelas")->pluck("nama_kelas", "id");
		$tahun_ajaran_all = TahunAjaran::where('status_aktif','aktif')->pluck("tahun_ajaran", "id");
        return view("manage.pendaftar.print")->with(compact('dokre_data','agama_all','jenis_kelamin_all','pekerjaan_orang_tua_all','kelas_all','tahun_ajaran_all','kartu','sekolah'));
    }

}

<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use App\Models\Manage\Pendaftar;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\PendaftarRequest;
use Gate;
use App\Models\Manage\Agama;
use App\Models\Manage\JenisKelamin;
use App\Models\Manage\PekerjaanOrangTua;
use App\Models\Manage\Kelas;
use App\Models\Manage\TahunAjaran;

class PendaftarController extends Controller
{

    public function index()
    {
        if (Gate::none(['pendaftar_allow', 'pendaftar_edit'])) {
            return redirect(route("manage.home"));
        }
        $admiko_data['sideBarActive'] = "pendaftar";
		$admiko_data["sideBarActiveFolder"] = "dropdown_pendaftaran";

        $tableData = Pendaftar::orderByDesc("id")->get();
        return view("manage.pendaftar.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['pendaftar_allow'])) {
            return redirect(route("manage.pendaftar.index"));
        }
        $admiko_data['sideBarActive'] = "pendaftar";
		$admiko_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
        $admiko_data['formAction'] = route("manage.pendaftar.store");


        $urut = Pendaftar::count();
        $urut = $urut + 1;
        $nopen = "PSB-".date("y").sprintf("%03d",$urut);
		$agama_all = Agama::all()->sortBy("nama_agama")->pluck("nama_agama", "id");
		$jenis_kelamin_all = JenisKelamin::all()->sortBy("jenis_kelamin")->pluck("jenis_kelamin", "id");
		$pekerjaan_orang_tua_all = PekerjaanOrangTua::all()->sortBy("jenis_pekerjaan")->pluck("jenis_pekerjaan", "id");
		$kelas_all = Kelas::all()->sortBy("nama_kelas")->pluck("nama_kelas", "id");
		$tahun_ajaran_all = TahunAjaran::where('status_aktif','aktif')->pluck("tahun_ajaran", "id");
        return view("manage.pendaftar.manage")->with(compact('admiko_data','agama_all','jenis_kelamin_all','pekerjaan_orang_tua_all','kelas_all','tahun_ajaran_all','nopen'));
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

        $admiko_data['sideBarActive'] = "pendaftar";
		$admiko_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
        $admiko_data['formAction'] = route("manage.pendaftar.update", [$Pendaftar->id]);


		$agama_all = Agama::all()->sortBy("nama_agama")->pluck("nama_agama", "id");
		$jenis_kelamin_all = JenisKelamin::all()->sortBy("jenis_kelamin")->pluck("jenis_kelamin", "id");
		$pekerjaan_orang_tua_all = PekerjaanOrangTua::all()->sortBy("jenis_pekerjaan")->pluck("jenis_pekerjaan", "id");
		$kelas_all = Kelas::all()->sortBy("nama_kelas")->pluck("nama_kelas", "id");
		$tahun_ajaran_all = TahunAjaran::all()->sortBy("tahun_ajaran")->pluck("tahun_ajaran", "id");
        $data = $Pendaftar;
        return view("manage.pendaftar.manage")->with(compact('admiko_data', 'data','agama_all','jenis_kelamin_all','pekerjaan_orang_tua_all','kelas_all','tahun_ajaran_all'));
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
        Pendaftar::destroy($request->idDel);
        return back();
    }



}
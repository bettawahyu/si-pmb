<?php
namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use App\Models\Manage\Diterima;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\DiterimaRequest;
use Gate;
use App\Models\Manage\Pendaftar;
use App\Models\Manage\Sekolah;
use App\Models\Manage\Kelas;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $admiko_data['sideBarActive'] = "home";
        $admiko_data['sideBarActiveFolder'] = "";

        $tableData = Diterima::orderByDesc("id")->get();
        $sekolah = Sekolah::orderby('id')->first();
        $pendaftar = Pendaftar::count();
        $lolos = DB::table('diterima_siswa_yang_diterima_many')->count();
        $tolak = DB::table('ditolak_siswa_yang_ditolak_many')->count();
        $diterima = DB::table('diterima_siswa_yang_diterima_many')->get();
        $i = 1;
        foreach($diterima as $key => $value){
            $siswa = Pendaftar::where('id', $value->selected_id)->first();
            $kelas = Kelas::where('id',$siswa->kelas)->first();
            $lulus = Diterima::where('id',$value->parent_id)->first();
            $datapendaftar[] = array(
                'no' => $i,
                'id' => $siswa->id,
                'nope' => $siswa->no_pendaftaran,
                'nama' => $siswa->nama_siswa,
                'telp' => $siswa->nomor_telp,
                'kelas' => $kelas->nama_kelas,
                'daftarulang' => $lulus->tanggal_daftar_ulang,
                'batasdaftar' => $lulus->batas_daftar_ulang,
                'parent_id' => $value->parent_id,
                'selected_id' => $value->id,
            );
            $i++;
        }
        if(empty($datapendaftar)){
            $datapendaftar = $tableData;
        }
        return view('manage.home.index')->with(compact('admiko_data', "tableData",'sekolah', 'datapendaftar','pendaftar','lolos','tolak'));
    }
}

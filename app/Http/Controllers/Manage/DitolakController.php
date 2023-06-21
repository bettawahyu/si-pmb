<?php
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use App\Models\Manage\Ditolak;
use App\Models\Manage\Kelas;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\DitolakRequest;
use Gate;
use Illuminate\Support\Facades\DB;
use App\Models\Manage\Pendaftar;

class DitolakController extends Controller
{

    public function index()
    {
        if (Gate::none(['ditolak_allow', 'ditolak_edit'])) {
            return redirect(route("manage.home"));
        }
        $dokre_data['sideBarActive'] = "ditolak";
		$dokre_data["sideBarActiveFolder"] = "dropdown_pendaftaran";

        $tableData = Ditolak::orderByDesc("id")->get();
        $ditolak = DB::table('ditolak_siswa_yang_ditolak_many')->get();
        $i = 1;
        foreach($ditolak as $key => $value){
            $siswa = Pendaftar::where('id', $value->selected_id)->first();
            $kelas = Kelas::where('id',$siswa->kelas)->first();
            $lulus = Ditolak::where('id',$value->parent_id)->first();
            $dataditolak[] = array(
                'no' => $i,
                'id' => $siswa->id,
                'nope' => $siswa->no_pendaftaran,
                'nama' => $siswa->nama_siswa,
                'kelas' => $kelas->nama_kelas,
                'status' => $lulus->status_penolakan,
                'gagal' => $lulus->created_at,
                'parent_id' => $value->parent_id,
                'selected_id' => $value->id,
            );
            $i++;
        }
        if(empty($dataditolak)){
            DB::statement("SET foreign_key_checks=0");
            Ditolak::truncate();
            DB::statement("SET foreign_key_checks=1");
            $dataditolak = $tableData;
        }
        $status_penolakan_all = Ditolak::STATUS_PENOLAKAN_CONS;
        return view("manage.ditolak.index")->with(compact('dokre_data', "tableData",'dataditolak','status_penolakan_all'));
    }

    public function create()
    {
        if (Gate::none(['ditolak_allow'])) {
            return redirect(route("manage.ditolak.index"));
        }
        $dokre_data['sideBarActive'] = "ditolak";
		$dokre_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
        $dokre_data['formAction'] = route("manage.ditolak.store");

        $ditolak = DB::table('ditolak_siswa_yang_ditolak_many')->get();
        if(!empty($ditolak)){
            $pendaftar_all = DB::table('pendaftar')
                   //function($cekid) digunakan untuk subquery WhereNotIn
                    ->whereNotIn('id', function($cekid){$cekid->select('selected_id')->from('diterima_siswa_yang_diterima_many');})
                    ->whereNotIn('id', function($cekid){$cekid->select('selected_id')->from('ditolak_siswa_yang_ditolak_many');})
                    ->whereNull('deleted_at')
                    ->orderBy('nama_siswa')
                    ->pluck("nama_siswa", "id");
        }else{
            $pendaftar_all = Pendaftar::all()->sortBy("nama_siswa")->pluck("nama_siswa", "id");
        }
		$status_penolakan_all = Ditolak::STATUS_PENOLAKAN_CONS;
        return view("manage.ditolak.manage")->with(compact('dokre_data','pendaftar_all','status_penolakan_all'));
    }

    public function store(DitolakRequest $request)
    {
        if (Gate::none(['ditolak_allow'])) {
            return redirect(route("manage.ditolak.index"));
        }
        $data = $request->all();

        $Ditolak = Ditolak::create($data);
        $Ditolak->siswa_yang_ditolak_many()->sync($request->input("siswa_yang_ditolak", []));
        return redirect(route("manage.ditolak.index"));
        
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Ditolak = Ditolak::find($id);
        if (Gate::none(['ditolak_allow', 'ditolak_edit']) || !$Ditolak) {
            return redirect(route("manage.ditolak.index"));
        }

        $dokre_data['sideBarActive'] = "ditolak";
		$dokre_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
        $dokre_data['formAction'] = route("manage.ditolak.update", [$Ditolak->id]);


		$pendaftar_all = Pendaftar::all()->sortBy("nama_siswa")->pluck("nama_siswa", "id");
		$perubahan_status_all = Ditolak::PERUBAHAN_STATUS_CONS;
        $data = $Ditolak;
        return view("manage.ditolak.manage")->with(compact('dokre_data', 'data','pendaftar_all','perubahan_status_all'));
    }

    public function update(DitolakRequest $request,$id)
    {
        if (Gate::none(['ditolak_allow', 'ditolak_edit'])) {
            return redirect(route("manage.ditolak.index"));
        }
        $data = $request->all();
        $Ditolak = Ditolak::find($id);
        $Ditolak->update($data);
        $Ditolak->siswa_yang_ditolak_many()->sync($request->input("siswa_yang_ditolak", []));
        return redirect(route("manage.ditolak.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['ditolak_allow'])) {
            return redirect(route("manage.ditolak.index"));
        }
        $request= $request->all();
        if(!empty($request['selid'])){
        $cekid = DB::table('ditolak_siswa_yang_ditolak_many')->whereIn('id', $request['selid'])->distinct()->get('parent_id');
        foreach($cekid as $key=>$value){
            $cekid[$key] = $value->parent_id;
        }
        DB::table('ditolak_siswa_yang_ditolak_many')->whereIn('id', $request['selid'])->delete();
        return back()->with('success', 'Data berhasil dihapus');
        }else{
            return back()->with('error', 'Centang kolom yang hendak dihapus!');
        }
    }



}

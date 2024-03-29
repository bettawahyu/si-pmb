<?php
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use App\Models\Manage\Diterima;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\DiterimaRequest;
use Gate;
use App\Models\Manage\Pendaftar;
use App\Models\Manage\Kelas;
use Illuminate\Support\Facades\DB;

class DiterimaController extends Controller
{

    public function index()
    {
        if (Gate::none(['diterima_allow', 'diterima_edit'])) {
            return redirect(route("manage.home"));
        }
        $dokre_data['sideBarActive'] = "diterima";
		$dokre_data["sideBarActiveFolder"] = "dropdown_pendaftaran";

        $tableData = Diterima::orderByDesc("id")->get();
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
                'kelas' => $kelas->nama_kelas,
                'daftarulang' => $lulus->tanggal_daftar_ulang,
                'batasdaftar' => $lulus->batas_daftar_ulang,
                'parent_id' => $value->parent_id,
                'selected_id' => $value->id,
            );
            $i++;
        }
        if(empty($datapendaftar)){
            DB::statement("SET foreign_key_checks=0");
            Diterima::truncate();
            DB::statement("SET foreign_key_checks=1");
            $datapendaftar = $tableData;
        }
        return view("manage.diterima.index")->with(compact('dokre_data', "tableData", 'datapendaftar'));
    }

    public function create()
    {
        if (Gate::none(['diterima_allow'])) {
            return redirect(route("manage.diterima.index"));
        }
        $dokre_data['sideBarActive'] = "diterima";
		$dokre_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
        $dokre_data['formAction'] = route("manage.diterima.store");

        $diterima = DB::table('diterima_siswa_yang_diterima_many')->get();
        if(!empty($diterima)){
            $pendaftar_all = DB::table('pendaftar')
                   //function($cekid) digunakan untuk subquery WhereNotIn
                    ->whereNotNull('nama_ayah')
                    ->whereNotNull('tempat_lahir')
                    ->whereNotNull('nama_ibu')
                    ->whereNotIn('id', function($cekid){$cekid->select('selected_id')->from('diterima_siswa_yang_diterima_many');})
                    ->whereNotIn('id', function($cekid){$cekid->select('selected_id')->from('ditolak_siswa_yang_ditolak_many');})
                    ->whereNull('deleted_at')
                    ->orderBy('nama_siswa')
                    ->pluck("nama_siswa", "id");
        }else{
            $pendaftar_all = Pendaftar::all()->whereNotNull('tempat_lahir','nama_ibu')->sortBy("nama_siswa")->pluck("nama_siswa", "id");
        }
        return view("manage.diterima.manage")->with(compact('dokre_data','pendaftar_all'));
    }

    public function store(DiterimaRequest $request)
    {
        if (Gate::none(['diterima_allow'])) {
            return redirect(route("manage.diterima.index"));
        }
        $data = $request->all();

        $Diterima = Diterima::create($data);
        $Diterima->siswa_yang_diterima_many()->sync($request->input("siswa_yang_diterima", []));
		if($request->input("siswa_yang_diterima")){ 
            foreach($request->input("siswa_yang_diterima") as $key=>$id) { 
                $Diterima->siswa_yang_diterima_many()->updateExistingPivot($id, ["dokre_order"=>$key]); 
            }
        }
        return redirect(route("manage.diterima.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Diterima = Diterima::find($id);
        if (Gate::none(['diterima_allow', 'diterima_edit']) || !$Diterima) {
            return redirect(route("manage.diterima.index"));
        }

        $dokre_data['sideBarActive'] = "diterima";
		$dokre_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
        $dokre_data['formAction'] = route("manage.diterima.update", [$Diterima->id]);


		$pendaftar_all = Pendaftar::all()->sortBy("nama_siswa")->pluck("nama_siswa", "id");
        $data = $Diterima;
        return view("manage.diterima.manage")->with(compact('dokre_data', 'data','pendaftar_all'));
    }

    public function update(DiterimaRequest $request,$id)
    {
        if (Gate::none(['diterima_allow', 'diterima_edit'])) {
            return redirect(route("manage.diterima.index"));
        }
        $data = $request->all();
        $Diterima = Diterima::find($id);
        $Diterima->update($data);
        $Diterima->siswa_yang_diterima_many()->sync($request->input("siswa_yang_diterima", []));
		if($request->input("siswa_yang_diterima")){ foreach($request->input("siswa_yang_diterima") as $key=>$id) { $Diterima->siswa_yang_diterima_many()->updateExistingPivot($id, ["dokre_order"=>$key]); }}
        return redirect(route("manage.diterima.index"));
    }

    public function MultipleDelete(Request $request)
    {
        if (Gate::none(['diterima_allow'])) {
            return redirect(route("manage.diterima.index"));
        }
        $request= $request->all();
        dd($request);
        // Diterima::destroy($request->idDel);
        return back();
    }
    public function destroy(Request $request)
    {
        if (Gate::none(['diterima_allow'])) {
            return redirect(route("manage.diterima.index"));
        }
        $request= $request->all();
        if(!empty($request['selid'])){
        $cekid = DB::table('diterima_siswa_yang_diterima_many')->whereIn('id', $request['selid'])->distinct()->get('parent_id');
        foreach($cekid as $key=>$value){
            $cekid[$key] = $value->parent_id;
        }
        DB::table('diterima_siswa_yang_diterima_many')->whereIn('id', $request['selid'])->delete();
        return back()->with('success', 'Data berhasil dihapus');
        }else{
            return back()->with('error', 'Centang kolom yang hendak dihapus!');
        }
    }



}

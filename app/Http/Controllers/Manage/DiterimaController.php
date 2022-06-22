<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
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
        $admiko_data['sideBarActive'] = "diterima";
		$admiko_data["sideBarActiveFolder"] = "dropdown_pendaftaran";

        $tableData = Diterima::orderByDesc("id")->get();
        $diterima = DB::table('diterima_siswa_yang_diterima_many')->get();
        foreach($diterima as $key => $value){
            $siswa = Pendaftar::where('id', $value->selected_id)->first();
            $kelas = Kelas::where('id',$siswa->kelas)->first();
            $lulus = Diterima::where('id',$value->parent_id)->first();
            $datapendaftar[] = array(
                'id' => $siswa->id,
                'nope' => $siswa->no_pendaftaran,
                'nama' => $siswa->nama_siswa,
                'kelas' => $kelas->nama_kelas,
                'daftarulang' => $lulus->tanggal_daftar_ulang,
                'batasdaftar' => $lulus->batas_daftar_ulang,
            );
        }
        if(empty($datapendaftar)){
            $datapendaftar = $tableData;
        }
        // dd($datapendaftar);
        return view("manage.diterima.index")->with(compact('admiko_data', "tableData", 'datapendaftar'));
    }

    public function create()
    {
        if (Gate::none(['diterima_allow'])) {
            return redirect(route("manage.diterima.index"));
        }
        $admiko_data['sideBarActive'] = "diterima";
		$admiko_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
        $admiko_data['formAction'] = route("manage.diterima.store");
        $diterima = DB::table('diterima_siswa_yang_diterima_many')->get();
        foreach($diterima as $key => $value){
            $siswa = DB::table('diterima_siswa_yang_diterima_many')
            ->where('parent', $value->selected_id)
            ->where();
            $datapendaftar[] = array(
                'ids' => $value->selected_id,
                'parent' => $value->parent_id,
            );
        }
       // dd($datapendaftar);
        if(!empty($datapendaftar)){
            $pendaftar_all = Pendaftar::whereNotIn('id',[$datapendaftar])
            ->whereNotIn
            ->pluck("nama_siswa", "id");
        }else{
            $pendaftar_all = Pendaftar::all()->sortBy("nama_siswa")->pluck("nama_siswa", "id");
        }
        return view("manage.diterima.manage")->with(compact('admiko_data','pendaftar_all'));
    }

    public function store(DiterimaRequest $request)
    {
        if (Gate::none(['diterima_allow'])) {
            return redirect(route("manage.diterima.index"));
        }
        $data = $request->all();

        $Diterima = Diterima::create($data);
        $Diterima->siswa_yang_diterima_many()->sync($request->input("siswa_yang_diterima", []));
		if($request->input("siswa_yang_diterima")){ foreach($request->input("siswa_yang_diterima") as $key=>$id) { $Diterima->siswa_yang_diterima_many()->updateExistingPivot($id, ["admiko_order"=>$key]); }}
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

        $admiko_data['sideBarActive'] = "diterima";
		$admiko_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
        $admiko_data['formAction'] = route("manage.diterima.update", [$Diterima->id]);


		$pendaftar_all = Pendaftar::all()->sortBy("nama_siswa")->pluck("nama_siswa", "id");

        $data = $Diterima;
        return view("manage.diterima.manage")->with(compact('admiko_data', 'data','pendaftar_all'));
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
		if($request->input("siswa_yang_diterima")){ foreach($request->input("siswa_yang_diterima") as $key=>$id) { $Diterima->siswa_yang_diterima_many()->updateExistingPivot($id, ["admiko_order"=>$key]); }}
        return redirect(route("manage.diterima.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['diterima_allow'])) {
            return redirect(route("manage.diterima.index"));
        }
        Diterima::destroy($request->idDel);
        return back();
    }



}

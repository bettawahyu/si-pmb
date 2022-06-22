<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use App\Models\Manage\Ditolak;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\DitolakRequest;
use Gate;
use App\Models\Manage\Pendaftar;

class DitolakController extends Controller
{

    public function index()
    {
        if (Gate::none(['ditolak_allow', 'ditolak_edit'])) {
            return redirect(route("manage.home"));
        }
        $admiko_data['sideBarActive'] = "ditolak";
		$admiko_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
        
        $tableData = Ditolak::orderByDesc("id")->get();
        return view("manage.ditolak.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['ditolak_allow'])) {
            return redirect(route("manage.ditolak.index"));
        }
        $admiko_data['sideBarActive'] = "ditolak";
		$admiko_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
        $admiko_data['formAction'] = route("manage.ditolak.store");
        
        
		$pendaftar_all = Pendaftar::all()->sortBy("nama_siswa")->pluck("nama_siswa", "id");
		$perubahan_status_all = Ditolak::PERUBAHAN_STATUS_CONS;
        return view("manage.ditolak.manage")->with(compact('admiko_data','pendaftar_all','perubahan_status_all'));
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

        $admiko_data['sideBarActive'] = "ditolak";
		$admiko_data["sideBarActiveFolder"] = "dropdown_pendaftaran";
        $admiko_data['formAction'] = route("manage.ditolak.update", [$Ditolak->id]);
        
        
		$pendaftar_all = Pendaftar::all()->sortBy("nama_siswa")->pluck("nama_siswa", "id");
		$perubahan_status_all = Ditolak::PERUBAHAN_STATUS_CONS;
        $data = $Ditolak;
        return view("manage.ditolak.manage")->with(compact('admiko_data', 'data','pendaftar_all','perubahan_status_all'));
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
        Ditolak::destroy($request->idDel);
        return back();
    }
    
    
    
}

<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use App\Models\Manage\TahunAjaran;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\TahunAjaranRequest;
use Gate;

class TahunAjaranController extends Controller
{

    public function index()
    {
        if (Gate::none(['tahun_ajaran_allow', 'tahun_ajaran_edit'])) {
            return redirect(route("manage.home"));
        }
        $admiko_data['sideBarActive'] = "tahun_ajaran";
		$admiko_data["sideBarActiveFolder"] = "dropdown_settings";
        
        $tableData = TahunAjaran::orderByDesc("id")->get();
        return view("manage.tahun_ajaran.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['tahun_ajaran_allow'])) {
            return redirect(route("manage.tahun_ajaran.index"));
        }
        $admiko_data['sideBarActive'] = "tahun_ajaran";
		$admiko_data["sideBarActiveFolder"] = "dropdown_settings";
        $admiko_data['formAction'] = route("manage.tahun_ajaran.store");
        
        
		$status_aktif_all = TahunAjaran::STATUS_AKTIF_CONS;
        return view("manage.tahun_ajaran.manage")->with(compact('admiko_data','status_aktif_all'));
    }

    public function store(TahunAjaranRequest $request)
    {
        if (Gate::none(['tahun_ajaran_allow'])) {
            return redirect(route("manage.tahun_ajaran.index"));
        }
        $data = $request->all();
        
        $TahunAjaran = TahunAjaran::create($data);
        
        return redirect(route("manage.tahun_ajaran.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $TahunAjaran = TahunAjaran::find($id);
        if (Gate::none(['tahun_ajaran_allow', 'tahun_ajaran_edit']) || !$TahunAjaran) {
            return redirect(route("manage.tahun_ajaran.index"));
        }

        $admiko_data['sideBarActive'] = "tahun_ajaran";
		$admiko_data["sideBarActiveFolder"] = "dropdown_settings";
        $admiko_data['formAction'] = route("manage.tahun_ajaran.update", [$TahunAjaran->id]);
        
        
		$status_aktif_all = TahunAjaran::STATUS_AKTIF_CONS;
        $data = $TahunAjaran;
        return view("manage.tahun_ajaran.manage")->with(compact('admiko_data', 'data','status_aktif_all'));
    }

    public function update(TahunAjaranRequest $request,$id)
    {
        if (Gate::none(['tahun_ajaran_allow', 'tahun_ajaran_edit'])) {
            return redirect(route("manage.tahun_ajaran.index"));
        }
        $data = $request->all();
        $TahunAjaran = TahunAjaran::find($id);
        $TahunAjaran->update($data);
        
        return redirect(route("manage.tahun_ajaran.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['tahun_ajaran_allow'])) {
            return redirect(route("manage.tahun_ajaran.index"));
        }
        TahunAjaran::destroy($request->idDel);
        return back();
    }
    
    
    
}

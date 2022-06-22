<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use App\Models\Manage\JenisKelamin;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\JenisKelaminRequest;
use Gate;

class JenisKelaminController extends Controller
{

    public function index()
    {
        if (Gate::none(['jenis_kelamin_allow', 'jenis_kelamin_edit'])) {
            return redirect(route("manage.home"));
        }
        $admiko_data['sideBarActive'] = "jenis_kelamin";
		$admiko_data["sideBarActiveFolder"] = "dropdown_settings";
        
        $tableData = JenisKelamin::orderBy("id")->get();
        return view("manage.jenis_kelamin.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['jenis_kelamin_allow'])) {
            return redirect(route("manage.jenis_kelamin.index"));
        }
        $admiko_data['sideBarActive'] = "jenis_kelamin";
		$admiko_data["sideBarActiveFolder"] = "dropdown_settings";
        $admiko_data['formAction'] = route("manage.jenis_kelamin.store");
        
        
        return view("manage.jenis_kelamin.manage")->with(compact('admiko_data'));
    }

    public function store(JenisKelaminRequest $request)
    {
        if (Gate::none(['jenis_kelamin_allow'])) {
            return redirect(route("manage.jenis_kelamin.index"));
        }
        $data = $request->all();
        
        $JenisKelamin = JenisKelamin::create($data);
        
        return redirect(route("manage.jenis_kelamin.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $JenisKelamin = JenisKelamin::find($id);
        if (Gate::none(['jenis_kelamin_allow', 'jenis_kelamin_edit']) || !$JenisKelamin) {
            return redirect(route("manage.jenis_kelamin.index"));
        }

        $admiko_data['sideBarActive'] = "jenis_kelamin";
		$admiko_data["sideBarActiveFolder"] = "dropdown_settings";
        $admiko_data['formAction'] = route("manage.jenis_kelamin.update", [$JenisKelamin->id]);
        
        
        $data = $JenisKelamin;
        return view("manage.jenis_kelamin.manage")->with(compact('admiko_data', 'data'));
    }

    public function update(JenisKelaminRequest $request,$id)
    {
        if (Gate::none(['jenis_kelamin_allow', 'jenis_kelamin_edit'])) {
            return redirect(route("manage.jenis_kelamin.index"));
        }
        $data = $request->all();
        $JenisKelamin = JenisKelamin::find($id);
        $JenisKelamin->update($data);
        
        return redirect(route("manage.jenis_kelamin.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['jenis_kelamin_allow'])) {
            return redirect(route("manage.jenis_kelamin.index"));
        }
        JenisKelamin::destroy($request->idDel);
        return back();
    }
    
    
    
}

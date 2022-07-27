<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use App\Models\Manage\Sekolah;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\SekolahRequest;
use Gate;
use Illuminate\Support\Facades\DB;


class SekolahController extends Controller
{

    public function index()
    {
        if (Gate::none(['sekolah_allow', 'sekolah_edit'])) {
            return redirect(route("manage.home"));
        }
        $admiko_data['sideBarActive'] = "sekolah";
		$admiko_data["sideBarActiveFolder"] = "dropdown_settings";
        $admiko_data["fileInfo"] = Sekolah::$admiko_file_info;
        $Sekolah = Sekolah::first();
        if($Sekolah){
            return redirect(route("manage.sekolah.edit",[$Sekolah->id]));
        } else {
            return redirect(route("manage.sekolah.create"));
        }

        $tableData = Sekolah::orderByDesc("id")->get();
        return view("manage.sekolah.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['sekolah_allow'])) {
            return redirect(route("manage.sekolah.manage"));
        }
        $admiko_data['sideBarActive'] = "sekolah";
		$admiko_data["sideBarActiveFolder"] = "dropdown_settings";
        $admiko_data['formAction'] = route("manage.sekolah.store");
        $admiko_data["fileInfo"] = Sekolah::$admiko_file_info;

        return view("manage.sekolah.manage")->with(compact('admiko_data'));
    }

    public function store(sekolahRequest $request)
    {
        if (Gate::none(['sekolah_allow'])) {
            return redirect(route("manage.sekolah.manage"));
        }
        $data = $request->all();

        $sekolah = Sekolah::create($data);

        return redirect(route("manage.sekolah.manage"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $sekolah = Sekolah::find($id);
        if (Gate::none(['sekolah_allow', 'sekolah_edit']) || !$sekolah) {
            return redirect(route("manage.sekolah.manage"));
        }

        $admiko_data['sideBarActive'] = "sekolah";
		$admiko_data["sideBarActiveFolder"] = "dropdown_settings";
        $admiko_data['formAction'] = route("manage.sekolah.update", [$sekolah->id]);
        $admiko_data["fileInfo"] = Sekolah::$admiko_file_info;
        $data = $sekolah;
        return view("manage.sekolah.manage")->with(compact('admiko_data', 'data'));
    }

    public function update(SekolahRequest $request,$id)
    {
        if (Gate::none(['sekolah_allow', 'sekolah_edit'])) {
            return redirect(route("manage.sekolah.index"));
        }
        $data = $request->all();
        $sekolah = Sekolah::find($id);
        $sekolah->update($data);

        return redirect(route("manage.sekolah.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['sekolah_allow'])) {
            return redirect(route("manage.sekolah.index"));
        }

    }



}

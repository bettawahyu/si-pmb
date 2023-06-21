<?php
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
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
        $dokre_data['sideBarActive'] = "sekolah";
		$dokre_data["sideBarActiveFolder"] = "dropdown_settings";
        $dokre_data["fileInfo"] = Sekolah::$dokre_file_info;
        $Sekolah = Sekolah::first();
        if($Sekolah){
            return redirect(route("manage.sekolah.edit",[$Sekolah->id]));
        } else {
            return redirect(route("manage.sekolah.create"));
        }

        $tableData = Sekolah::orderByDesc("id")->get();
        return view("manage.sekolah.index")->with(compact('dokre_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['sekolah_allow'])) {
            return redirect(route("manage.sekolah.manage"));
        }
        $dokre_data['sideBarActive'] = "sekolah";
		$dokre_data["sideBarActiveFolder"] = "dropdown_settings";
        $dokre_data['formAction'] = route("manage.sekolah.store");
        $dokre_data["fileInfo"] = Sekolah::$dokre_file_info;

        return view("manage.sekolah.manage")->with(compact('dokre_data'));
    }

    public function store(sekolahRequest $request)
    {
        if (Gate::none(['sekolah_allow'])) {
            return redirect(route("manage.sekolah.manage"));
        }
        $data = $request->all();

        $sekolah = Sekolah::create($data);

        return redirect(route("manage.sekolah.index"));
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

        $dokre_data['sideBarActive'] = "sekolah";
		$dokre_data["sideBarActiveFolder"] = "dropdown_settings";
        $dokre_data['formAction'] = route("manage.sekolah.update", [$sekolah->id]);
        $dokre_data["fileInfo"] = Sekolah::$dokre_file_info;
        $data = $sekolah;
        return view("manage.sekolah.manage")->with(compact('dokre_data', 'data'));
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

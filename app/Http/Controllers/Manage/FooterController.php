<?php
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use App\Models\Manage\Footer;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\FooterRequest;
use Gate;

class FooterController extends Controller
{

    public function index()
    {
        if (Gate::none(['footer_allow', 'footer_edit'])) {
            return redirect(route("admin.home"));
        }
        $dokre_data['sideBarActive'] = "footer";
		$dokre_data["sideBarActiveFolder"] = "dropdown_settings";

        $Footer = Footer::first();
        if($Footer){
            return redirect(route("manage.footer.edit",[$Footer->id]));
        } else {
            return redirect(route("manage.footer.create"));
        }

        $tableData = Footer::orderByDesc("id")->get();
        return view("manage.footer.index")->with(compact('dokre_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['footer_allow'])) {
            return redirect(route("manage.footer.index"));
        }
        $dokre_data['sideBarActive'] = "footer";
		$dokre_data["sideBarActiveFolder"] = "dropdown_settings";
        $dokre_data['formAction'] = route("manage.footer.store");


        return view("manage.footer.manage")->with(compact('dokre_data'));
    }

    public function store(FooterRequest $request)
    {
        if (Gate::none(['footer_allow'])) {
            return redirect(route("manage.footer.index"));
        }
        $data = $request->all();

        $Footer = Footer::create($data);

        return redirect(route("manage.footer.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Footer = Footer::find($id);
        if (Gate::none(['footer_allow', 'footer_edit']) || !$Footer) {
            return redirect(route("manage.footer.index"));
        }

        $dokre_data['sideBarActive'] = "footer";
		$dokre_data["sideBarActiveFolder"] = "dropdown_settings";
        $dokre_data['formAction'] = route("manage.footer.update", [$Footer->id]);


        $data = $Footer;
        return view("manage.footer.manage")->with(compact('dokre_data', 'data'));
    }

    public function update(FooterRequest $request,$id)
    {
        if (Gate::none(['footer_allow', 'footer_edit'])) {
            return redirect(route("manage.footer.index"));
        }
        $data = $request->all();
        $Footer = Footer::find($id);
        $Footer->update($data);

        return back();
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['footer_allow'])) {
            return redirect(route("manage.footer.index"));
        }
        Footer::destroy($request->idDel);
        return back();
    }



}

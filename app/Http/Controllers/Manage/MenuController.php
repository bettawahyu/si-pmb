<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2022
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use App\Models\Manage\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\MenuRequest;
use Gate;

class MenuController extends Controller
{

    public function index()
    {
        if (Gate::none(['menu_allow', 'menu_edit'])) {
            return redirect(route("manage.home"));
        }
        $admiko_data['sideBarActive'] = "Menu";
		$admiko_data["sideBarActiveFolder"] = "dropdown_settings";

        $tableData = Menu::orderBy("id")->get();
        return view("manage.menu.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['menu_allow'])) {
            return redirect(route("manage.menu.index"));
        }
        $admiko_data['sideBarActive'] = "Menu";
		$admiko_data["sideBarActiveFolder"] = "dropdown_settings";
        $admiko_data['formAction'] = route("manage.menu.store");


        return view("manage.menu.manage")->with(compact('admiko_data'));
    }

    public function store(MenuRequest $request)
    {
        if (Gate::none(['menu_allow'])) {
            return redirect(route("manage.menu.index"));
        }
        $data = $request->all();

        $Menu = Menu::create($data);

        return redirect(route("manage.menu.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Menu = Menu::find($id);
        if (Gate::none(['menu_allow', 'menu_edit']) || !$Menu) {
            return redirect(route("manage.menu.index"));
        }

        $admiko_data['sideBarActive'] = "Menu";
		$admiko_data["sideBarActiveFolder"] = "dropdown_settings";
        $admiko_data['formAction'] = route("manage.menu.update", [$Menu->id]);


        $data = $Menu;
        return view("manage.menu.manage")->with(compact('admiko_data', 'data'));
    }

    public function update(MenuRequest $request,$id)
    {
        if (Gate::none(['menu_allow', 'menu_edit'])) {
            return redirect(route("manage.menu.index"));
        }
        $data = $request->all();
        $Menu = Menu::find($id);
        $Menu->update($data);

        return redirect(route("manage.menu.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['menu_allow'])) {
            return redirect(route("manage.menu.index"));
        }
        Menu::destroy($request->idDel);
        return back();
    }



}

<?php
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
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
        $dokre_data['sideBarActive'] = "Menu";
		$dokre_data["sideBarActiveFolder"] = "dropdown_settings";

        $tableData = Menu::orderBy("id")->get();
<<<<<<< Updated upstream

        return view("manage.menu.index")->with(compact('admiko_data', "tableData"));
=======
        return view("manage.menu.index")->with(compact('dokre_data', "tableData"));
>>>>>>> Stashed changes
    }

    public function create()
    {
        if (Gate::none(['menu_allow'])) {
            return redirect(route("manage.menu.index"));
        }
        $dokre_data['sideBarActive'] = "Menu";
		$dokre_data["sideBarActiveFolder"] = "dropdown_settings";
        $dokre_data['formAction'] = route("manage.menu.store");

<<<<<<< Updated upstream
        $aktif_all = Menu::AKTIF_CONS;
        return redirect(route("manage.menu.index"));
        // return view("manage.menu.index")->with(compact('admiko_data','aktif_all'));
=======

        return view("manage.menu.manage")->with(compact('dokre_data'));
>>>>>>> Stashed changes
    }

    public function store(MenuRequest $request)
    {
        if (Gate::none(['menu_allow'])) {
            return redirect(route("manage.menu.index"));
        }
        $data = $request->all();

        // $Menu = Menu::create($data);

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

        $dokre_data['sideBarActive'] = "Menu";
		$dokre_data["sideBarActiveFolder"] = "dropdown_settings";
        $dokre_data['formAction'] = route("manage.menu.update", [$Menu->id]);

        $aktif_all = Menu::AKTIF_CONS;
        $data = $Menu;
<<<<<<< Updated upstream
        return view("manage.menu.manage")->with(compact('admiko_data', 'data','aktif_all'));
=======
        return view("manage.menu.manage")->with(compact('dokre_data', 'data'));
>>>>>>> Stashed changes
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
        // Menu::destroy($request->idDel);
        return back();
    }



}

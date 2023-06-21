<?php
/** Manage roles for users. **/
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage\Admins;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\Manage\DokreHelperTrait;
use App\Models\Manage\Admins\AdminRoles;
use Illuminate\Http\Request;
use App\Http\Requests\Manage\Admins\AdminRolesRequest;

class AdminRolesController extends Controller
{
    use DokreHelperTrait;

    public function index()
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("manage.home"));
        }
        $dokre_data['sideBarActive'] = "dokreAdmins";
        $dokre_data['sideBarActiveFolder'] = "";
        $tableData = AdminRoles::where('id', '>', 1)->get();
        return view("manage.admins.role.index")->with(compact('dokre_data', "tableData"));
    }

    public function create()
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("manage.home"));
        }
        $dokre_data['sideBarActive'] = "dokreAdmins";
        $dokre_data['sideBarActiveFolder'] = "";
        $dokre_data['formAction'] = route("manage.admin_roles.store");
        $permission_all = $this->listRouteNames();
        return view("manage.admins.role.manage")->with(compact('dokre_data', 'permission_all'));
    }

    public function store(AdminRolesRequest $request)
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("manage.home"));
        }
        $data = $request->all();
        $AdminRoles = AdminRoles::create($data);
        $AdminRoles->permission_many()->sync($request->input("permission", []));
        return redirect(route("manage.admin_roles.index"));
    }

    public function show($id)
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("manage.home"));
        }
        return redirect(route("manage.admin_roles.index"));
    }

    public function edit(AdminRoles $AdminRoles)
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("manage.home"));
        }
        if ($AdminRoles->id == 1) {
            return redirect(route("manage.admin_roles.index"));
        }
        $dokre_data['sideBarActive'] = "dokreAdmins";
        $dokre_data['sideBarActiveFolder'] = "";
        $dokre_data['formAction'] = route("manage.admin_roles.update", $AdminRoles->id);
        $permission_all = $this->listRouteNames();
        $data = $AdminRoles;
        return view("manage.admins.role.manage")->with(compact('dokre_data', 'data', 'permission_all'));
    }

    public function update(AdminRolesRequest $request, AdminRoles $AdminRoles)
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("manage.home"));
        }
        $data = $request->all();
        $AdminRoles->find($AdminRoles->id)->update($data);
        $AdminRoles->permission_many()->sync($request->input("permission", []));
        return redirect(route("manage.admin_roles.index"));
    }

    public function destroy(Request $request)
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("manage.home"));
        }
        AdminRoles::destroy($request->idDel);
        return back();
    }
}

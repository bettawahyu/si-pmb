<?php
/** Auditable Logs Controller **/
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage\Admins;
use App\Http\Controllers\Controller;
use App\Models\Manage\Admins\DokreAuditable;
use Illuminate\Http\Request;

class DokreAuditableLogsController extends Controller
{

    public function index(Request $request)
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("manage.home"));
        }
        $dokre_data['sideBarActive'] = "dokre_auditable_logs";
		$dokre_data["sideBarActiveFolder"] = "dropdown_settings";

        $tableData = DokreAuditable::search($request->query("search"))->orderByDesc("id")->paginate($request->query("length")??array_key_first(config("dokre_config.length_menu_table")));
        return view("manage.admins.dokre_auditable_logs.index")->with(compact('dokre_data', "tableData"));
    }

    public function show($id)
    {
        $AuditableLogs = DokreAuditable::find($id);
        if (auth()->user()->role_id != 1 || !$AuditableLogs) {
            return redirect(route("manage.dokre_auditable_logs.index"));
        }

        $dokre_data['sideBarActive'] = "dokre_auditable_logs";
        $dokre_data["sideBarActiveFolder"] = "dropdown_settings";

        $data = $AuditableLogs;
        return view("manage.admins.dokre_auditable_logs.view")->with(compact('dokre_data', 'data'));
    }

}

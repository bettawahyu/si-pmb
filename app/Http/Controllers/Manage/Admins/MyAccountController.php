<?php
/** Update logged user. **/
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage\Admins;
use App\Http\Controllers\Controller;
use App\Models\Manage\Admins\Admins;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Storage;

class MyAccountController extends Controller
{
    public function index()
    {
        $dokre_data['sideBarActive'] = "myaccount";
        $dokre_data['sideBarActiveFolder'] = "dropdown_settings";
        $data = auth()->user();
        $themes = Storage::disk('dokre_api_import')->directories('public/assets/dokre/css/theme');
        $themes = array_map('basename', $themes);

        return view("manage.admins.myaccount")->with(compact('dokre_data', 'data', 'themes'));
    }

    public function update(Request $request, Admins $Admins)
    {
        $rules = [
            'email' => [
                "email",
                "unique:admins,email," . auth()->user()->id . ",id,deleted_at,NULL",
                'required'
            ],
        ];
        $message = [];
        $attributes = [
            "email" => trans('dokre.admins_email'),
        ];
        $request->validate($rules, $message, $attributes);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['image'] = $request->image;
        $data['theme'] = $request->theme;
        $Admins->find(auth()->user()->id)->update($data);
        return redirect(route("manage.myaccount"));
    }

    public function updatePassword(Request $request, Admins $Admins)
    {
        $rules = [
            'password' => 'required|string|min:4|max:255'
        ];
        $message = [];
        $attributes = [
            "password" => trans('dokre.admins_pass'),
        ];
        $request->validate($rules, $message, $attributes);
        $data['password'] = $request->password;
        $Admins->find(auth()->user()->id)->update($data);
        return redirect(route("manage.myaccount"));
    }
}

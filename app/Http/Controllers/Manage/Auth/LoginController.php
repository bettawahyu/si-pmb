<?php
/** Helper for Dokre Login. **/
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function index()
    {
        //
        return view('manage.auth.login', ['title' => 'Admin Login']);
    }

    public function login(Request $request)
    {
        $this->validator($request);
        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect()->intended(route('manage.home'));
        }
        return redirect()->back()->withInput()->with('error', 'Login failed, please try again!');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('frontend.frontendmenu');
    }

    private function validator(Request $request)
    {
        $rules = [
            'email'    => 'required|email|exists:admins|min:5|max:191',
            'password' => 'required|string|min:4|max:255'
        ];
        $request->validate($rules);
    }

    public function username()
    {
        return 'email';
    }
}

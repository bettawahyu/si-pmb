<?php
namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $admiko_data['sideBarActive'] = "home";
        $admiko_data['sideBarActiveFolder'] = "";
        return view('manage.home.index')->with(compact('admiko_data'));
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manage\Menu;

class FrontendController extends Controller
{
    //
    public function frontendmenu(){

        $Menu = Menu::orderBy('id')->get();
        $Beranda = Menu::where('id',1)->first();
        $Tentang = Menu::where('id',2)->first();
        $Kenapa = Menu::where('id',3)->first();
        $Hubungi = Menu::where('id',4)->first();

        return view('frontend.welcome')->with(compact('Menu','Beranda', 'Tentang', 'Kenapa', 'Hubungi'));
    }

}

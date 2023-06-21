<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manage\Menu;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    //
    public function frontendmenu(){
<<<<<<< Updated upstream

        $Menu = Menu::where('aktif','1')->orderBy('id')->get();
=======
        $Menu = Menu::orderBy('id')->get();
>>>>>>> Stashed changes
        $Beranda = Menu::where('id',1)->first();
        $Tentang = Menu::where('id',2)->first();
        $Kenapa = Menu::where('id',3)->first();
        $Hubungi = Menu::where('id',4)->first();

        return view('frontend.welcome')->with(compact('Menu','Beranda', 'Tentang', 'Kenapa', 'Hubungi'));
    }

}

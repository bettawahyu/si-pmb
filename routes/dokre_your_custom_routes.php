<?php
/** Add your custom Manage routes here, we will never update or overwrite this file **/

namespace App\Http\Controllers\Manage;
use Illuminate\Support\Facades\Route;
/**Frontpage**/
Route::delete("frontpage/destroy", [FrontpageController::class,"destroy"])->name("frontpage.delete");
Route::resource("frontpage", FrontpageController::class)->parameters(["frontpage" => "frontpage"]);
/**Footer**/
Route::delete("footer/destroy", [FooterController::class,"destroy"])->name("footer.delete");
Route::resource("footer", FooterController::class)->parameters(["footer" => "footer"]);


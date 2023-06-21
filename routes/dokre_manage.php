<?php
/** Dokre static file for routes. **/
/**
 * @author     Thank you for using Duo Kreatif Apps
 * @copyright  2022-2023
 * @link       https://duokreatif.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Manage;
use Illuminate\Support\Facades\Route;


Route::get('login', [Auth\LoginController::class, 'index'])->name('login');
Route::post('login', [Auth\LoginController::class, 'login']);
/**Forgot Password Routes**/
Route::get('password/request', [Auth\ForgotPasswordController::class, 'index'])->name('password.request');
Route::post('password/email', [Auth\ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
/**Reset Password Routes**/
Route::get('password/reset/{reset_token}', [Auth\ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset/{reset_token}', [Auth\ForgotPasswordController::class, 'updatePassword'])->name('password.update');

Route::middleware('auth:admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('myaccount', [Admins\MyAccountController::class, 'index'])->name('myaccount');
    Route::put('myaccount/update', [Admins\MyAccountController::class, 'update'])->name('myaccount.update');
    Route::put('myaccount/updatepassword', [Admins\MyAccountController::class, 'updatepassword'])->name('myaccount.updatepassword');

    /**Logout Routs**/
    Route::get('logout', [Auth\LoginController::class, 'logout'])->name('logout');
    /**Admins**/
    Route::delete("admins/destroy", [Admins\AdminsController::class, 'destroy'])->name("admins.delete");
    Route::resource("admins", Admins\AdminsController::class)->parameters(['admins' => 'admins']);
    Route::delete("admin_roles/destroy", [Admins\AdminRolesController::class, 'destroy'])->name("admin_roles.delete");
    Route::resource("admin_roles", Admins\AdminRolesController::class)->parameters(['admin_roles' => 'admin_roles']);
    Route::get('dokre_page_import', [Admins\DokrePageImport\DokrePageImportController::class, 'index'])->name('dokre_page_import');
    Route::post('dokre_page_import/import', [Admins\DokrePageImport\DokrePageImportController::class, 'import'])->name('dokre_page_import.import');
    /**Dokre Auditable Logs**/
    Route::resource("dokre_auditable_logs", Admins\DokreAuditableLogsController::class)->parameters(["dokre_auditable_logs" => "dokre_auditable_logs"]);
    /**Dokre global search**/
    Route::get("dokre_global_search", [Admins\AdminGlobalSearchController::class,'global_search'])->name('dokre_global_search');
    /**All generated Dokre routes will be defined here...**/
    require_once __DIR__.'/dokre_manage_routes.php';
    /**Add your CMS routes bellow**/
    require_once __DIR__.'/dokre_your_custom_routes.php';
});

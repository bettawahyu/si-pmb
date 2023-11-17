<?php
/** Dokre routes. This file will be overwritten on page import. Don't add your code here! **/

namespace App\Http\Controllers\Manage;
use Illuminate\Support\Facades\Route;

/**Pendaftar**/
Route::delete("pendaftar/destroy", [PendaftarController::class,"destroy"])->name("pendaftar.delete");
Route::resource("pendaftar", PendaftarController::class)->parameters(["pendaftar" => "pendaftar"]);
Route::get('pendaftar/print/{id}', [PendaftarController::class,"print"])->name("pendaftar.print");
/**Diterima**/
Route::delete("diterima/destroy", [DiterimaController::class,"destroy"])->name("diterima.delete");
Route::resource("diterima", DiterimaController::class)->parameters(["diterima" => "diterima"]);
/**Ditolak**/
Route::delete("ditolak/destroy", [DitolakController::class,"destroy"])->name("ditolak.delete");
Route::resource("ditolak", DitolakController::class)->parameters(["ditolak" => "ditolak"]);
/**Sekolah**/
// Route::delete("sekolah/destroy", [SekolahController::class,"destroy"])->name("sekolah.delete");
Route::resource("sekolah", SekolahController::class)->parameters(["sekolah" => "sekolah"]);
/**Menu**/
Route::delete("menu/destroy", [MenuController::class,"destroy"])->name("menu.delete");
Route::resource("menu", MenuController::class)->parameters(["menu" => "menu"]);
/**Agama**/
Route::delete("agama/destroy", [AgamaController::class,"destroy"])->name("agama.delete");
Route::resource("agama", AgamaController::class)->parameters(["agama" => "agama"]);
/**JenisKelamin**/
Route::delete("jenis_kelamin/destroy", [JenisKelaminController::class,"destroy"])->name("jenis_kelamin.delete");
Route::resource("jenis_kelamin", JenisKelaminController::class)->parameters(["jenis_kelamin" => "jenis_kelamin"]);
/**Kelas**/
Route::delete("kelas/destroy", [KelasController::class,"destroy"])->name("kelas.delete");
Route::resource("kelas", KelasController::class)->parameters(["kelas" => "kelas"]);
/**PekerjaanOrangTua**/
Route::delete("pekerjaan_orang_tua/destroy", [PekerjaanOrangTuaController::class,"destroy"])->name("pekerjaan_orang_tua.delete");
Route::resource("pekerjaan_orang_tua", PekerjaanOrangTuaController::class)->parameters(["pekerjaan_orang_tua" => "pekerjaan_orang_tua"]);
/**TahunAjaran**/
Route::delete("tahun_ajaran/destroy", [TahunAjaranController::class,"destroy"])->name("tahun_ajaran.delete");
Route::resource("tahun_ajaran", TahunAjaranController::class)->parameters(["tahun_ajaran" => "tahun_ajaran"]);
/**ProsesUploadDokumen**/
Route::delete("dokumen_pendaftar/destroy", [DokumenController::class,"destroy"])->name("dokumen.delete");
Route::resource("dokumen_pendaftar", DokumenController::class)->parameters(["dokumen" => "dokumen"]);
Route::get('dokumen_pendaftar/detail/{id}', [DokumenController::class,"detail"])->name("dokumen.detail");
Route::delete('dokumen_pendaftar/detail/hapus', [DokumenController::class,"hapus"])->name("dokumen.hapus");
Route::get('dokumen_pendaftar/upload/{id}', [DokumenController::class,"upload"])->name("dokumen.upload");
/**UnggahDokumen**/
Route::delete("unggah_dokumen/destroy", [UnggahDokumenController::class,"destroy"])->name("unggah_dokumen.delete");
Route::resource("unggah_dokumen", UnggahDokumenController::class)->parameters(["unggah_dokumen" => "unggah_dokumen"]);

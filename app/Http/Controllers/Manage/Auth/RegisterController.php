<?php

namespace App\Http\Controllers\Manage\Auth;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Manage\Pendaftar;
use App\Http\Requests\Manage\Admins\RegisterRequest;
use App\Models\Manage\Kelas;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $urut = DB::table('pendaftar')
                ->count();
        $urut =$urut + 1;
        $nopen = "PSB-".date("y").sprintf("%03d",$urut);
		$kelas_all = Kelas::all()->sortBy("nama_kelas")->pluck("nama_kelas", "id");
        return view("manage.auth.register")->with(compact('kelas_all', 'nopen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        //
        if ($request->fails()) {
            return redirect()->back()->withInput();
        }
        $datasiswa[] = array(
            'no_pendaftaran' => $request->nopen,
            'nama_siswa' => $request->nama,
            'alamat' => $request->alamat,
            'nomor_telp' => $request->telepon,
            'email' => $request->email,
            'kelas' => $request->kelas,
        );
        $datauser[] = array(
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            'image' => '',
            'theme'=> 'modern',
        );
        DB::table('pendaftar')->insert($datasiswa);
        DB::table('admins')->insert($datauser);
        return redirect('/')->with('info','Registrasi Berhasil, Silahkan Login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegisterRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

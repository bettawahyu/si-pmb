@extends("manage.layouts.default")
@section('breadcrumbs')@endsection
@section('pageTitle')
    <h1>{{ trans('admiko.home') }}</h1>
@endsection
@section('pageInfo')@endsection
@section('backBtn')@endsection
@section('content')
<div class="row">
    <div class="col-sm-4">
        <di class="card">
            <h5 class="card-header" style="background-color: rgb(37, 230, 248); padding:0.3em 2rem; font-size:24px"><i class="fas fa-child fa-fw"></i> Total Pendaftar</h5>
            <div class="card-body"  style="text-align: center">
                <h2 class="display-2">{{$pendaftar}}</h2>
            </div>
            <div class="card-footer text-muted" style="text-align: center;">
                <h5>PENDAFTAR</h5>
            </div>
            <div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <h5 class="card-header" style="background-color: rgb(20, 229, 5); padding:0.3em 2rem; font-size:24px"><i class="fas fa-child fa-fw"></i> Siswa Diterima</h5>
            <div class="card-body"  style="text-align: center">
                <h2 class="display-2">{{$lolos}}</h2>
            </div>
            <div class="card-footer text-muted" style="text-align: center;">
                <h5>SISWA</h5>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <h5 class="card-header" style="background-color: rgb(255, 71, 71); padding:0.3em 2rem; font-size:24px"><i class="fas fa-child fa-fw"></i> Siswa Ditolak</h5>
            <div class="card-body"  style="text-align: center">
                <h2 class="display-3">{{$tolak}}</h2>
            </div>
            <div class="card-footer text-muted" style="text-align: center;">
                <h5>SISWA</h5>
            </div>
        </div>
    </div>
    <div class="mt-4 col-md-12">
        <div class="card">
            <h5 class="card-header" style="background-color: rgb(20, 229, 5); padding:0.3em 2rem; font-size:24px"><i class="fas fa-child fa-fw"></i> Siswa Diterima</h5>
            <div class="card-body">
                <div class="tableBox" id="tableBox">
                    <div class="row" >
                        <div class="col-12 d-flex justify-content-between">
                            <div class="pb-2 pb-sm-0">
                                <div class="lengthTable"></div>
                            </div>
                            <div>
                                <div class="d-flex justify-content-start justify-content-sm-end">
                                    <div class="searchTable">
                            <div class="input-group ps-2">
                                <input type="text" name="admiko_search" class="form-control searchTableInput" placeholder="{{trans("global.search")}}" value="">
                            </div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tableLayout pb-2">
                    <table class="table tableSort" style="width:100%" data-dom="ltrip">
                            <thead>
                                <tr data-sort-method='thead'>
                                    <th scope="col"># Urut</th>
                                    <th scope="col">No. Pendaftar</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Waktu Daftar Ulang</th>
                                    <th scope="col">No. Telepon</th>
                                    <th scope="col" class="w-5 no-sort sorting_disabled" data-orderable="false" rowspan="1" colspan="1" style="width: 150px;" aria-label="Kirim Pesan">Kirim Pesan Whatsapp</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($datapendaftar as $data)
                                <tr>
                                    <td>{{$data['no']}}</td>
                                    <td>{{$data['nope']}}</td>
                                    <td>{{$data['nama']}}</td>
                                    <td>{{$data['kelas']}}</td>
                                    <td>{{\Carbon\Carbon::createFromFormat('d/m/Y',$data['daftarulang'])->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('d M')}} -
                                        {{\Carbon\Carbon::createFromFormat('d/m/Y',$data['batasdaftar'])->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('d M Y')}}</td>
                                    <td>{{$data['telp']}}</td>
                                    <td class="w5 no-sort" style="text-align:center"><a href="https://api.whatsapp.com/send?phone={{$data['telp']}}&text=Assalamualaikum+Wr.+Wb.%0D%0A%0D%0AKami+dari+TK.+Al+Muslimin+Memberitahukan+bahwa+putra%2Fputri+bapak+dengan+nama+{{$data['nama']}}+dinyatakan+DITERIMA.+Mohon+melakukan+pendaftaran+ulang+mulai+tanggal+{{$data['daftarulang']}}+s%2Fd+{{$data['batasdaftar']}}%0D%0A%0D%0AWassalamualaikum+Wr.Wb"
                                        target="_blank"><i class="fas fa-paper-plane"></i></a></td>
                            @endforeach
                            </tbody>
                    </table>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm order-3 order-sm-0 pt-2">
                        </div>
                        <div class="col-12 col-sm-auto order-0 order-sm-3 pt-2 align-self-center paginationInfo"></div>
                        <div class="col-12 col-sm-auto order-0 order-sm-3 pt-2 text-end paginationBox"></div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

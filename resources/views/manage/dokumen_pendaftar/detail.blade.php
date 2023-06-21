@extends("manage.layouts.default")
@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page">Detail Dokumen Pendaftar</li>
@endsection
@section('pageTitle')
<h1>Pendaftar</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{route("manage.home")}}"><i class="fas fa-angle-left"></i> {{trans('dokre.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card pendaftar_index dokreIndex">
    <div class="card-body">
        <div class="tableBox" id="tableBox">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <div class="pb-2 pb-sm-0">
                        <div class="lengthTable"><h5>Detail Dokumen Pendaftar</h5></div>
                    </div>
                </div>
                <div class="col-12">
                    No. Pendaftaran: <b>{{$detail->no_pendaftaran}}</b> <br>
                    Nama Siswa: <b>{{$detail->nama_siswa}}</b>
                </div>
            </div>
            <div class="tableLayout pb-2">
                    <table class="table" data-dom="tr" data-page-length='-1'>
                    <thead>
                        <tr data-sort-method='thead'>
							<th scope="col" class="text-nowrap" data-orderable="false">Nama Dokumen</th>
							<th scope="col" class="text-nowrap" data-orderable="false">Berkas Dokumen</th>
                            <th scope="col" class="w-5 no-sort" data-orderable="false">Unduh</th>
                        </tr>
                    </thead>
                    @foreach ($dokumen as $dok)
                    <tbody>
                        <tr>
							<td class="text-nowrap">{{$dok->dok_unggah->nama_dokumen??""}}</td>
							<td class="text-nowrap"><a href="{{$dok->dokumen}}" target="_blank"><i class="fas fa-eye fa-fw"></i> {{$dok->dokumen}}</a></td>
                            <td class="w-5 no-sort"><a href="{{$dok->dokumen}}"><i class="fas fa-download fa-fw"></i></a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@extends("manage.layouts.default")
@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page">Dokumen Pendaftar</li>
@endsection
@section('pageTitle')
<h1>Pendaftar</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{route("manage.dokumen_pendaftar.index")}}"><i class="fas fa-angle-left"></i> {{trans('dokre.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card pendaftar_index dokreIndex">
    @if (\Session::has('error'))
    <div class="alert alert-danger">
            <i class="fas fa-times-circle"></i> <span style="font-size:18px"><b>{!! \Session::get('error') !!}</b></span>
    </div>
    @endif
    <div class="card-body">
        <div class="tableBox" id="tableBox">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <div class="pb-2 pb-sm-0">
                        <div class="lengthTable"></div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-start justify-content-sm-end">
                            <div class="searchTable">
					<div class="input-group ps-2">
                        <input type="text" name="dokre_search" class="form-control searchTableInput" placeholder="Search" value="">
                    </div></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tableLayout pb-2">
                                <table class="table tableSort" style="width:100%" data-dom="ltrip">
                    <thead>
                        <tr data-sort-method='thead'>
							<th scope="col" class="text-nowrap">No. Pendaftaran</th>
							<th scope="col" class="text-nowrap">Nama Siswa</th>
                            <th scope="col" class="text-nowrap" data-orderable="false">Lihat Dokumen</th>
                            <th scope="col" class="text-nowrap" data-orderable="false">Upload Dokumen</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($peserta as $data)
                        <tr>
							<td class="text-nowrap">{{$data->no_pendaftaran}}</td>
							<td class="text-nowrap">{{$data->nama_siswa}}</td>
                            <td class="w-5 no-sort">
                            @foreach ($tableData as $cek )
                                @if ($cek->id_pendaftar == $data->id)
                                <a href="{{route("manage.dokumen.detail",[$data->id])}}"><i class="fas fa-eye fa-fw" style="color:rgb(3, 175, 3);"></i></a>
                                @endif
                            @endforeach
                            </td>
                            <td class="w-5 no-sort"><a href="{{route("manage.dokumen.upload",[$data->id])}}"><i class="fas fa-upload fa-fw"></i></a></td>
                        </tr>
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
    @if(Gate::allows('pendaftar_allow'))
    <!-- Delete confirm -->
    <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="deleteConfirm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="post" class="w-100" action="{{route("manage.pendaftar.delete")}}">
            @method('DELETE')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('dokre.delete_confirm')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">{{trans('dokre.delete_message')}}</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('dokre.delete_close_btn')}}</button>
                    <button type="submit" class="btn btn-danger deleteSoft">{{trans('dokre.delete_delete_btn')}}</button>
                </div>
            </div>
            <div class="dataDelete"></div>
            </form>
        </div>
    </div>
    @endIf

</div>
@endsection

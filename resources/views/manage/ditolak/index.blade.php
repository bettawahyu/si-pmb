@extends("manage.layouts.default")
@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page">Ditolak</li>
@endsection
@section('pageTitle')
<h1>Ditolak</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{route("manage.home")}}"><i class="fas fa-angle-left"></i> {{trans('dokre.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card ditolak_index dokreIndex">
    <div class="card-body">
        @if (\Session::has('success'))
        <meta http-equiv="refresh" content="0">
        @elseif (\Session::has('error'))
        <div class="alert alert-danger">
                <i class="fas fa-times-circle"></i> <span style="font-size:18px"><b>{!! \Session::get('error') !!}</b></span>
        </div>
        @else
        @endif
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
            <form method="post" class="w-100" action="{{route("manage.ditolak.delete")}}">
                @method('DELETE')
                @csrf
                <table class="table tableSort" style="width:100%" data-dom="ltrip">
                    <thead>
                        <tr data-sort-method='thead'>
                            <th scope="col"># Urut</th>
                            <th scope="col">No. Pendaftar</th>
							<th scope="col">Nama Siswa</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Tanggal Daftar</th>
                            <th scope="col">Alasan Penolakan</th>
                            <th scope="col" class="w-5 no-sort sorting_disabled" data-orderable="false" rowspan="1" colspan="1" style="width: 120px;" aria-label="Delete"><span style="color: red; font-size:14px"><b>Pilih untuk Hapus</b></span></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dataditolak as $data)
                        <tr id="tr_{{$data['selected_id']}}">
                            <td>{{$data['no']}}</td>
                            <td>{{$data['nope']}}</td>
							<td>{{$data['nama']}}</td>
                            <td>{{$data['kelas']}}</td>
                            <td>{{\Carbon\Carbon::parse($data['gagal'])->format('d M Y')}}</td>
                            <td>
                            @foreach($status_penolakan_all as $id => $value)
                                @if($data['status'] == $id)
                                    {{$value}}
                                @endif
                            @endforeach
                            </td>
                            <td class="w5 no-sort" style="align-content: center"><input type="checkbox" id="selid" name="selid[]" value="{{$data['selected_id']}}"></td>
                        </tr>
                    @endforeach
                    </tbody>
            </table>
            </div>
            <div class="row">
                <div class="col-12 col-sm order-3 order-sm-0 pt-2">
                    @if(Gate::any(['ditolak_allow']))
                        <a href="{{route('manage.ditolak.create')}}" class="btn btn-success" role="button"><i class="fas fa-plus fa-fw"></i> {{trans('dokre.table_add')}}</a>
                        @if(isset($data))
                        <a href="#" data-id="tr_{{$data['selected_id']}}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirm" role="button"><i class="fas fa-trash fa-fw"></i> {{trans('dokre.table_delete')}}</a>
                        @endif
                     @endIf
                </div>
                <div class="col-12 col-sm-auto order-0 order-sm-3 pt-2 align-self-center paginationInfo"></div>
                <div class="col-12 col-sm-auto order-0 order-sm-3 pt-2 text-end paginationBox"></div>
            </div>
        </div>
    </div>
    @if(Gate::allows('ditolak_allow'))
    <!-- Delete confirm -->
    <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="deleteConfirm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
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

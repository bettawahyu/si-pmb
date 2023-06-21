@extends("manage.layouts.default")
@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page">Diterima</li>
@endsection
@section('pageTitle')
<h1>Diterima</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{route("manage.home")}}"><i class="fas fa-angle-left"></i> {{trans('dokre.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card diterima_index dokreIndex">
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
<<<<<<< Updated upstream
                        <input type="text" name="admiko_search" class="form-control searchTableInput" placeholder="{{trans("global.search")}}" value="">
=======
                        <input type="text" name="dokre_search" class="form-control searchTableInput" placeholder="Search" value="">
>>>>>>> Stashed changes
                    </div></div>
                        </div>
                    </div>
                </div>
            </div>
            <form method="post" class="w-100" action="{{route("manage.diterima.delete")}}">
                @method('DELETE')
                @csrf
            <div class="tableLayout pb-2">
            <table class="table tableSort" style="width:100%" data-dom="ltrip">
                    <thead>
                        <tr data-sort-method='thead'>
                            <th scope="col"># Urut</th>
                            <th scope="col">No. Pendaftar</th>
							<th scope="col">Nama Siswa</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Tanggal Daftar Ulang</th>
							<th scope="col">Batas Daftar Ulang</th>
                            <th scope="col" class="w-5 no-sort sorting_disabled" data-orderable="false" rowspan="1" colspan="1" style="width: 120px;" aria-label="Delete"><span style="color: red; font-size:14px"><b>Pilih untuk Hapus</b></span></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($datapendaftar as $data)
                        <tr id="tr_{{$data['selected_id']}}">
                            <td>{{$data['no']}}</td>
                            <td>{{$data['nope']}}</td>
							<td>{{$data['nama']}}</td>
                            <td>{{$data['kelas']}}</td>
                            <td>{{$data['daftarulang']}}</td>
							<td>{{$data['batasdaftar']}}</td>
                            <td class="w5 no-sort" style="align-content: center"><input type="checkbox" id="selid" name="selid[]" value="{{$data['selected_id']}}"></td>
                        </tr>
                    @endforeach
                    </tbody>
            </table>
            </div>
            <div class="row">
                <div class="col-12 col-sm order-3 order-sm-0 pt-2">
                    @if(Gate::any(['diterima_allow']))
                        <a href="{{route('manage.diterima.create')}}" class="btn btn-success" role="button"><i class="fas fa-plus fa-fw"></i> {{trans('dokre.table_add')}}</a>
                        @if(isset($data))
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target='#myModal'><i class="fas fa-edit fa-fw"></i> {{trans('dokre.table_edit')}}</button>
                        <a href="#" data-id="tr_{{$data['selected_id']}}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirm" role="button"><i class="fas fa-trash fa-fw"></i> {{trans('dokre.table_delete')}}</a>
                        @endif
                    @endIf
                </div>
                <div class="col-12 col-sm-auto order-0 order-sm-3 pt-2 align-self-center paginationInfo"></div>
                <div class="col-12 col-sm-auto order-0 order-sm-3 pt-2 text-end paginationBox"></div>
            </div>
        </div>
    </div>
    @if(Gate::allows('diterima_allow'))
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

    <!-- Data Modal Untuk Edit-->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Pendaftar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table tableSort" style="width:100%" data-dom="ltrip">
                    <thead>
                        <tr data-sort-method='thead'>
                            <th scope="col">No. Pendaftar</th>
							<th scope="col">Nama Siswa</th>
                            <th scope="col">Tanggal Daftar Ulang</th>
							<th scope="col">Batas Daftar Ulang</th>
                            <th scope="col" data-orderable="false"> Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($datapendaftar as $data)
                        <tr id="tr_{{$data['selected_id']}}">
                            <td>{{$data['nope']}}</td>
							<td>{{$data['nama']}}</td>
                            <td>{{$data['daftarulang']}}</td>
							<td>{{$data['batasdaftar']}}</td>
                            <td class="w-5 no-sort"><a href="{{route("manage.diterima.edit",$data['parent_id'])}}"><i class="fas fa-edit fa-fw"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('dokre.delete_close_btn')}}</button>
            </div>
        </div>
        </div>
    </div>
    @endIf

</div>
@endsection

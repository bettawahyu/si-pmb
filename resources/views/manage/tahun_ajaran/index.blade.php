@extends("manage.layouts.default")
@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page">Tahun Ajaran</li>
@endsection
@section('pageTitle')
<h1>Tahun Ajaran</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{route("manage.home")}}"><i class="fas fa-angle-left"></i> {{trans('dokre.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card tahun_ajaran_index dokreIndex">
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
            <div class="tableLayout pb-2">
                                <table class="table tableSort" style="width:100%" data-dom="ltrip">
                    <thead>
                        <tr data-sort-method='thead'>
							<th scope="col" class="text-nowrap">Tahun Ajaran</th>
							<th scope="col" class="text-nowrap">Status Aktif</th>
                            <th scope="col" class="w-5 no-sort" data-orderable="false">{{trans("dokre.table_edit")}}</th>
                            @if(Gate::allows('tahun_ajaran_allow'))
                            <th scope="col" class="w-5 no-sort" data-orderable="false">{{trans('dokre.table_delete')}}</th>
                            @endIf
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tableData as $data)
                        <tr>
							<td class="text-nowrap">{{$data->tahun_ajaran}}</td>
							<td class="text-nowrap">{{$data->status_aktif}}</td>
                            <td class="w-5 no-sort"><a href="{{route("manage.tahun_ajaran.edit",[$data->id])}}"><i class="fas fa-edit fa-fw"></i></a></td>
                            @if(Gate::allows(['tahun_ajaran_allow']))
                            <td class="w-5 no-sort">
                            <a href="#" data-id="{{$data->id}}" class="dokre_deleteConfirm" data-bs-toggle="modal" data-bs-target="#deleteConfirm"><i class="fas fa-trash fa-fw"></i></a>
                        </td>
                            @endIf
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-12 col-sm order-3 order-sm-0 pt-2">
                    @if(Gate::any(['tahun_ajaran_allow']))
                        <a href="{{route('manage.tahun_ajaran.create')}}" class="btn btn-primary" role="button"><i class="fas fa-plus fa-fw"></i> {{trans('dokre.table_add')}}</a>
                    @endIf
                </div>
                <div class="col-12 col-sm-auto order-0 order-sm-3 pt-2 align-self-center paginationInfo"></div>
                <div class="col-12 col-sm-auto order-0 order-sm-3 pt-2 text-end paginationBox"></div>
            </div>
        </div>
    </div>
    @if(Gate::allows('tahun_ajaran_allow'))
    <!-- Delete confirm -->
    <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="deleteConfirm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="post" class="w-100" action="{{route("manage.tahun_ajaran.delete")}}">
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

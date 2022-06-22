@extends("manage.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("manage.kelas.index") }}">Kelas</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Kelas</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("manage.kelas.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage kelas_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="nama_kelas" class="col-md-2 col-form-label">Nama Kelas:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required="true" placeholder="Nama Kelas"  value="{{{ old('nama_kelas', isset($data)?$data->nama_kelas : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('nama_kelas')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="nama_kelas_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="kapasitas" class="col-md-2 col-form-label">Kapasitas:*</label>
                        <div class="col-md-10">
                            <input type="number" class="form-control limitPozNegNumbers numbersWidth" id="kapasitas" name="kapasitas" required="true" placeholder="Kapasitas"
                                   step="1"  data-min="0" min="0" data-max="30" max="30"
                                   value="{{{ old('kapasitas', isset($data)?$data->kapasitas : '0') }}}">
                            <div class="invalid-feedback @if ($errors->has('kapasitas')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="kapasitas_help" class="text-muted"> Min: 0 Max: 30</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer form-actions" id="form-group-buttons">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary float-start me-1 mb-1 mb-sm-0 save-button">{{trans('admiko.table_save')}}</button>
                    <a href="{{ route("manage.kelas.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
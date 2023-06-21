@extends("manage.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("manage.menu.index") }}">Menu</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('dokre.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('dokre.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Menu</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("manage.menu.index") }}"><i class="fas fa-angle-left"></i> {{trans('dokre.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage Menu_manage dokreForm">
    <legend class="action">{{ isset($data) ? trans('dokre.update') : trans('dokre.add_new') }}</legend>
    <form method="POST" action="{{ $dokre_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">

                <div class=" col-12">
                    <div class="form-group row">
                        <label for="nama_menu" class="col-md-2 col-form-label">Nama Menu:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nama_menu" name="nama_menu"  placeholder="Nama Menu"  value="{{{ old('nama_menu', isset($data)?$data->nama_menu : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('nama_menu')) d-block @endif">{{trans('dokre.required_text')}}</div>
                            <small id="nama_menu_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="slug" class="col-md-2 col-form-label">Slug:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="slug" name="slug"  placeholder="Slug"  value="{{{ old('slug', isset($data)?$data->slug : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('slug')) d-block @endif">{{trans('dokre.required_text')}}</div>
                            <small id="slug_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer form-actions" id="form-group-buttons">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary float-start me-1 mb-1 mb-sm-0 save-button">{{trans('dokre.table_save')}}</button>
                    <a href="{{ route("manage.menu.index") }}" class="btn btn-secondary float-end" role="button">{{trans('dokre.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

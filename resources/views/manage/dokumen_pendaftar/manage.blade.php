@extends("manage.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("manage.pendaftar.index") }}">Pendaftar</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('dokre.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('dokre.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Pendaftar</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("manage.pendaftar.index") }}"><i class="fas fa-angle-left"></i> {{trans('dokre.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage pendaftar_manage dokreForm">
    <legend class="action">{{ isset($data) ? trans('dokre.update') : trans('dokre.add_new') }}</legend>
    <form method="POST" action="{{ $dokre_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="nama_dokumen" class="col-md-2 col-lg-4 col-form-label">Nama Dokumen</label>
                        <div class="col-md-10 col-lg-8">
                            <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen" required="true" placeholder="Nama Dokumen"  value="{{{ old('nama_dokumen', isset($data)?$data->id_unggah : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('nama_dokumen')) d-block @endif">{{trans('dokre.required_text')}}</div>
                            <small id="nama_dokumen_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="dokumen" class="col-sm-2 col-form-label">Unggah Dokumen:</label>
                        <div class="col-sm-10">
                            @if (isset($data->dokumen) && Storage::disk(config("dokre_config.filesystem"))->exists($dokre_data['fileInfo']["dokumen"]['original']["folder"].$data->dokumen))
                            {{-- <a href="{{ Storage::disk(config("dokre_config.filesystem"))->url($dokre_data['fileInfo']["dokumen"]['original']["folder"].$data->dokumen)}}" target="_blank">{{$data->dokumen}}</a><br> --}}
                                <a href="{{ Storage::disk(config("dokre_config.filesystem"))->url($dokre_data['fileInfo']["dokumen"]['original']["folder"].$data->dokumen)}}" target="_blank"><img src="{{url($dokre_data['fileInfo']["dokumen"]['original']["folder"].$data->dokumen)}}" width="180" height="200"></a><br>
                                <div class="form-check form-checkbox">
                                    <input class="form-check-input" type="checkbox" name="dokumen_dokre_delete" id="dokumen_dokre_delete" value="1">
                                    <label class="form-check-label" for="dokumen_dokre_delete"> {{trans('global.remove_file')}}</label>
                                </div>
                            @endif
                            <input type="file" class="fileUpload mt-1" id="dokumen" accept=".jpg,.jpeg,.png,.bmp" data-type=".jpg,.jpeg,.png,.bmp" data-size="4" name="dokumen" >
                            <div class="invalid-feedback @if ($errors->has('dokumen')) d-block @endif" data-required="{{trans('global.required_text')}}" data-size="{{trans('global.required_size')}}" data-type="{{trans('global.required_type')}}">
                                @if ($errors->has('dokumen')){{ $errors->first('dokumen') }}@endif
                            </div>
                            <small id="dokumen_help" class="text-muted">File size limit: 4 MB. {{trans("global.file_extension_limit")}}.jpg,.jpeg,.png,.bmp. </small>
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
                    <a href="{{ route("manage.pendaftar.index") }}" class="btn btn-secondary float-end" role="button">{{trans('dokre.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@extends("manage.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("manage.unggah_dokumen.index") }}">Unggah Dokumen</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('dokre.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('dokre.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Unggah Dokumen</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("manage.unggah_dokumen.index") }}"><i class="fas fa-angle-left"></i> {{trans('dokre.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage unggah_dokumen_manage dokreForm">
    <legend class="action">{{ isset($data) ? trans('dokre.update') : trans('dokre.add_new') }}</legend>
    <form method="POST" action="{{ $dokre_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="nama_dokumen" class="col-md-2 col-form-label">Nama Dokumen:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen"  placeholder="Nama Dokumen"  value="{{{ old('nama_dokumen', isset($data)?$data->nama_dokumen : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('nama_dokumen')) d-block @endif">{{trans('dokre.required_text')}}</div>
                            <small id="nama_dokumen_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Status Aktif:</label>
                        <div class="col-md-10">
                            <div class="row pt-2">
                            @foreach($status_aktif_all as $id => $value)
                                @php $checked = ""; @endphp
                                @if(old('status_aktif') == $id)
                                    @php $checked = "checked"; @endphp
                                @elseIf(isset($data) && $data->status_aktif == $id)
                                    @php $checked = "checked"; @endphp
                                
                                @endIf
                                <div class="col-12">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="status_aktif" id="status_aktif{{ $id }}" value="{{ $id }}" {{$checked}} >
                                        <label class="form-check-label" for="status_aktif{{ $id }}">{{ $value }}</label>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                            <div class="invalid-feedback @if ($errors->has('status_aktif')) d-block @endif">{{trans('dokre.required_text')}}</div>
                            <small id="status_aktif_help" class="text-muted"></small>
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
                    <a href="{{ route("manage.unggah_dokumen.index") }}" class="btn btn-secondary float-end" role="button">{{trans('dokre.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
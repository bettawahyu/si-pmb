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
<a href="{{route("manage.dokumen_pendaftar.index")}}"><i class="fas fa-angle-left"></i> {{trans('dokre.page_back_btn')}}</a>
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
            <div class="card formPage pendaftar_manage dokreForm">
                <legend class="action">Unggah Berkas:</legend>
                <form method="POST" action="{{ $dokre_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @if(isset($data)) @method('PUT') @endIf
                    @csrf
                    <div class="card-body">
                        @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
                        <div class="row">
                            @foreach ($nama_dok as $doc)
                            <div class=" col-sm-0">
                                <div class="form-group row">
                                    <div class="col-sm-6 col-sm-6">
                                        <input type="hidden" name="id_pendaftar[]" value="{{$detail->id}}" required="true" />
                                        <div class="invalid-feedback @if ($errors->has('id_pendaftar')) d-block @endif">{{trans('dokre.required_text')}}</div>
                                        <small id="id_pendaftar_help" class="text-muted"></small>
                                    </div>
                                    <div class="col-sm-6 col-sm-6">
                                        <input type="hidden" name="id_unggah[]" value="{{$doc->id}}" required="true" />
                                        <div class="invalid-feedback @if ($errors->has('nama_dokumen')) d-block @endif">{{trans('dokre.required_text')}}</div>
                                        <small id="nama_dokumen_help" class="text-muted"></small>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-12">
                                <div class="form-group row">
                                    <label for="dokumen" class="col-sm-2 col-form-label">{{$doc->nama_dokumen}}</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="fileUpload mt-1" id="dokumen" accept=".jpg,.jpeg,.png,.pdf" data-type=".jpg,.jpeg,.png,.pdf" data-size="4" name="dokumen[]" >
                                        <div class="invalid-feedback @if ($errors->has('dokumen')) d-block @endif" data-required="{{trans('global.required_text')}}" data-size="{{trans('global.required_size')}}" data-type="{{trans('global.required_type')}}">
                                            @if ($errors->has('dokumen')){{ $errors->first('dokumen') }}@endif
                                        </div>
                                        <small id="dokumen_help" class="text-muted">File size limit: 4 MB. {{trans("global.file_extension_limit")}}.jpg,.jpeg,.png,.pdf. </small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer form-actions" id="form-group-buttons">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-success float-start me-1 mb-1 mb-sm-0 save-button">{{trans('dokre.table_save')}}</button>
                                <a href="{{ route("manage.dokumen_pendaftar.index") }}" class="btn btn-secondary float-end" role="button">{{trans('dokre.table_cancel')}}</a>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

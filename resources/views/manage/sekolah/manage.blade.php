@extends("manage.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("manage.sekolah.index") }}">Sekolah</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Data Sekolah</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("manage.sekolah.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage sekolah_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">

                <div class=" col-12">
                    <div class="form-group row">
                        <label for="nama_sekolah" class="col-md-2 col-form-label">Nama Sekolah:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" required="true" placeholder="Nama Sekolah"  value="{{{ old('nama_sekolah', isset($data)?$data->nama_sekolah : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('nama_sekolah')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="nama_sekolah_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="alamat_sekolah" class="col-md-2 col-form-label">Alamat Sekolah:*</label>
                        <div class="col-md-10">
                            <textarea class="form-control form-control-textarea " id="alamat_sekolah" name="alamat_sekolah" required="true" placeholder="Alamat Lengkap Sekolah">{{{ old('alamat_sekolah', isset($data)?$data->alamat_sekolah : '') }}}</textarea>
                            <div class="invalid-feedback @if ($errors->has('alamat_sekolah')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="alamat_sekolah_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="kel_desa" class="col-md-2 col-lg-4 col-form-label">Kelurahan/Desa:*</label>
                        <div class="col-md-10 col-lg-8">
                            <input type="text" class="form-control" id="kel_desa" name="kel_desa" required="true" placeholder="Kelurahan/Desa"  value="{{{ old('kel_desa', isset($data)?$data->kel_desa : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('kel_desa')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="kel_desa_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="kecamatan" class="col-md-2 col-lg-4 col-form-label">Kecamatan:*</label>
                        <div class="col-md-10 col-lg-8">
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" required="true" placeholder="Kecamatan"  value="{{{ old('kecamatan', isset($data)?$data->kecamatan : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('kecamatan')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="kecamatan_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="kab_kota" class="col-md-2 col-lg-4 col-form-label">Kabupaten/Kota:*</label>
                        <div class="col-md-10 col-lg-8">
                            <input type="text" class="form-control" id="kab_kota" name="kab_kota" required="true" placeholder="Kabupaten/Kota"  value="{{{ old('kab_kota', isset($data)?$data->kab_kota : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('kab_kota')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="kab_kota_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="provinsi" class="col-md-2 col-lg-4 col-form-label">Provinsi:*</label>
                        <div class="col-md-10 col-lg-8">
                            <input type="text" class="form-control" id="provinsi" name="provinsi" required="true" placeholder="Provinsi"  value="{{{ old('provinsi', isset($data)?$data->provinsi : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('provinsi')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="provinsi_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-12"><hr></div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="akreditasi" class="col-md-2 col-lg-4 col-form-label">Akreditasi:*</label>
                        <div class="col-md-10 col-lg-8">
                            <input type="text" class="form-control" id="akreditasi" name="akreditasi" required="true" placeholder="Akreditasi"  value="{{{ old('akreditasi', isset($data)?$data->akreditasi : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('akreditasi')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="akreditasi_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="tahun_akre" class="col-md-2 col-lg-4 col-form-label">Tahun Akreditasi:*</label>
                        <div class="col-md-10 col-lg-8">
                            <input type="text" class="form-control" id="tahun_akre" name="tahun_akre" required="true" placeholder="Tahun Akreditasi"  value="{{{ old('tahun_akre', isset($data)?$data->tahun_akre : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('tahun_akre')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="tahun_akre_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="telp_sekolah" class="col-md-2 col-lg-4 col-form-label">Telepon Sekolah:*</label>
                        <div class="col-md-10 col-lg-8">
                            <input type="text" class="form-control" id="telp_sekolah" name="telp_sekolah" required="true" placeholder="Telepon Sekolah"  value="{{{ old('telp_sekolah', isset($data)?$data->telp_sekolah : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('telp_sekolah')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="telp_sekolah_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="email_sekolah" class="col-md-2 col-lg-4 col-form-label">Email Sekolah:*</label>
                        <div class="col-md-10 col-lg-8">
                            <input type="text" class="form-control" id="email_sekolah" name="email_sekolah" required="true" placeholder="Email Sekolah"  value="{{{ old('email_sekolah', isset($data)?$data->email_sekolah : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('email_sekolah')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="email_sekolah_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="logo_sekolah" class="col-md-2 col-form-label">Logo Perusahaan:</label>
                        <div class="col-md-10">
                            @if (isset($data->logo_sekolah) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["logo_sekolah"]['original']["folder"].$data->logo_sekolah))
                            <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["logo_sekolah"]['original']["folder"].$data->logo_sekolah) }}" target="_blank" class="tableImage">
                                    <img src="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["logo_sekolah"]['original']["folder"].$data->logo_sekolah) }}">
                                </a><br>
                                <div class="form-check form-checkbox">
                                <input class="form-check-input" type="checkbox" name="logo_sekolah_admiko_delete" id="logo_sekolah_admiko_delete" value="1">
                                <label class="form-check-label" for="logo_sekolah_admiko_delete"> {{trans('admiko.remove_file')}}</label>
                            </div>
                            @endif
                            <input type="file" class="imageUpload mt-1" id="logo_sekolah" accept=".jpg,.png,.jpeg" data-type=".jpg,.png,.jpeg"  name="logo_sekolah"  data-selected="{{trans('admiko.selected_image_preview')}}" >
                            <input type="hidden" id="logo_sekolah_admiko_current" name="logo_sekolah_admiko_current" value="{{$data->logo_sekolah??''}}">
                            <div class="invalid-feedback @if ($errors->has('logo_sekolah')) d-block @endif" data-required="{{trans('admiko.required_image')}}" data-size="{{trans('admiko.required_size')}}" data-type="{{trans('admiko.required_type')}}">
                                @if ($errors->has('logo_sekolah')){{ $errors->first('logo_sekolah') }}@endif
                            </div>
                            <small id="logo_sekolah_help" class="text-muted">{{trans("admiko.file_extension_limit")}}.jpg,.png,.jpeg. {{trans("admiko.recommended")}}{{trans("admiko.width")}}512px, {{trans("admiko.height")}}512px. {{trans("admiko.image_action")}}{{trans("admiko.image_action_resize")}}.</small>
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
                    <a href="{{ route("manage.sekolah.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

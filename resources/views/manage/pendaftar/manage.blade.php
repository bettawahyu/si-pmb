@extends("manage.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("manage.pendaftar.index") }}">Pendaftar</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Pendaftar</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("manage.pendaftar.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage pendaftar_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">

                <div class=" col-12">
                    <div class="form-group row">
                        <label for="no_pendaftaran" class="col-md-2 col-form-label">No. Pendaftaran:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="no_pendaftaran" name="no_pendaftaran" required="true" placeholder="No. Pendaftaran"  value="{{{ old('no_pendaftaran', isset($data)?$data->no_pendaftaran : $nopen) }}}" readonly>
                            <div class="invalid-feedback @if ($errors->has('no_pendaftaran')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="no_pendaftaran_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="nama_siswa" class="col-md-2 col-form-label">Nama Siswa:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required="true" placeholder="Nama Siswa"  value="{{{ old('nama_siswa', isset($data)?$data->nama_siswa : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('nama_siswa')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="nama_siswa_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="tempat_lahir" class="col-md-2 col-lg-4 col-form-label">Tempat Lahir:*</label>
                        <div class="col-md-10 col-lg-8">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required="true" placeholder="Tempat Lahir"  value="{{{ old('tempat_lahir', isset($data)?$data->tempat_lahir : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('tempat_lahir')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="tempat_lahir_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="tanggal_lahir" class="col-md-2 col-lg-4 col-form-label">Tanggal Lahir:*</label>
                        <div class="col-md-10 col-lg-8">
                            <div class="input-group" id="datePicker_tanggal_lahir" data-target-input="nearest">
                                <input type="text" autocomplete="off" style="max-width: 170px;border-right: unset;"
                                       data-date_time_format="{{config('admiko_config.form_date_format')}}"
                                       class="form-control datetimepicker-input datePicker"
                                       data-target="#datePicker_tanggal_lahir" required="true" id="tanggal_lahir" data-toggle="datetimepicker"
                                       placeholder="Tanggal Lahir" name="tanggal_lahir" value="{{{ old('tanggal_lahir', isset($data)?$data->tanggal_lahir : '') }}}">
                                <div class="input-group-append input-group-text" data-target="#datePicker_tanggal_lahir" data-toggle="datetimepicker">
                                    <i class="fas fa-calendar-alt fa-fw"></i>
                                </div>
                            </div>
                            <div class="invalid-feedback @if ($errors->has('tanggal_lahir')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="tanggal_lahir_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="agama" class="col-md-2 col-lg-4 col-form-label">Agama:*</label>
                        <div class="col-md-10 col-lg-8">
                            <select class="form-select" id="agama" name="agama" required="true">

                                @foreach($agama_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('agama') ? old('agama') : $data->agama ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('agama')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="agama_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label class="col-form-label col-md-2 col-lg-4">Jenis Kelamin:*</label>
                        <div class="col-md-10 col-lg-8">
                            <div class="row pt-2">
                            @foreach($jenis_kelamin_all as $id => $value)
                                @php $checked = ""; @endphp
                                @if(old('jenis_kelamin') == $id)
                                    @php $checked = "checked"; @endphp
                                @elseIf(isset($data) && $data->jenis_kelamin == $id)
                                    @php $checked = "checked"; @endphp
                                @elseIf($loop->index == 0)
                                @php $checked = "checked"; @endphp
                                @endIf
                                <div class="col-12">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="jenis_kelamin{{ $id }}" value="{{ $id }}" {{$checked}} >
                                        <label class="form-check-label" for="jenis_kelamin{{ $id }}">{{ $value }}</label>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                            <div class="invalid-feedback @if ($errors->has('jenis_kelamin')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="jenis_kelamin_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="alamat" class="col-md-2 col-form-label">Alamat Rumah:*</label>
                        <div class="col-md-10">
                            <textarea class="form-control form-control-textarea " id="alamat" name="alamat" required="true" placeholder="Alamat">{{{ old('alamat', isset($data)?$data->alamat : '') }}}</textarea>
                            <div class="invalid-feedback @if ($errors->has('alamat')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="alamat_help" class="text-muted"></small>
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
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="asal_sekolah" class="col-md-2 col-form-label">Asal Sekolah:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" required="true" placeholder="Asal Sekolah"  value="{{{ old('asal_sekolah', isset($data)?$data->asal_sekolah : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('asal_sekolah')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="asal_sekolah_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12"><hr></div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="nama_ayah" class="col-md-2 col-form-label">Nama Ayah:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" required="true" placeholder="Nama Ayah"  value="{{{ old('nama_ayah', isset($data)?$data->nama_ayah : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('nama_ayah')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="nama_ayah_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row multiSelect">
                        <label for="pekerjaan_ayah" class="col-md-2 col-form-label">Pekerjaan Ayah:*</label>
                        <div class="col-md-10" style="position: relative">
                            <select class="form-select" id="pekerjaan_ayah" name="pekerjaan_ayah" required="true" data-placeholder="{{trans('admiko.select')}}" style="width: 100%" data-width="100%" data-allow-clear="true">

                                @foreach($pekerjaan_orang_tua_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('pekerjaan_ayah') ? old('pekerjaan_ayah') : $data->pekerjaan_ayah ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('pekerjaan_ayah')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="pekerjaan_ayah_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="nama_ibu" class="col-md-2 col-form-label">Nama Ibu:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required="true" placeholder="Nama Ibu"  value="{{{ old('nama_ibu', isset($data)?$data->nama_ibu : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('nama_ibu')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="nama_ibu_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row multiSelect">
                        <label for="pekerjaan_ibu" class="col-md-2 col-form-label">Pekerjaan Ibu:*</label>
                        <div class="col-md-10" style="position: relative">
                            <select class="form-select" id="pekerjaan_ibu" name="pekerjaan_ibu" required="true" data-placeholder="{{trans('admiko.select')}}" style="width: 100%" data-width="100%" data-allow-clear="true">

                                @foreach($pekerjaan_orang_tua_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('pekerjaan_ibu') ? old('pekerjaan_ibu') : $data->pekerjaan_ibu ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('pekerjaan_ibu')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="pekerjaan_ibu_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="nomor_telp" class="col-md-2 col-form-label">Nomor Telp. Ortu:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nomor_telp" name="nomor_telp" required="true" placeholder="Nomor Telp."  value="{{{ old('nomor_telp', isset($data)?$data->nomor_telp : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('nomor_telp')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="nomor_telp_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="kelas" class="col-md-2 col-lg-4 col-form-label">Kelas Pilihan:*</label>
                        <div class="col-md-10 col-lg-8">
                            <select class="form-select" id="kelas" name="kelas" required="true">

                                @foreach($kelas_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('kelas') ? old('kelas') : $data->kelas ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('kelas')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="kelas_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="tahun_ajaran" class="col-md-2 col-lg-4 col-form-label">Tahun Ajaran:*</label>
                        <div class="col-md-10 col-lg-8">
                            <select class="form-select" id="tahun_ajaran" name="tahun_ajaran" required="true">

                                @foreach($tahun_ajaran_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('tahun_ajaran') ? old('tahun_ajaran') : $data->tahun_ajaran ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('tahun_ajaran')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="tahun_ajaran_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="foto_pendaftar" class="col-md-2 col-form-label">Foto Pendaftar:</label>
                        <div class="col-md-10">
                            @if (isset($data->foto_pendaftar) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["foto_pendaftar"]['original']["folder"].$data->foto_pendaftar))
                            <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["foto_pendaftar"]['original']["folder"].$data->foto_pendaftar) }}" target="_blank" class="tableImage">
                                    <img src="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["foto_pendaftar"]['original']["folder"].$data->foto_pendaftar) }}">
                                </a><br>
                                <div class="form-check form-checkbox">
                                <input class="form-check-input" type="checkbox" name="foto_pendaftar_admiko_delete" id="foto_pendaftar_admiko_delete" value="1">
                                <label class="form-check-label" for="foto_pendaftar_admiko_delete"> {{trans('admiko.remove_file')}}</label>
                            </div>
                            @endif
                            <input type="file" class="imageUpload mt-1" id="foto_pendaftar" accept=".jpg,.png,.jpeg" data-type=".jpg,.png,.jpeg"  name="foto_pendaftar"  data-selected="{{trans('admiko.selected_image_preview')}}" >
                            <input type="hidden" id="foto_pendaftar_admiko_current" name="foto_pendaftar_admiko_current" value="{{$data->foto_pendaftar??''}}">
                            <div class="invalid-feedback @if ($errors->has('foto_pendaftar')) d-block @endif" data-required="{{trans('admiko.required_image')}}" data-size="{{trans('admiko.required_size')}}" data-type="{{trans('admiko.required_type')}}">
                                @if ($errors->has('foto_pendaftar')){{ $errors->first('foto_pendaftar') }}@endif
                            </div>
                            <small id="foto_pendaftar_help" class="text-muted">{{trans("admiko.file_extension_limit")}}.jpg,.png,.jpeg. {{trans("admiko.recommended")}}{{trans("admiko.width")}}1024px, {{trans("admiko.height")}}768px. {{trans("admiko.image_action")}}{{trans("admiko.image_action_resize")}}.</small>
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
                    <a href="{{ route("manage.pendaftar.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

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
                        <label for="alamat" class="col-md-2 col-form-label">Alamat:*</label>
                        <div class="col-md-10">
                            <textarea class="form-control form-control-textarea " id="alamat" name="alamat" required="true" placeholder="Alamat">{{{ old('alamat', isset($data)?$data->alamat : '') }}}</textarea>
                            <div class="invalid-feedback @if ($errors->has('alamat')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="alamat_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="nama_orang_tua" class="col-md-2 col-form-label">Nama Orang Tua:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nama_orang_tua" name="nama_orang_tua" required="true" placeholder="Nama Orang Tua"  value="{{{ old('nama_orang_tua', isset($data)?$data->nama_orang_tua : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('nama_orang_tua')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="nama_orang_tua_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row multiSelect">
                        <label for="pekerjaan_orang_tua" class="col-md-2 col-form-label">Pekerjaan Orang Tua:*</label>
                        <div class="col-md-10" style="position: relative">
                            <select class="form-select" id="pekerjaan_orang_tua" name="pekerjaan_orang_tua" required="true" data-placeholder="{{trans('admiko.select')}}" style="width: 100%" data-width="100%" data-allow-clear="true">

                                @foreach($pekerjaan_orang_tua_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('pekerjaan_orang_tua') ? old('pekerjaan_orang_tua') : $data->pekerjaan_orang_tua ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('pekerjaan_orang_tua')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="pekerjaan_orang_tua_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-12">
                    <div class="form-group row">
                        <label for="nomor_telp" class="col-md-2 col-form-label">Nomor Telp.:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nomor_telp" name="nomor_telp" required="true" placeholder="Nomor Telp."  value="{{{ old('nomor_telp', isset($data)?$data->nomor_telp : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('nomor_telp')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="nomor_telp_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="kelas" class="col-md-2 col-lg-4 col-form-label">Kelas:*</label>
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

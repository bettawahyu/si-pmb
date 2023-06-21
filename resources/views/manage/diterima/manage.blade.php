@extends("manage.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("manage.diterima.index") }}">Diterima</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('dokre.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('dokre.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Diterima</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("manage.diterima.index") }}"><i class="fas fa-angle-left"></i> {{trans('dokre.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage diterima_manage dokreForm">
    <legend class="action">{{ isset($data) ? trans('dokre.update') : trans('dokre.add_new') }}</legend>
    <form method="POST" action="{{ $dokre_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row multiSelectSort">
                        <label for="siswa_yang_diterima" class="col-md-2 col-form-label">Siswa Yang Diterima:*</label>
                        <div class="col-md-10" style="position: relative">
                            <select name="siswa_yang_diterima[]" data-placeholder="{{trans('dokre.select_from_list')}}" multiple="multiple" id="siswa_yang_diterima" required="true" style="width: 100%" data-allow-clear="true">
                            @php $orderId=0; @endphp
                            @foreach($pendaftar_all as $id => $value)
                                @php $selected = ""; @endphp
                                @php $orderId++; @endphp
                                @if(in_array($id, old('siswa_yang_diterima', [])))
                                    @php $selected = "selected"; @endphp
                                @elseIf(isset($data) && $data->siswa_yang_diterima_many->contains($id))
                                    @php $selected = "selected"; @endphp
                                    @php $orderId = $data->siswa_yang_diterima_many->firstWhere('id', $id)->pivot->dokre_order; @endphp
                                @endIf
                                <option value="{{ $id }}" {{$selected}} data-order="{{$orderId}}">{{ $value }}</option>
                            @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('siswa_yang_diterima')) d-block @endif">{{trans('dokre.required_text')}}</div>
                            <small id="siswa_yang_diterima_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="tanggal_daftar_ulang" class="col-md-2 col-lg-4 col-form-label">Tanggal Daftar Ulang:*</label>
                        <div class="col-md-10 col-lg-8">
                            <div class="input-group" id="datePicker_tanggal_daftar_ulang" data-target-input="nearest">
                                <input type="text" autocomplete="off" style="max-width: 170px;border-right: unset;"
                                       data-date_time_format="{{config('dokre_config.form_date_format')}}"
                                       class="form-control datetimepicker-input datePicker"
                                       data-target="#datePicker_tanggal_daftar_ulang" required="true" id="tanggal_daftar_ulang" data-toggle="datetimepicker"
                                       placeholder="Tanggal Daftar Ulang" name="tanggal_daftar_ulang" value="{{{ old('tanggal_daftar_ulang', isset($data)?$data->tanggal_daftar_ulang : '') }}}">
                                <div class="input-group-append input-group-text" data-target="#datePicker_tanggal_daftar_ulang" data-toggle="datetimepicker">
                                    <i class="fas fa-calendar-alt fa-fw"></i>
                                </div>
                            </div>
                            <div class="invalid-feedback @if ($errors->has('tanggal_daftar_ulang')) d-block @endif">{{trans('dokre.required_text')}}</div>
                            <small id="tanggal_daftar_ulang_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="batas_daftar_ulang" class="col-md-2 col-lg-4 col-form-label">Batas Daftar Ulang:*</label>
                        <div class="col-md-10 col-lg-8">
                            <div class="input-group" id="datePicker_batas_daftar_ulang" data-target-input="nearest">
                                <input type="text" autocomplete="off" style="max-width: 170px;border-right: unset;"
                                       data-date_time_format="{{config('dokre_config.form_date_format')}}"
                                       class="form-control datetimepicker-input datePicker"
                                       data-target="#datePicker_batas_daftar_ulang" required="true" id="batas_daftar_ulang" data-toggle="datetimepicker"
                                       placeholder="Batas Daftar Ulang" name="batas_daftar_ulang" value="{{{ old('batas_daftar_ulang', isset($data)?$data->batas_daftar_ulang : '') }}}">
                                <div class="input-group-append input-group-text" data-target="#datePicker_batas_daftar_ulang" data-toggle="datetimepicker">
                                    <i class="fas fa-calendar-alt fa-fw"></i>
                                </div>
                            </div>
                            <div class="invalid-feedback @if ($errors->has('batas_daftar_ulang')) d-block @endif">{{trans('dokre.required_text')}}</div>
                            <small id="batas_daftar_ulang_help" class="text-muted"></small>
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
                    <a href="{{ route("manage.diterima.index") }}" class="btn btn-secondary float-end" role="button">{{trans('dokre.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
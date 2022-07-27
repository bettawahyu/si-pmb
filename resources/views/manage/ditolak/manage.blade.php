@extends("manage.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("manage.ditolak.index") }}">Ditolak</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Ditolak</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("manage.ditolak.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage ditolak_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">

                <div class=" col-12">
                    <div class="form-group row multiSelect">
                        <label for="siswa_yang_ditolak" class="col-md-2 col-form-label">Siswa Yang Ditolak:*</label>
                        <div class="col-md-10" style="position: relative">
                            <select name="siswa_yang_ditolak[]" data-placeholder="{{trans('admiko.select_from_list')}}" multiple="multiple" id="siswa_yang_ditolak" required="true" style="width: 100%" data-allow-clear="true">
                            @php $orderId=0; @endphp
                            @foreach($pendaftar_all as $id => $value)
                                @php $selected = ""; @endphp
                                @php $orderId++; @endphp
                                @if(in_array($id, old('siswa_yang_ditolak', [])))
                                    @php $selected = "selected"; @endphp
                                @elseIf(isset($data) && $data->siswa_yang_ditolak_many->contains($id))
                                    @php $selected = "selected"; @endphp
                                    @php $orderId = $data->siswa_yang_ditolak_many->firstWhere('id', $id)->pivot->admiko_order; @endphp
                                @endIf
                                <option value="{{ $id }}" {{$selected}} data-order="{{$orderId}}">{{ $value }}</option>
                            @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('siswa_yang_ditolak')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="siswa_yang_ditolak_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="status_penolakan" class="col-md-2 col-form-label">Alasan Penolakan:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="status_penolakan" name="status_penolakan" >
                                <option value="">{{trans("admiko.select")}}</option>
                                @foreach($status_penolakan_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('status_penolakan') ? old('status_penolakan') : $data->status_penolakan ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('status_penolakan')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="status_penolakan_help" class="text-muted"></small>
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
                    <a href="{{ route("manage.ditolak.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

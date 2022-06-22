@extends("manage.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("manage.tahun_ajaran.index") }}">Tahun Ajaran</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Tahun Ajaran</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("manage.tahun_ajaran.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage tahun_ajaran_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="tahun_ajaran" class="col-md-2 col-form-label">Tahun Ajaran:*</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" required="true" placeholder="Tahun Ajaran"  value="{{{ old('tahun_ajaran', isset($data)?$data->tahun_ajaran : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('tahun_ajaran')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="tahun_ajaran_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Status Aktif:*</label>
                        <div class="col-md-10">
                            <div class="row pt-2">
                            @foreach($status_aktif_all as $id => $value)
                                @php $checked = ""; @endphp
                                @if(old('status_aktif') == $id)
                                    @php $checked = "checked"; @endphp
                                @elseIf(isset($data) && $data->status_aktif == $id)
                                    @php $checked = "checked"; @endphp
                                @elseIf($loop->index == 0)
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
                            <div class="invalid-feedback @if ($errors->has('status_aktif')) d-block @endif">{{trans('admiko.required_text')}}</div>
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
                    <button type="submit" class="btn btn-primary float-start me-1 mb-1 mb-sm-0 save-button">{{trans('admiko.table_save')}}</button>
                    <a href="{{ route("manage.tahun_ajaran.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
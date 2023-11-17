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
            <div class="tableLayout pb-2">
                    <table class="table" data-dom="tr" data-page-length='-1'>
                    <thead>
                        <tr data-sort-method='thead'>
							<th scope="col" class="text-nowrap" data-orderable="false">Nama Dokumen</th>
							<th scope="col" class="text-nowrap" data-orderable="false">Berkas Dokumen</th>
                            <th scope="col" class="w-5 no-sort" data-orderable="false">Unduh</th>
                            @if(Gate::allows('dokumen_pendaftar_allow'))
                            <th scope="col" class="w-5 no-sort" data-orderable="false">{{trans('dokre.table_delete')}}</th>
                            @endIf
                        </tr>
                    </thead>
                    @foreach ($dokumen as $dok)
                    <tbody>
                        <tr>
							<td class="text-nowrap">{{$dok->dok_unggah->nama_dokumen??""}}</td>
							<td class="text-nowrap">
                                <img class="myImages" id="myImg" src="/upload/dokumen/{{trim($dok->dokumen,'"')}}" alt="{{$dok->dok_unggah->nama_dokumen??""}}" style="width:100px;max-width:100px">
                                {{-- Modal untuk image (PDF Masih ongoing) --}}
                                <div id="imgModal" class="modals">
                                <span class="closed">&times;</span>
                                <img class="modals-content" id="img01">
                                <div id="caption"></div>
                                </div>
                            <td class="w-5 no-sort"><a href="/upload/dokumen/{{trim(($dok->dokumen),'"')}}" download><i class="fas fa-download fa-fw"></i></a></td>
                            @if(Gate::allows(['dokumen_pendaftar_allow']))
                            <td class="w-5 no-sort">
                            <a href="#" data-id="{{$dok->id}}" class="dokre_deleteConfirm" data-bs-toggle="modal" data-bs-target="#deleteConfirm"><i class="fas fa-trash fa-fw"></i></a>
                             </td>
                            @endIf
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
        @if(Gate::allows('agama_allow'))
    <!-- Delete confirm -->
    <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="deleteConfirm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="post" class="w-100" action="{{route("manage.dokumen.delete")}}">
            @method('DELETE')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('dokre.delete_confirm')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">{{trans('dokre.delete_message')}}</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('dokre.delete_close_btn')}}</button>
                    <button type="submit" class="btn btn-danger deleteSoft">{{trans('dokre.delete_delete_btn')}}</button>
                </div>
            </div>
            <div class="dataDelete"></div>
            </form>
        </div>
    </div>
    @endIf
</div>
<script type="text/javascript">
var modal = document.getElementById('imgModal');
var images = document.getElementsByClassName('myImages');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

for (var i = 0; i < images.length; i++) {
  var img = images[i];
  img.onclick = function(evt) {
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }
}

var span = document.getElementsByClassName("closed")[0];
span.onclick = function() {
  modal.style.display = "none";
}
</script>
@endsection

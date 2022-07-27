{{--IMPORTANT: this page will be overwritten and any change will be lost!! Use custom_sidebar_bottom.blade.php and custom_sidebar_top.blade.php--}}

@if(Gate::any(['pendaftar_allow','pendaftar_edit','diterima_allow','diterima_edit','ditolak_allow','ditolak_edit']))
<li class="nav-item dropdown{{ $admiko_data['sideBarActiveFolder'] === "dropdown_pendaftaran" ? " open" : "" }}">
    <a href="#" class="nav-link dropdown-link"><i class="fas fa-id-card fa-fw"></i>Pendaftaran</a>
    <ul class="nav flex-column dropdown-content" {!! $admiko_data['sideBarActiveFolder'] === "dropdown_pendaftaran" ? ' style="display:block"' : '' !!}>
	@if(Gate::any(['pendaftar_allow', 'pendaftar_edit']))
		<li class="nav-item{{ $admiko_data['sideBarActive'] === "pendaftar" ? " active" : "" }}"><a class="nav-link dropdown-item" href="{{route('manage.pendaftar.index')}}"><i class="fas fa-address-book fa-fw"></i>Pendaftar</a></li>
	@endIf
	@if(Gate::any(['diterima_allow', 'diterima_edit']))
		<li class="nav-item{{ $admiko_data['sideBarActive'] === "diterima" ? " active" : "" }}"><a class="nav-link dropdown-item" href="{{route('manage.diterima.index')}}"><i class="fas fa-check fa-fw"></i>Diterima</a></li>
	@endIf
	@if(Gate::any(['ditolak_allow', 'ditolak_edit']))
		<li class="nav-item{{ $admiko_data['sideBarActive'] === "ditolak" ? " active" : "" }}"><a class="nav-link dropdown-item" href="{{route('manage.ditolak.index')}}"><i class="fas fa-user-times fa-fw"></i>Ditolak</a></li>
	@endIf
    </ul>
</li>
@endIf
@if(Gate::any(['agama_allow','agama_edit','jenis_kelamin_allow','jenis_kelamin_edit','kelas_allow','kelas_edit','pekerjaan_orang_tua_allow','pekerjaan_orang_tua_edit','tahun_ajaran_allow','tahun_ajaran_edit','unggah_dokumen_allow','unggah_dokumen_edit']))
<li class="nav-item dropdown{{ $admiko_data['sideBarActiveFolder'] === "dropdown_settings" ? " open" : "" }}">
    <a href="#" class="nav-link dropdown-link"><i class="fas fa-tools fa-fw"></i>Settings</a>
    <ul class="nav flex-column dropdown-content" {!! $admiko_data['sideBarActiveFolder'] === "dropdown_settings" ? ' style="display:block"' : '' !!}>
        <li class="nav-item">
            <div class="menu-title">
                <div>Apps Configuration</div>
            </div>
        </li>
    @if(Gate::any(['sekolah_allow', 'sekolah_edit']))
		<li class="nav-item{{ $admiko_data['sideBarActive'] === "sekolah" ? " active" : "" }}"><a class="nav-link dropdown-item" href="{{route('manage.sekolah.index')}}"><i class="fas fa-school fa-fw"></i>Data Sekolah</a></li>
	@endIf
    	@if(Gate::any(['menu_allow', 'menu_edit']))
		<li class="nav-item{{ $admiko_data['sideBarActive'] === "menu" ? " active" : "" }}"><a class="nav-link dropdown-item" href="{{route('manage.menu.index')}}"><i class="fas fa-list fa-fw"></i>Menu</a></li>
	@endIf
	@if(Gate::any(['agama_allow', 'agama_edit']))
		<li class="nav-item{{ $admiko_data['sideBarActive'] === "agama" ? " active" : "" }}"><a class="nav-link dropdown-item" href="{{route('manage.agama.index')}}"><i class="fas fa-mosque fa-fw"></i>Agama</a></li>
	@endIf
	@if(Gate::any(['jenis_kelamin_allow', 'jenis_kelamin_edit']))
		<li class="nav-item{{ $admiko_data['sideBarActive'] === "jenis_kelamin" ? " active" : "" }}"><a class="nav-link dropdown-item" href="{{route('manage.jenis_kelamin.index')}}"><i class="fas fa-transgender fa-fw"></i>Jenis Kelamin</a></li>
	@endIf
	@if(Gate::any(['kelas_allow', 'kelas_edit']))
		<li class="nav-item{{ $admiko_data['sideBarActive'] === "kelas" ? " active" : "" }}"><a class="nav-link dropdown-item" href="{{route('manage.kelas.index')}}"><i class="fas fa-chalkboard-teacher fa-fw"></i>Kelas</a></li>
	@endIf
	@if(Gate::any(['pekerjaan_orang_tua_allow', 'pekerjaan_orang_tua_edit']))
		<li class="nav-item{{ $admiko_data['sideBarActive'] === "pekerjaan_orang_tua" ? " active" : "" }}"><a class="nav-link dropdown-item" href="{{route('manage.pekerjaan_orang_tua.index')}}"><i class="fas fa-user-lock fa-fw"></i>Pekerjaan Orang Tua</a></li>
	@endIf
	@if(Gate::any(['tahun_ajaran_allow', 'tahun_ajaran_edit']))
		<li class="nav-item{{ $admiko_data['sideBarActive'] === "tahun_ajaran" ? " active" : "" }}"><a class="nav-link dropdown-item" href="{{route('manage.tahun_ajaran.index')}}"><i class="fas fa-calendar-check fa-fw"></i>Tahun Ajaran</a></li>
	@endIf
	@if(Gate::any(['unggah_dokumen_allow', 'unggah_dokumen_edit']))
		<li class="nav-item{{ $admiko_data['sideBarActive'] === "unggah_dokumen" ? " active" : "" }}"><a class="nav-link dropdown-item" href="{{route('manage.unggah_dokumen.index')}}"><i class="fas fa-paper-plane fa-fw"></i>Unggah Dokumen</a></li>
	@endIf
    </
ul>
</li>
@endIf

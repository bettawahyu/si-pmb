<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('manage.layouts.header_custom_top')
    @include('manage.layouts.header_scripts')
    @include('manage.layouts.header_custom_bottom')
    @php
        use Illuminate\Support\Facades\DB;
        $logo = DB::table('Sekolah')->first();
    @endphp
    <title>Dokre</title>
</head>
<body>
<div class="containerBox">
    <header>
        <nav class="navbar">
            <div class="navbar-header d-flex justify-content-center align-items-center" style="padding-top:3px; padding-bottom:3px">
                <a class="navbar-brand" href="{{route("manage.home")}}" >
                   <img src="{{ asset('upload/logo/'.$logo->logo_sekolah) }}"><br>
                   {{$logo->nama_sekolah}} <br>
                </a>
            </div>
            <div class="sidebar">
                <div class="sidebar-user">
                    <a href="{{route("manage.myaccount")}}">
                        <img src="{{auth()->user()->image}}" class="img-fluid">
                    </a>
                    <div class="sidebar-user-name">{{auth()->user()->name}}</div>
                    <div class="sidebar-user-email">{{auth()->user()->email}}</div>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <div class="menu-title">
                            <div>Menu</div>
                        </div>
                    </li>
                    <li class="nav-item page{{ $dokre_data['sideBarActive'] === "home" ? " active" : "" }}">
                        <a class="nav-link" href="{{route("manage.home")}}"><i class="fas fa-home fa-fw"></i>{{ trans('dokre.home') }}</a>
                    </li>
                    @include('manage.custom_sidebar_top')
                    {{--!!! To prevent overwriting please add your links into custom_sidebar!!!--}}
                    @include('manage.dokre_sidebar')
                    {{--!!! To prevent overwriting please add your links into custom_sidebar!!!--}}
                    @include('manage.custom_sidebar_bottom')
                    @include('manage.layouts.dokre_developer_sidebar')
                </ul>
            </div>
        </nav>
        <footer>
            <a href="https://dokre.com" target="_blank">&copy; {{date("Y")}} Powered by ADMIKO</a>
        </footer>
    </header>
    <div class="main">
        <div class="mainBoxHeader">
            <nav class="navbar navbar-expand">
                <a class="sidebar-toggle d-flex me-2" href="#">
                    <i class="fas fa-bars fa-fw"></i>
                </a>
                @if(count(config('dokre_global_search'))>0 || count(config('dokre_global_search_custom'))>0)
                    <div class="dokreGlobalSearch">
                        <input name="search" type="text" placeholder="{{ trans('dokre.search') }}" autocomplete="off">
                        <div class="dokreGlobalSearchResults"></div>
                    </div>
                @endif
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item navbar-user d-flex flex-row">
                        <div>
                            <div class="sidebar-user-name">{{auth()->user()->name}}</div>
                            <div class="sidebar-user-email">{{auth()->user()->email}}</div>
                        </div>
                        <a class="nav-link" href="{{route("manage.myaccount")}}">
                            <img src="{{auth()->user()->image}}" class="img-fluid rounded-circle">
                        </a>
                    </li>
                    <li class="nav-item myaccount{{ $dokre_data['sideBarActive'] === "myaccount" ? " active" : "" }}">
                        <a class="nav-link" href="{{route("manage.myaccount")}}" title="{{ trans('dokre.myaccount') }}"><i class="fas fa-user fa-fw"></i></a>
                    </li>
                    <li class="nav-item logout">
                        <a class="nav-link" href="{{route("manage.logout")}}" title="{{ trans('dokre.logout') }}"><i class="fas fa-power-off fa-fw"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="mainBoxBreadcrumb">
            <div class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route("manage.home")}}"><i class="fas fa-home"></i>{{ trans('dokre.home') }}</a></li>
                @yield('breadcrumbs')
            </div>
        </div>
        <div class="mainBoxTitle">
            @yield('pageTitle')
        </div>
        <div class="mainBoxInfo">@yield('pageInfo')</div>

        <div class="mainBoxBackBtn">
            @yield('backBtn')
        </div>
        <div class="mainBoxContent">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="content">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('manage.layouts.footer_custom_top')
@include('manage.layouts.footer_scripts')
@include('manage.layouts.footer_custom_bottom')
</body>
</html>

@if(auth()->user()->role_id == 1)
    <li class="nav-item">
        <div class="menu-title">
            <div>{{ trans('admiko.developer_tools') }}</div>
        </div>
    </li>
    <li class="nav-item myaccount{{ $admiko_data['sideBarActive'] === "myaccount" ? " active" : "" }}">
        <a class="nav-link" href="{{route("manage.myaccount")}}"><i class="fas fa-user fa-fw"></i>{{ trans('admiko.myaccount') }}</a>
    </li>
    <li class="nav-item{{ $admiko_data['sideBarActive'] === "admikoAdmins" ? " active" : "" }}">
        <a class="nav-link" href="{{route("manage.admins.index")}}"><i class="fas fa-users fa-fw"></i>{{trans('admiko.developer_users') }}</a>
    </li>
    <li class="nav-item{{ $admiko_data['sideBarActive'] === "admiko_auditable_logs" ? " active" : "" }}">
        <a class="nav-link" href="{{route('manage.admiko_auditable_logs.index')}}"><i class="fas fas fa-filter fa-fw fa-fw"></i>{{trans('admiko.developer_logs') }}</a>
    </li>
    <li class="nav-item logout">
        <a class="nav-link" href="{{route("manage.logout")}}"><i class="fas fa-power-off fa-fw"></i>{{ trans('admiko.logout') }}</a>
    </li>
@endif

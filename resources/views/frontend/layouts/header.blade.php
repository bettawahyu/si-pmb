<!DOCTYPE html>
<html lang="en">
    @include('frontend.layouts.header_scripts')
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    @include('frontend.layouts.menu')
    {{-- @include('frontend.layouts.flash') --}}
    @yield('content')
    @include('frontend.layouts.footer_scripts')

</body>
</html>

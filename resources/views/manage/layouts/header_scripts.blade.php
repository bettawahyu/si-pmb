<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('assets/dokre/vendors/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dokre/vendors/fontawesome/css/all.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dokre/vendors/datepicker/tempusdominus-bootstrap-4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dokre/vendors/select2/css/select2.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dokre/vendors/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dokre/vendors/dropzone-5.7.0/dist/min/dropzone.min.css') }}">
<script src="{{ asset('assets/dokre/vendors/dropzone-5.7.0/dist/min/dropzone.min.js') }}"></script>

<link rel="stylesheet" href="{{ asset('assets/dokre/css/theme')}}/{{auth()->user()->theme}}/theme.css">
<!-- add custom CSS here-->
<link rel="stylesheet" href="{{ asset('assets/dokre/css/style.css') }}">

<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/dokre/fav/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/dokre/fav/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/dokre/fav/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('assets/dokre/fav/site.webmanifest') }}">
<style type="text/css">
.warn {
  color: red;
  text-align: left;
  font-size: 14px;
  font-weight: bold;
  animation: blinker 1s linear infinite;
}
.info {
  color:limegreen;
  text-align: left;
  font-size: 14px;
  font-weight: bold;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}

</style>

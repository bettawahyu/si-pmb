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

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {
  opacity: 0.7;
}

.modals {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0, 0, 0);
  background-color: rgba(0, 0, 0, 0.9);
}

.modals-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

.modals-content,
#caption {
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {
    transform: scale(0)
  }
  to {
    transform: scale(1)
  }
}

.closed {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.closed:hover,
.closed:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

@media only screen and (max-width: 700px) {
  .modals-content {
    width: 100%;
  }
}
</style>

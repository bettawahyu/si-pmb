<script>
    var noTableData = '{{trans('dokre.noTableData')}}';
    var tableInfo = '{{trans('dokre.tableInfo')}}';
    var dragDropTableInfo = '{{trans('dokre.dragDropTableInfo')}}';
    var lengthMenu = {!!config("dokre_config.length_menu_table_JS")!!};
    var csrf_token = "{{ csrf_token() }}";
    var mapStartZoom = {{config('dokre_config.map_start_zoom')}};
    var mapStarLatitude = {{config('dokre_config.map_star_latitude')}};
    var mapStarLongitude = {{config('dokre_config.map_star_longitude')}};
    /*Dokre Global Search*/
    var DokreGlobalSearchUrl = '{{route("manage.dokre_global_search")}}';
    var searchTypeMore = '{{trans('dokre.search_type_more')}}';
    var searchNoResults = '{{trans('dokre.search_no_results')}}';
    var searchError = '{{trans('dokre.search_error')}}';
</script>
<script src="{{ asset('assets/dokre/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/dokre/vendors/jquery/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/dokre/vendors/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/dokre/vendors/datepicker/moment.min.js') }}"></script>
<script src="{{ asset('assets/dokre/vendors/datepicker/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('assets/dokre/vendors/select2/js/select2.full.js') }}"></script>
<script src="{{ asset('assets/dokre/vendors/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/dokre/vendors/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/dokre/vendors/listjs/list.min.js') }}"></script>
<script src="{{ asset('assets/dokre/js/global.js') }}"></script>
<script src="{{ asset('assets/dokre/js/index_start.js') }}"></script>
<script src="{{ asset('assets/dokre/js/form_start.js') }}"></script>
<script src="{{ asset('assets/dokre/js/form_validate.js') }}"></script>
<script src="{{ asset('assets/dokre/js/avatar.js') }}"></script>
@if(config('dokre_config.google_map_api_key'))
    <script src="//maps.googleapis.com/maps/api/js?key={{config('dokre_config.google_map_api_key')}}&callback=startGoogleMaps" async defer></script>
@endIf
@if(config('dokre_config.bing_map_api_key'))
    <script>
        var bingKey = "{{config('dokre_config.bing_map_api_key')}}";
    </script>
    <script type='text/javascript' src='//www.bing.com/api/maps/mapcontrol?callback=startBingMaps' async defer></script>
@endIf
@stack('footerCode')

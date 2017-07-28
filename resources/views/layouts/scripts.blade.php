<!-- Scripts -->
<script src="{{ asset('js/oneui.min.js') }}"></script>
@yield('scripts')
@stack('scripts')
@include('layouts.admin.partials._sweetalert')
<script>
    $('.search').keyup(function (event) {
        if (event.which == 13) {
            event.preventDefault();
        }
        buscar()
    })
    
    function buscar() {
        var search = $('.search');
        var data   = $('#search').serialize();
        var url    = $('#search').attr('action');
        var parent = $('#search').parent();
        $('#results_search').remove();
        if (search.val().length > 2) {
            $.ajax({
                type: 'GET',
                url: url,
                data: data,
                success: function (msg) {
                    parent.append('<div id="results_search" style=" position: absolute;top: 50px;right: 0px;z-index: 10000;"></div>')
                    $('#results_search').html(msg)
                }
            })
        }
    }
</script>




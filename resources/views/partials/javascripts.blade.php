<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/admin.js')}}"></script>

<script>
    window._token = '{{ csrf_token() }}';
</script>
@yield('javascript')
<script>
    // success message popup notification
    @if (Session::has('success'))
        toastr.options = {
            "positionClass": "toast-top-center",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.success("{{ Session::get('success') }}");
    @endif
    // error message popup notification
    @if ($errors->any())
        toastr.options = {
            "positionClass": "toast-top-center",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        @foreach ($errors->all() as $item)
            toastr.error("{{ $item }}");
        @endforeach
    @endif
</script>

<!-- jQuery 3 -->
<script src="{!! asset('admin/bower_components/jquery/dist/jquery.min.js') !!}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{!! asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
<!-- iCheck -->
<script src="{!! asset('admin/plugins/iCheck/icheck.min.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('admin/js/adminlte.min.js') !!}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": true,
      "progressBar": false,
      @if(app()->getLocale() == 'ar')
      "positionClass": "toast-top-left",
      @else
      "positionClass": "toast-top-right",
      @endif
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "10000",
      "extendedTimeOut": "10000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }

    @foreach($errors->all() as $error)
        toastr.error("{!! $error !!}");
    @endforeach

    @if(session('success'))
        toastr.success("{!! session('success') !!}");
    @endif

    @if(session('error'))
        toastr.error("{!! session('error') !!}");
    @endif

    @if(session('info'))
        toastr.info("{!! session('info') !!}");
    @endif
    
    @if(session('warning'))
        toastr.warning("{!! session('warning') !!}");
    @endif
</script>

@yield('js')
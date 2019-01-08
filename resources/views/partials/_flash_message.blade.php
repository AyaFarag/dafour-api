@section('js')

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    @if (session()->get('errors'))

        <script>


            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-full-width",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            @if( session()->get('errors')->student )
                @foreach (session()->get('errors')->student->all() as $error1)
                    toastr.error( "{{ $error1  }}") ;
                @endforeach
            @endif
            @if( session()->get('errors')->professional )
                @foreach (session()->get('errors')->professional->all() as $error2)
                toastr.error( "{{ $error2  }}" );
                @endforeach
            @endif

            @foreach (session()->get('errors')->all() as $error3)
            toastr.error( "{{ $error3  }}" );
            @endforeach
        </script>
    @endif

    @if(session()->has('success'))
        <script>
            toastr.success( "{{ session('success') }}") ;
        </script>
    @endif


@append

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dafour</title>
    <link rel="stylesheet" href="{!! asset('site/css/main.css') !!}">

    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{!! asset('site/css/rtl.css') !!}">
    @endif
    
    <link rel="stylesheet" href="{!! asset('site/css/tagsinput.css') !!}">
    <link rel="stylesheet" href="{!! asset('site/css/bootstrap-combobox.css') !!}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    @yield('css')

</head>
@extends('layouts.base')

@section('body')

@stop

@section('js')
<script src="{!! asset('site/js/build.min.js') !!}"></script>
<script src="{!! asset('site/js/fastselect.standalone.js') !!}"></script>
<script src="{!! asset('site/js/jquery.easing.min.js') !!}"></script>
<script src="{!! asset('site/js/masterslider.min.js') !!}"></script>
<script src="{!! asset('site/js/masterslider.partialview.dev.js') !!}"></script>
@append
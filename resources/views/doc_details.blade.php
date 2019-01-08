@extends('layouts.base')

@section('body')
    <main class="profile">
        <section class=" position-relative m-0 p-0 d-block w-100 m-auto documents h-100 pb-3">
            @include('partials.header')
            <div class="container position-relative text-center mt-1 popups__signin">
                <div class="clearfix"></div>
                <div class="m-auto m-0 p-0">
                    <div class="popups__signing mt-4 mb-4 p-4 w-100 h-100 account-setting">
                        <div>
                            <figcaption class="documents__containers__paper col-md-12 mb-3">
                                <h3 class="h3 font-weight-bold text-center documents__containers__paper__title">{{ $paper->title }}</h3>
                                <ul class="row text-left m-0 p-1 documents__containers__paper__details list-unstyled">
                                    <li class="col align-self-center p-0 m-0"><img
                                            class="float-left p-1 documents__containers__paper__details__img"
                                            src="{!! asset('site/images/reference.png') !!}"/>
                                        <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">
                                            <b>@lang('site.Abstract'):</b></p><br>
                                        <p class="pl-3 pr-3 pt-2 expandBlock documents__containers__paper__abstract text-justify">{{ $paper->abstract }}</p></li>

                                </ul>


                                <ul class="row text-left m-0 p-1 documents__containers__paper__details list-unstyled">
                                    <li class="col align-self-center p-0 m-0"><img
                                            class="float-left p-1 documents__containers__paper__details__img"
                                            src="{!! asset('site/images/authors.png') !!}"/>
                                        <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">
                                            <b>@lang('site.Authors')</b></p></li>
                                    <p class="col align-self-center p-0 m-0 documents__containers__paper__details__name">
                                        @php $authors = ""; @endphp
                                        @foreach($paper->professionals as $pro)
                                            @php $authors .= $pro->fullName . ", "; @endphp
                                        @endforeach
                                        {{ trim($authors, ', ') }}
                                    </p>
                                </ul>
                                <ul class="row text-left m-0 p-1 documents__containers__paper__details list-unstyled">
                                    <li class="col align-self-center p-0 m-0"><img
                                            class="float-left p-1 documents__containers__paper__details__img"
                                            src="{!! asset('site/images/published-year.png') !!}"/>
                                        <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">
                                            <b>@lang('site.Publication Date')</b></p></li>
                                    <p class="col align-self-center p-0 m-0 documents__containers__paper__details__name">{{ $paper->publication_date }}</p>
                                </ul>
                                <ul class="row text-left m-0 p-1 documents__containers__paper__details list-unstyled">
                                    <li class="col align-self-center p-0 m-0"><img
                                            class="float-left p-1 documents__containers__paper__details__img"
                                            src="{!! asset('site/images/location.png') !!}"/>
                                        <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">
                                            <b>@lang('site.Organization')</b></p></li>
                                    <p class="col align-self-center p-0 m-0 documents__containers__paper__details__name">
                                        {!! $paper->school->{'title_' . app()->getLocale()} !!}
                                    </p>
                                </ul>
                                <ul class="row text-left m-0 p-1 documents__containers__paper__details list-unstyled">
                                    <li class="col align-self-center p-0 m-0"><img
                                            class="float-left p-1 documents__containers__paper__details__img"
                                            src="{!! asset('site/images/keywords.png') !!}"/>
                                        <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">
                                            <b>@lang('site.Keywords')</b></p><br>


                                        <ol class="nav pl-3 pr-3 w-100">
                                            @foreach($paper->keywords as $keyword)
                                                <li class="nav-item border-light m-1 p-1">{{ $keyword->title }}</li>
                                            @endforeach
                                        </ol>
                                    </li>
                                </ul>
                                <div class="clearfix text-right">
                                    {!! Form::open(['route' => ['papers.download', $paper->id], 'method' => 'post']) !!}
                                    <button type="submit"
                                            class="btn btn-sm mt-2 mb-2 documents__containers__paper__details__btn">
                                        @lang('site.Download Doc')
                                    </button>
                                    {!! Form::close() !!}
                                </div>
                            </figcaption>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        @include('partials.footer')
    </main>
@stop

@section('js')
    <script src="{!! asset('site/js/build.min.js') !!}"></script>
    <script src="{!! asset('site/js/fastselect.standalone.js') !!}"></script>
    <script src="{!! asset('site/js/jquery.easing.min.js') !!}"></script>
    <script src="{!! asset('site/js/masterslider.min.js') !!}"></script>
    <script src="{!! asset('site/js/masterslider.partialview.dev.js') !!}"></script>
    <script src="{!! asset('site/js/jquery.collapser.min.js') !!}"></script>
    <script>
        $('.expandBlock').collapser({
            mode: 'words',
            truncate: 100
        });
    </script>
    <script>
    $("#location_id").on("change", function(){
        let id = $("#location_id").val();
        $.ajax({
            url: "{!! url('schools') !!}/" + id,
            method: 'GET',
            success: function(response) {
                let html = "<option value=''>Choose School...</option>";
                $.each(response, function(id, school){
                    html += "<option value=" + id + ">" + school + "</option>";
                });
                $("#school_id").html(html);
            }
        });
    });
    </script>
@append
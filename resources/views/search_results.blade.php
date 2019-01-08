@extends('layouts.base')

@section('body')
    <section class="fullscreen position-relative m-0 p-0 d-block w-100 h-100 m-auto">
        <div class="fullscreen__img position-absolute"></div>
        @include('partials.header')
        <!-- template -->
        <div class="ms-partialview-template" id="partial-view-1">
            <!-- masterslider -->
            <div class="master-slider ms-skin-default" id="masterslider">
                <div class="ms-slide">
                    <img src="{!! asset("site/images/blank.gif") !!}" data-src="{!! asset("site/images/imgholder.jpg") !!}" alt="lorem ipsum dolor sit"/>
                    <div class="ms-info">
                        <h3 class="font-weight-bold text-center h3">Article Title</h3>
                        <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                            interested.
                            Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also
                            reproduced
                            in their exact original form, accompanied by English versions from the 1914 translation by
                            H.
                            Rackham.
                        </p>
                        <button type="button" class="btn btn-sm mt-2 mb-2 documents__containers__paper__details__btn">
                        Read More
                        </button>
                    </div>
                </div>
                <div class="ms-slide">
                    <img src="{!! asset("site/images/blank.gif") !!}" data-src="{!! asset("site/images/imgholder.jpg") !!}" alt="lorem ipsum dolor sit"/>
                    <div class="ms-info">
                        <h3 class="font-weight-bold text-center h3">Article Title</h3>
                        <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                            interested.
                            Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also
                            reproduced
                            in their exact original form, accompanied by English versions from the 1914 translation by
                            H.
                            Rackham.
                        </p>
                        <button type="button" class="btn btn-sm mt-2 mb-2 documents__containers__paper__details__btn">
                        Read More
                        </button>
                    </div>
                </div>
                <div class="ms-slide">
                    <img src="{!! asset("site/images/blank.gif") !!}" data-src="{!! asset("site/images/imgholder.jpg") !!}" alt="lorem ipsum dolor sit"/>
                    <div class="ms-info">
                        <h3 class="font-weight-bold text-center h3">Article Title</h3>
                        <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                            interested.
                            Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also
                            reproduced
                            in their exact original form, accompanied by English versions from the 1914 translation by
                            H.
                            Rackham.
                        </p>
                        <button type="button" class="btn btn-sm mt-2 mb-2 documents__containers__paper__details__btn">
                        Read More
                        </button>
                    </div>
                </div>
                <div class="ms-slide">
                    <img src="{!! asset("site/images/blank.gif") !!}" data-src="{!! asset("site/images/imgholder.jpg") !!}" alt="lorem ipsum dolor sit"/>
                    <div class="ms-info">
                        <h3 class="font-weight-bold text-center h3">Article Title</h3>
                        <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                            interested.
                            Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also
                            reproduced
                            in their exact original form, accompanied by English versions from the 1914 translation by
                            H.
                            Rackham.
                        </p>
                        <button type="button" class="btn btn-sm mt-2 mb-2 documents__containers__paper__details__btn">
                        Read More
                        </button>
                    </div>
                </div>
                <div class="ms-slide">
                    <img src="{!! asset("site/images/blank.gif") !!}" data-src="{!! asset("site/images/imgholder.jpg") !!}" alt="lorem ipsum dolor sit"/>
                    <div class="ms-info">
                        <h3 class="font-weight-bold text-center h3">Article Title</h3>
                        <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                            interested.
                            Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also
                            reproduced
                            in their exact original form, accompanied by English versions from the 1914 translation by
                            H.
                            Rackham.
                        </p>
                        <button type="button" class="btn btn-sm mt-2 mb-2 documents__containers__paper__details__btn">
                        Read More
                        </button>
                    </div>
                </div>
                <div class="ms-slide">
                    <img src="{!! asset("site/images/blank.gif") !!}" data-src="{!! asset("site/images/imgholder.jpg") !!}" alt="lorem ipsum dolor sit"/>
                    <div class="ms-info">
                        <h3 class="font-weight-bold text-center h3">Article Title</h3>
                        <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                            interested.
                            Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also
                            reproduced
                            in their exact original form, accompanied by English versions from the 1914 translation by
                            H.
                            Rackham.
                        </p>
                        <button type="button" class="btn btn-sm mt-2 mb-2 documents__containers__paper__details__btn">
                        Read More
                        </button>
                    </div>
                </div>
                <div class="ms-slide">
                    <img src="{!! asset("site/images/blank.gif") !!}" data-src="{!! asset("site/images/imgholder.jpg") !!}" alt="lorem ipsum dolor sit"/>
                    <div class="ms-info">
                        <h3 class="font-weight-bold text-center h3">Article Title</h3>
                        <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                            interested.
                            Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also
                            reproduced
                            in their exact original form, accompanied by English versions from the 1914 translation by
                            H.
                            Rackham.
                        </p>
                        <button type="button" class="btn btn-sm mt-2 mb-2 documents__containers__paper__details__btn">
                        Read More
                        </button>
                    </div>
                </div>
            </div>
            <!-- end of masterslider -->
        </div>
        <!-- end of template -->
    </section>
    <section class="position-relative row p-0 m-0 pb-4 documents">
        <div class="documents__search w-75 m-auto">
            {!! Form::open(['route' => 'search', 'method' => 'get', 'class' => 'attireCodeToggleBlock']) !!}
                <div class="row m-0 p-0">
                    <div class="col-md-12 p-0">
                        <div class="row m-0 p-0">
                            <div class="col p-0">
                                {!! Form::select('education_type', config('education_types.' . app()->getLocale()), null, ['id' => 'education_type', 'placeholder' => 'Education Type...', 'class' => 'singleSelect']) !!}
                            </div>
                            <div class="col p-0">
                                {!! Form::select('location_id', $locations, null, ['placeholder' => 'Choose Location...', 'id' => 'location_id', 'class' => 'singleSelect']) !!}
                            </div>
                            <div class="col p-0">
                                {!! Form::select('school_id', [], null, ['placeholder' => 'Choose School...', 'id' => 'school_id', 'class' => 'singleSelect']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 p-0">
                        {!! Form::text('keywords', NULL, ['placeholder' => 'Search Keywords', 'multiple' => 'multiple', 'class' => 'tagsInput', 'data-initial-value' => '[]', 'data-url' => route('keywords'), 'data-user-option-allowed' => 'true', 'data-load-once' => 'true']) !!}
                    </div>
                    <button class="submitBtn" type="submit">Search</button>
                </div>
            {!! Form::close() !!}
        </div>
        <figure class="container documents__container text-center position-relative">
            <h1 class="h1 font-weight-bold position-relative text-center p-5 documents__containers__title d-inline-block m-auto">
                Search Results
            </h1>
            <div class="documents__containers__border__title position-absolute d-block m-auto"></div>
            <article class="row">
                @foreach($papers as $paper)
                    <figcaption class="documents__containers__paper col-md-4 mb-3">
                        <div class="row h-100">
                            <h3 class="h3 col-12 font-weight-bold text-left documents__containers__paper__title">
                                {!! str_limit($paper->title, 45) !!}
                            </h3>
                            <div class="col-12 align-self-start">
                                <p class="mt-2 documents__containers__paper__abstract text-justify">
                                    {!! str_limit($paper->abstract, 250) !!}
                                </p>
                            </div>
                            <div class="col-12 align-self-end">
                                <ul class="row text-left m-0 p-1 documents__containers__paper__details list-unstyled">
                                    <li class="col align-self-center p-0 m-0">
                                        <img class="float-left p-1 documents__containers__paper__details__img" src="{!! asset("site/images/authors.png") !!}"/>
                                        <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">
                                            Authors
                                        </p>
                                    </li>
                                    <p class="col align-self-center p-0 m-0 documents__containers__paper__details__name">
                                        @php $authors = ""; @endphp
                                        @foreach($paper->professionals as $pro)
                                            @php $authors .= $pro->fullName . ", "; @endphp
                                        @endforeach
                                        {!! str_limit(trim($authors, ', '), 30) !!}
                                    </p>
                                </ul>
                                <ul class="row text-left m-0 p-1 documents__containers__paper__details list-unstyled">
                                    <li class="col align-self-center p-0 m-0">
                                        <img class="float-left p-1 documents__containers__paper__details__img" src="{!! asset("site/images/published-year.png") !!}"/>
                                        <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">
                                            Publication Date
                                        </p>
                                    </li>
                                    <p class="col align-self-center p-0 m-0 documents__containers__paper__details__name">
                                        {!! $paper->publication_date !!}
                                    </p>
                                </ul>
                                <ul class="row text-left m-0 p-1 documents__containers__paper__details list-unstyled">
                                    <li class="col align-self-center p-0 m-0">
                                        <img class="float-left p-1 documents__containers__paper__details__img" src="{!! asset("site/images/pages.png") !!}"/>
                                        <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">
                                            Organization
                                        </p>
                                    </li>
                                    <p class="col align-self-center p-0 m-0 documents__containers__paper__details__name">
                                        {!! $paper->school->{'title_' . app()->getLocale()} !!}
                                    </p>
                                </ul>
                                <div class="clearfix text-right">
                                    <a href="{!! route('papers.show', $paper->id) !!}" class="btn btn-sm mt-2 mb-2 documents__containers__paper__details__btn">
                                        Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </figcaption>
                @endforeach
            </article>
            {!! $papers->links() !!}
        </figure>
    </section>

    @include('partials.footer')
@stop

@section('js')
    <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
    <script src="{!! asset('site/js/build.min.js') !!}"></script>
    <script src="{!! asset('site/js/fastselect.standalone.js') !!}"></script>
    <script src="{!! asset('site/js/jquery.easing.min.js') !!}"></script>
    <script src="{!! asset('site/js/masterslider.min.js') !!}"></script>
    <script src="{!! asset('site/js/masterslider.partialview.dev.js') !!}"></script>
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
@extends('layouts.base')

@section('body')
    <section class="fullscreen position-relative m-0 p-0 d-block w-100 h-100 m-auto">
        <div class="fullscreen__img position-absolute"></div>
        @include('partials.header')
        <!-- template -->
        <div class="ms-partialview-template" id="partial-view-1">
            <!-- masterslider -->
            <div class="master-slider ms-skin-default" id="masterslider">
                @foreach($sliders as $slider)
                <div class="ms-slide">
                    <img src="{!! asset("site/images/blank.gif") !!}" data-src="{!! $slider->image !!}" alt="lorem ipsum dolor sit"/>
                    <div class="ms-info">
                        <h3 class="font-weight-bold text-center h3"> {{ $slider->title }} </h3>
                        <p>
                            {!! $slider->description !!}
                        </p>
                    </div>
                </div>
                @endforeach
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
                                {!! Form::select('education_type', config('education_types.' . app()->getLocale()), null, ['id' => 'education_type', 'placeholder' => trans('site.Education Type'), 'class' => 'singleSelect combobox']) !!}
                            </div>
                            <div class="col p-0">
                                {!! Form::select('location_id', $locations, null, ['placeholder' => trans('site.Choose Location'), 'id' => 'location_id', 'class' => 'singleSelect combobox']) !!}
                            </div>
                            <div class="col p-0">
                                {!! Form::select('school_id', [], null, ['placeholder' => trans('site.Choose School'), 'id' => 'school_id', 'class' => 'singleSelect combobox']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 p-0">
                        {!! Form::text('keywords', NULL, ['placeholder' => trans('site.Write Keywords'), 'multiple' => 'multiple', 'data-role' => 'tagsinput', 'data-initial-value' => '[]', 'data-url' => route('keywords'), 'data-user-option-allowed' => 'true', 'value' => 'Keyword, Keyword', 'data-load-once' => 'true']) !!}  
                             
                    </div>
                    
                </div>
            <button class="submitBtn" type="submit">@lang('site.Search')</button>
            {!! Form::close() !!}
        </div>
        <figure class="container documents__container text-center position-relative">
            <h1 class="h1 font-weight-bold position-relative text-center p-5 documents__containers__title d-inline-block m-auto">
                 @lang('site.Latest Papers')
            </h1>
            <div class="documents__containers__border__title position-absolute d-block m-auto"></div>
            <div class="documents__containers__tabs w-100 mb-5 row  justify-content-md-center ml-0 mr-0">
                <ul class="documents__containers__tabs__list nav nav-pills nav-fill border-light border-1 co-md-6">
                    <li class="nav-item">
                        <a class="nav-link documents__containers__tabs__active" id="general-edu"> @lang('site.General Education')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="university-edu"> @lang('site.University Education')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="technical-edu"> @lang('site.Vocational Education')</a>
                    </li>
                </ul>
            </div>
            <div class="general-edu">
                <article class="row">
                    @foreach($general_education as $paper)
                        <figcaption class="documents__containers__paper col-md-4 mb-3">
                            <div class="row h-100">
                                <h3 class="h3 col-12 font-weight-bold text-left documents__containers__paper__title">{!! str_limit($paper->title, 45) !!}</h3>
                                <div class="col-12 align-self-start">
                                    <p class="mt-2 documents__containers__paper__abstract text-justify">{!! str_limit($paper->abstract, 250) !!}</p>
                                </div>
                                <div class="col-12 align-self-end">
                                    <ul class="row text-left m-0 p-1 documents__containers__paper__details list-unstyled">
                                        <li class="col align-self-center p-0 m-0">
                                            <img
                                            class="float-left p-1 documents__containers__paper__details__img"
                                            src="{!! asset("site/images/authors.png") !!}"/>
                                            <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">
                                                 @lang('site.Authors')
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
                                            <img
                                            class="float-left p-1 documents__containers__paper__details__img"
                                            src="{!! asset("site/images/published-year.png") !!}"/>
                                            <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">  @lang('site.Publication Date')</p>
                                        </li>
                                        <p class="col align-self-center p-0 m-0 documents__containers__paper__details__name">{!! $paper->publication_date !!}</p>
                                    </ul>
                                    <ul class="row text-left m-0 p-1 documents__containers__paper__details list-unstyled">
                                        <li class="col align-self-center p-0 m-0">
                                            <img
                                            class="float-left p-1 documents__containers__paper__details__img"
                                            src="{!! asset("site/images/pages.png") !!}"/>
                                            <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name"> @lang('site.Organization')</p>
                                        </li>
                                        <p class="col align-self-center p-0 m-0 documents__containers__paper__details__name">{!! $paper->school->{'title_' . app()->getLocale()} !!}</p>
                                    </ul>
                                    <div class="clearfix text-right">
                                        <a href="{!! route('papers.show', $paper->id) !!}" class="btn btn-sm mt-2 mb-2 documents__containers__paper__details__btn">
                                             @lang('site.Details')
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </figcaption>
                    @endforeach
                </article>
            </div>
            <div class="university-edu">
                <article class="row">
                    @foreach($university_education as $paper)
                        <figcaption class="documents__containers__paper col-md-4 mb-3">
                            <div class="row h-100">
                                <h3 class="h3 col-12 font-weight-bold text-left documents__containers__paper__title">{!! str_limit($paper->title, 45) !!}</h3>
                                <div class="col-12 align-self-start">
                                    <p class="mt-2 documents__containers__paper__abstract text-justify">{!! str_limit($paper->abstract, 250) !!}</p>
                                </div>
                                <div class="col-12 align-self-end">
                                    <ul class="row text-left m-0 p-1 documents__containers__paper__details list-unstyled">
                                        <li class="col align-self-center p-0 m-0">
                                            <img
                                            class="float-left p-1 documents__containers__paper__details__img"
                                            src="{!! asset("site/images/authors.png") !!}"/>
                                            <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">
                                                @lang('site.Authors')
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
                                            <img
                                            class="float-left p-1 documents__containers__paper__details__img"
                                            src="{!! asset("site/images/published-year.png") !!}"/>
                                            <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">@lang('site.Publication Date')</p>
                                        </li>
                                        <p class="col align-self-center p-0 m-0 documents__containers__paper__details__name">{!! $paper->publication_date !!}</p>
                                    </ul>
                                    <ul class="row text-left m-0 p-1 documents__containers__paper__details list-unstyled">
                                        <li class="col align-self-center p-0 m-0">
                                            <img
                                            class="float-left p-1 documents__containers__paper__details__img"
                                            src="{!! asset("site/images/pages.png") !!}"/>
                                            <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">@lang('site.Organization')</p>
                                        </li>
                                        <p class="col align-self-center p-0 m-0 documents__containers__paper__details__name">{!! $paper->school->{'title_' . app()->getLocale()} !!}</p>
                                    </ul>
                                    <div class="clearfix text-right">
                                        <a href="{!! route('papers.show', $paper->id) !!}" class="btn btn-sm mt-2 mb-2 documents__containers__paper__details__btn">
                                            @lang('site.Details')
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </figcaption>
                    @endforeach
                </article>
            </div>
            <div class="technical-edu">
                <article class="row">
                    @foreach($vocational_education as $paper)
                        <figcaption class="documents__containers__paper col-md-4 mb-3">
                            <div class="row h-100">
                                <h3 class="h3 col-12 font-weight-bold text-left documents__containers__paper__title">{!! str_limit($paper->title, 45) !!}</h3>
                                <div class="col-12 align-self-start">
                                    <p class="mt-2 documents__containers__paper__abstract text-justify">{!! str_limit($paper->abstract, 250) !!}</p>
                                </div>
                                <div class="col-12 align-self-end">
                                    <ul class="row text-left m-0 p-1 documents__containers__paper__details list-unstyled">
                                        <li class="col align-self-center p-0 m-0">
                                            <img
                                            class="float-left p-1 documents__containers__paper__details__img"
                                            src="{!! asset("site/images/authors.png") !!}"/>
                                            <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">
                                                @lang('site.Authors')
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
                                            <img
                                            class="float-left p-1 documents__containers__paper__details__img"
                                            src="{!! asset("site/images/published-year.png") !!}"/>
                                            <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">@lang('site.Publication Date')</p>
                                        </li>
                                        <p class="col align-self-center p-0 m-0 documents__containers__paper__details__name">{!! $paper->publication_date !!}</p>
                                    </ul>
                                    <ul class="row text-left m-0 p-1 documents__containers__paper__details list-unstyled">
                                        <li class="col align-self-center p-0 m-0">
                                            <img
                                            class="float-left p-1 documents__containers__paper__details__img"
                                            src="{!! asset("site/images/pages.png") !!}"/>
                                            <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">@lang('site.Organization')</p>
                                        </li>
                                        <p class="col align-self-center p-0 m-0 documents__containers__paper__details__name">{!! $paper->school->{'title_' . app()->getLocale()} !!}</p>
                                    </ul>
                                    <div class="clearfix text-right">
                                        <a href="{!! route('papers.show', $paper->id) !!}" class="btn btn-sm mt-2 mb-2 documents__containers__paper__details__btn">
                                        @lang('site.Details')
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </figcaption>
                    @endforeach
                </article>
            </div>
        </figure>
    </section>
    <section class="position-relative row p-0 m-0 pb-4 subscribe">
        <div class="container position-relative text-center">
            <h1 class="h1 font-weight-bold position-relative text-center p-5 subscribe__containers__title d-inline-block m-auto">
                @lang('site.Our Plans')
            </h1>
            <div class="documents__containers__border__title position-absolute d-block m-auto"></div>
        </div>
        <div class="clearfix"></div>
        <div class="container p-0 mt-4">
            <div class="row m-0 p-0">
                <div class="col-lg-4 subscribe__details">
                    <div class="row align-items-center w-100 h-100 m-0 p-0">
                        <ul class="list-group w-100">
                            <li class="list-group-item h5 font-weight-bold pl-0 pr-0"><b
                                class="font-weight-bold text-center d-inline-block">1</b>@lang('site.Number of Memos')
                            </li>
                            <li class="list-group-item h5 font-weight-bold pl-0 pr-0"><b
                                class="font-weight-bold text-center d-inline-block">2</b>@lang('site.Number of Documents')
                            </li>
                            <li class="list-group-item h5 font-weight-bold pl-0 pr-0"><b
                                class="font-weight-bold text-center d-inline-block">3</b>@lang('site.Month Subscription')
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 m-0">
                    <div class="row">
                        @foreach($plans as $plan)
                        <div class="col-md-4 m-0 p-0">
                            <figcaption class="subscribe__package package2 w-100 m-0 p-3 d-block text-center">
                                <div class="subscribe__package__title text-center w-100 ">
                                    <p class="subscribe__package__title__p position-absolute m-auto">{!! $plan->{'title_' . app()->getLocale()} !!}</p>
                                    <img class="subscribe__package__title__img position-absolute m-auto"
                                    src="{!! asset("site/images/package-title.png") !!}">
                                </div>
                                <div class="row align-items-center w-100 h-100 m-0 p-0">
                                    <ul class="list-group w-100">
                                        <li class="list-group-item  font-weight-bold">${{ $plan->price }}</li>
                                        <li class="list-group-item  font-weight-bold">{{ $plan->duration . str_plural(trans('site.Month'), $plan->duration) }}</li>
                                        <li class="list-group-item  font-weight-bold">{{ $plan->{'description_' . app()->getLocale()} }}</li>
                                    </ul>
                                </div>
                                <div class="clearfix">
                                    <a href="{!! route('plans.show', $plan->id) !!}">
                                        <button class="btn btn-sm btn-danger">@lang('site.Subscribe')</button>
                                    </a>
                                </div>
                            </figcaption>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>
    @include('partials.footer')
@stop
@section('js')
 
@append
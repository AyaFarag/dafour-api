@extends('layouts.app')

@section('body')
<main class="profile">
    <section class=" position-relative m-0 p-0 d-block w-100 m-auto documents h-100 pb-3">
        @include('partials.header')
        <div class="container position-relative text-center mt-1 popups__signin">
            <h1 class="h1 font-weight-bold position-relative text-center p-2 documents__containers__title d-inline-block m-auto">
                 @lang('site.My Account')</h1>
            <hr class="popups__line">
            <div class="clearfix"></div>
            <div class="m-auto m-0 p-0">
                <div class="documents__containers__tabs w-100 mt-2 mb-1 row ml-0 mr-0">
                    <ul class="documents__containers__tabs__list nav nav-pills nav-fill border-light border-1">
                        <li class="nav-item">
                            <a class="nav-link documents__containers__tabs__active" id="general-edu"> @lang('site.Plan Type')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="university-edu">@lang('site.Account Setting')</a>
                        </li>
                    </ul>

                </div>
                <div class="popups__signing mt-4 mb-4 p-4 w-100 h-100 account-setting">


                    <div class="general-edu">

                        <h4 class="h4 font-weight-bold position-relative text-center pb-4 documents__containers__title new-h4 d-inline-block m-auto">
                            @lang('site.Plan Type')</h4>
                        <div class="documents__containers__paper w-100 m-0">


                            <ul class="row text-left m-0 p-2 documents__containers__paper__details list-unstyled">
                                <li class="col align-self-center p-0 m-0"><img
                                        class="float-left p-1 documents__containers__paper__details__img"
                                        src="{!! asset('site/images/published-year.png') !!}"/>
                                    <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">
                                         @lang('site.Start Date')</p></li>
                                <p class="col align-self-center p-0 m-0 documents__containers__paper__details__name">
                                    {{ $user->created_at->format('d/m/Y')  }}</p>
                            </ul>
                            <ul class="row text-left m-0 p-2 documents__containers__paper__details list-unstyled">
                                <li class="col align-self-center p-0 m-0"><img
                                        class="float-left p-1 documents__containers__paper__details__img"
                                        src="{!! asset('site/images/published-year.png') !!}"/>
                                    <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">
                                         @lang('site.End Date')</p></li>
                                <p class="col align-self-center p-0 m-0 documents__containers__paper__details__name">
                                    N/A</p>
                            </ul>
                            <ul class="row text-left m-0 p-2 documents__containers__paper__details list-unstyled">
                                <li class="col align-self-center p-0 m-0"><img
                                        class="float-left p-1 documents__containers__paper__details__img"
                                        src="{!! asset('site/images/download.png') !!}"/>
                                    <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">
                                        @lang('site.Downloaded')</p></li>
                                <p class="col align-self-center p-0 m-0 documents__containers__paper__details__name">
                                    N/A @lang('site.Docs')</p>
                            </ul>
                            <ul class="row text-left m-0 p-2 documents__containers__paper__details list-unstyled">
                                <li class="col align-self-center p-0 m-0"><img
                                        class="float-left p-1 documents__containers__paper__details__img"
                                        src="{!! asset('site/images/pages.png') !!}"/>
                                    <p class="float-left font-weight-normal p-1 m-0 documents__containers__paper__details__field-name">
                                         @lang('site.From')</p></li>
                                <p class="col align-self-center p-0 m-0 documents__containers__paper__details__name">
                                    N/A @lang('site.Docs')</p>
                            </ul>


                        </div>


                    </div>
                    <div class="university-edu p-2">
                        <h4 class="h4 font-weight-bold position-relative text-center pb-4 documents__containers__title new-h4 d-inline-block m-auto">
                            @lang('site.Account Setting')</h4>
                        {!! Form::model($user, ['route' => 'student.profile.update', 'method' => 'post', 'class' => 'form-signup p-2']) !!}
                            <p class="validationsignup text-left clearfix text-danger"></p>
                            <div class="form-row mb-3">
                                {!! Form::label('first_name', trans('site.Your Name'), ['class' => 'col-12 text-left popups__label']) !!}
                                <div class="clearfix"></div>
                                <div class="col-sm-12 col-md-4">
                                    {!! Form::text('first_name', NULL, ['class' => 'form-control popups__input', 'placeholder' =>trans('site.First Name')]) !!}
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    {!! Form::text('middle_name', NULL, ['class' => 'form-control popups__input', 'placeholder' => trans('site.Middle Name')]) !!}
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    {!! Form::text('last_name', NUll, ['class' => 'form-control popups__input', 'placeholder' => trans('site.Last Name')]) !!}
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                {!! Form::label('email', trans('site.Your E-mail'), ['class' => 'col-12 p-0 text-left popups__label']) !!}
                                {!! Form::email('email', NULL, ['class' => 'form-control popups__input', 'placeholder' => 'E-mail']) !!}
                            </div>
                            <div class="input-group mb-3">
                                {!! Form::label('password', trans('site.Your Password'), ['class' => 'col-12 p-0 text-left popups__label']) !!}
                                {!! Form::password('password', ['class' => 'form-control popups__input', 'placeholder' => 'Password']) !!}
                            </div>
                            <div class="input-group mb-3">
                                {!! Form::label('password_confirmation', trans('site.Your Password Confirmation'), ['class' => 'col-12 p-0 text-left popups__label']) !!}
                                {!! Form::password('password_confirmation', ['class' => 'form-control popups__input', 'placeholder' => 'Password']) !!}
                            </div>
                            <div class="input-group mb-3">
                                {!! Form::label('phone', trans('site.Your Phone Number'), ['class' => 'col-12 p-0 text-left popups__label']) !!}
                                {!! Form::text('phone', NULL, ['class' => 'form-control popups__input', 'placeholder' => 'Phone Number']) !!}
                            </div>
                            <div class="input-group">
                                {!! Form::label('country', trans('site.Your Country'), ['class' => 'col-12 p-0 text-left popups__label']) !!}
                                {!! Form::select('country', config('countries'), null, ['class' => 'form-control h-100 popups__input', 'placeholder' => 'Choose country...']) !!}
                            </div>
                            <button type="submit" class="btn btn-primary registersubmit mt-3"> @lang('site.Update')</button>
                        {!! Form::close() !!}
                    </div>


                </div>

            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    @include('partials.footer')
</main>
@stop
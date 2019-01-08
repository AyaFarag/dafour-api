@extends('layouts.base')

@section('body')
    <div class="popups">
        <div class="popups__close p-5 w-100 "><a href="{!! route('home') !!}"> <img class="float-right" src="{!! asset('site/images/close.png') !!}"></a></div>
        <div class="popups-ajax">
            <div class="container position-relative text-center mt-1 popups__signup d-block">
                <h1 class="h1 font-weight-bold position-relative text-center p-2 subscribe__containers__title d-inline-block m-auto">
                    @lang('site.SIGN UP')
                </h1>
                <hr class="popups__line">
                <div class="clearfix"></div>
                <div class="m-auto w-75">
                    <div class="popups__list w-100">
                        <ul class="nav nav-pills nav-fill border-light border-1">
                            <li class="nav-item">
                                <a id="student_link" class="nav-link popups__active studentsignup" href="javascript:void(0);" >@lang('site.Student Sign Up') </a>
                            </li>
                            <li class="nav-item professionalsignup">
                                <a id="professional_link" class="nav-link"  href="javascript:void(0);"> @lang('site.Professional Sign Up')</a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div id="student_signup" class="popups__student mt-4 pl-5 pr-5 pb-5 pt-4 w-100">
                        <h4 class="h4 font-weight-bold position-relative text-center pb-4 subscribe__containers__title d-inline-block m-auto">
                            @lang('site.Student Sign Up')
                        </h4>
                        {!! Form::open(['route' => 'student.register', 'method' => 'post', 'class' => 'form-signup']) !!}
                            <p class="validationsignup text-left clearfix text-danger">
                                @if($errors->student->any())
                                    Please make sure all your fields have valid values
                                @endif
                            </p>
                            <div class="form-row mb-3">
                                {!! Form::label('s_first_name', trans('site.Your Name'), ['class' => 'col-12 text-left popups__label']) !!}
                                <div class="clearfix"></div>
                                <div class="col-sm-12 col-md-4">
                                    {!! Form::text('first_name', NULL, ['class' => ($errors->student->has("first_name") ? "borderalert" : "") . ' form-control popups__input', 'placeholder' => trans('site.First Name'), 'id' => 's_first_name']) !!}
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    {!! Form::text('middle_name', NULL, ['class' => ($errors->student->has("middle_name") ? "borderalert" : "") . ' form-control popups__input', 'placeholder' => trans('site.Middle Name'), 'id' => 's_middle_name']) !!}
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    {!! Form::text('last_name', NULL, ['class' => ($errors->student->has("last_name") ? "borderalert" : "") . ' form-control popups__input', 'placeholder' => trans('site.Last Name'), 'id' => 's_last_name']) !!}
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                {!! Form::label('s_email', trans('site.Your E-mail'), ['class' => 'col-12 p-0 text-left popups__label']) !!}
                                {!! Form::email('email', NULL, ['class' => ($errors->student->has("email") ? "borderalert" : "") . ' form-control popups__input', 'aria-label' => 'Default', 'aria-describedby' =>'inputGroup-sizing-default', 'id' => 's_email']) !!}
                            </div>
                            <div class="input-group mb-3">
                                {!! Form::label('s_password', trans('site.Your Password'), ['class' => 'col-12 p-0 text-left popups__label']) !!}
                                {!! Form::password('password', ['class' => ($errors->student->has("password") ? "borderalert" : "") . ' form-control popups__input', 'aria-label' => 'Default', 'aria-describedby' =>'inputGroup-sizing-default', 'id' => 's_password']) !!}
                            </div>
                            <div class="input-group mb-3">
                                {!! Form::label('s_password_confirmation', trans('site.Your Password Confirmation'), ['class' => 'col-12 p-0 text-left popups__label']) !!}
                                {!! Form::password('password_confirmation', ['class' => ($errors->student->has("password_confirmation") ? "borderalert" : "") . ' form-control popups__input', 'aria-label' => 'Default', 'aria-describedby' => 'inputGroup-sizing-default', 'id' => 's_password_confirmation']) !!}
                            </div>
                            <div class="input-group mb-3">
                                {!! Form::label('s_phone', trans('site.Your Phone Number'), ['class' => 'col-12 p-0 text-left popups__label']) !!}
                                {!! Form::text('phone', NULL, ['class' => ($errors->student->has("phone") ? "borderalert" : "") . ' form-control popups__input', 'aria-label' => 'Default', 'aria-describedby' => 'inputGroup-sizing-default', 'id' => 's_phone']) !!}
                            </div>
                            <div class="input-group">
                                {!! Form::label('s_country', trans('site.Your Country'), ['class' => 'col-12 p-0 text-left popups__label']) !!}
                                {!! Form::select('country', config('countries'), NULL, ['class' => ($errors->student->has("country") ? "borderalert" : "") . ' form-control h-100 popups__input', 'placeholder' => trans('site.Choose country'), 'id' => 's_country']) !!}
                            </div>
                            <small class="form-text font-weight-bold text-muted text-left p-1">
                                @lang('site.You have an account')
                                <a id="signin" href="{!! route('login') !!}">@lang('site.SIGN IN')</a>
                            </small>
                            <button type="submit" class="btn btn-primary registersubmit">@lang('site.Create New Account')</button>
                        {!! Form::close() !!}
                    </div>
                    <div id="professional_signup" class="popups__professional mt-4 pl-5 pr-5 pb-5 pt-4 w-100">
                        <h4 class="h4 font-weight-bold position-relative text-center pb-4 subscribe__containers__title d-inline-block m-auto">
                           @lang('site.Professional Sign Up')
                        </h4>
                        {!! Form::open(['route' => 'professional.register', 'method' => 'post', 'class' => 'form-signup']) !!}
                            <p class="validationsignup text-left clearfix text-danger">
                                @if($errors->professional->any())
                                    Please make sure all your fields have valid values
                                @endif
                            </p>
                            <div class="form-row mb-3">
                                {!! Form::label('p_first_name', trans('site.Your Name'), ['class' => 'col-12 text-left popups__label']) !!}
                                <div class="clearfix"></div>
                                <div class="col-sm-12 col-md-4">
                                    {!! Form::text('first_name', NULL, ['class' => ($errors->professional->has("first_name") ? "borderalert" : "") . ' form-control popups__input', 'placeholder' => trans('site.First Name'), 'id' => 'p_first_name']) !!}
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    {!! Form::text('middle_name', NULL, ['class' => ($errors->professional->has("middle_name") ? "borderalert" : "") . ' form-control popups__input', 'placeholder' => trans('site.Middle Name'), 'id' => 'p_middle_name']) !!}
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    {!! Form::text('last_name', NULL, ['class' => ($errors->professional->has("last_name") ? "borderalert" : "") . ' form-control popups__input', 'placeholder' => trans('site.Last Name'), 'id' => 'p_last_name']) !!}
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                {!! Form::label('p_degree', trans('site.Degree'), ['class' => 'col-12 p-0 text-left popups__label']) !!}
                                {!! Form::text('degree', NULL, ['class' => ($errors->professional->has("degree") ? "borderalert" : "") . ' form-control popups__input', 'aria-label' => 'Default', 'aria-describedby' => 'inputGroup-sizing-default', 'id' => 'p_degree']) !!}
                            </div>
                            <div class="input-group mb-3">
                                {!! Form::label('p_email', trans('site.Your E-mail'), ['class' => 'col-12 p-0 text-left popups__label']) !!}
                                {!! Form::email('email', NULL, ['class' => ($errors->professional->has("emalil") ? "borderalert" : "") . ' form-control popups__input', 'aria-label' => 'Default', 'aria-describedby' =>'inputGroup-sizing-default', 'id' => 'p_email']) !!}
                            </div>
                            <div class="input-group mb-3">
                                {!! Form::label('p_password', trans('site.Your Password'), ['class' => 'col-12 p-0 text-left popups__label']) !!}
                                {!! Form::password('password', ['class' => ($errors->professional->has("password") ? "borderalert" : "") . ' form-control popups__input', 'aria-label' => 'Default', 'aria-describedby' =>'inputGroup-sizing-default', 'id' => 'p_password']) !!}
                            </div>
                            <div class="input-group mb-3">
                                {!! Form::label('p_password_confirmation', trans('site.Your Password Confirmation'), ['class' => 'col-12 p-0 text-left popups__label']) !!}
                                {!! Form::password('password_confirmation', ['class' => ($errors->professional->has("password_confirmation") ? "borderalert" : "") . ' form-control popups__input', 'aria-label' => 'Default', 'aria-describedby' =>'inputGroup-sizing-default', 'id' => 'p_password_confirmation']) !!}
                            </div>
                            <div class="input-group mb-3">
                                {!! Form::label('p_phone', trans('site.Your Phone Number'), ['class' => 'col-12 p-0 text-left popups__label']) !!}
                                {!! Form::text('phone', NULL, ['class' => ($errors->professional->has("phone") ? "borderalert" : "") . ' form-control popups__input', 'aria-label' => 'Default', 'aria-describedby' => 'inputGroup-sizing-default', 'p_phone']) !!}
                            </div>
                            <div class="input-group">
                                {!! Form::label('p_country', trans('site.Your Country'), ['class' => 'col-12 p-0 text-left popups__label']) !!}
                                {!! Form::select('country', config('countries'), NULL, ['class' => ($errors->professional->has("country") ? "borderalert" : "") . ' form-control h-100 popups__input', 'placeholder' => trans('site.Choose country'), 'id' => 'p_country']) !!}
                            </div>
                            <small class="form-text font-weight-bold text-muted text-left p-1">
                                @lang('site.You have an account')
                                <a id="signin" href="{!! route('login') !!}">@lang('site.SIGN IN')</a>
                            </small>
                            <button type="submit" class="btn btn-primary registersubmit">@lang('site.Create New Account')</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
<script>
    let actor = "{!! session('actor') !!}";

    if (actor == "professional") {
        $('#professional_signup').css('display', 'block');
        $('#student_signup').css('display', 'none');
        $('#professional_link').addClass('popups__active');
        $('#student_link').removeClass('popups__active');
    }
</script>
@append
@extends('layouts.base')

@section('body')
<div class="popups">
    <div class="popups__close p-5 w-100 "><a href="{!! route('home') !!}"> <img class="float-right" src="{!! asset('site/images/close.png') !!}"></a></div>
    <div class="popups-ajax">
        <div class="container position-relative text-center mt-1 popups__signup d-block">
            <h1 class="h1 font-weight-bold position-relative text-center p-2 subscribe__containers__title d-inline-block m-auto">
                @lang('site.Login')
            </h1>
            <hr class="popups__line">
            <div class="clearfix"></div>
            <div class="m-auto w-75">
                <div class="popups__list w-100">
                    <ul class="nav nav-pills nav-fill border-light border-1">
                        <li class="nav-item">
                            <a class="nav-link popups__active studentsignup" href="javascript:void(0);">@lang('site.Student Login') </a>
                        </li>
                        <li class="nav-item professionalsignup">
                            <a class="nav-link" href="javascript:void(0);"> @lang('site.Professional Login')</a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <div class="popups__student mt-4 pl-5 pr-5 pb-5 pt-4 w-100">
                    <h4 class="h4 font-weight-bold position-relative text-center pb-4 subscribe__containers__title d-inline-block m-auto">
                         @lang('site.Student Login')
                    </h4>
                    {!! Form::open(['class' => 'form-signin', 'route' => 'student.login', 'method' => 'post']) !!}
                        <p class="validationsignin text-left clearfix text-danger"></p>
                        <div class="input-group mb-3">
                            <label class="col-12 p-0 text-left popups__label">@lang('site.Your E-mail')</label>
                            <input name="email" type="text" placeholder="@lang('site.Your E-mail')" class="form-control popups__input"
                                   aria-label="Default"
                                   aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-12 p-0 text-left popups__label">@lang('site.Your Password')</label>
                            <input name="password" type="password" placeholder="@lang('site.Your Password')" class="form-control popups__input"
                                   aria-label="Default"
                                   aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="row m-0 p-0">
                            <small class="form-text font-weight-bold text-muted text-left p-1 col"> @lang('site.dont have an account?')
                                <a
                                        id="signup" href="{!! route('register') !!}"> @lang('site.SIGN UP')
                                    </a></small>
                            <small class="form-text font-weight-bold text-muted text-right p-1 col"> @lang('site.Forget Password?') <a
                                    id="forget-password" href="javascript:void(0);">@lang('site.Click here')</a></small>
                        </div>
                        <button type="submit" class="btn btn-primary loginsubmit">@lang('site.Sign In')</button>
                    {!! Form::close() !!}
                </div>
                <div class="popups__professional mt-4 pl-5 pr-5 pb-5 pt-4 w-100">
                    <h4 class="h4 font-weight-bold position-relative text-center pb-4 subscribe__containers__title d-inline-block m-auto">
                        @lang('site.Professional Login')
                    </h4>
                    {!! Form::open(['class' => 'form-signin', 'route' => 'professional.login', 'method' => 'post']) !!}
                        <p class="validationsignin text-left clearfix text-danger"></p>
                        <div class="input-group mb-3">
                            <label class="col-12 p-0 text-left popups__label">: @lang('site.Your E-mail')</label>
                            <input name="email" type="text" placeholder="@lang('site.Your E-mail')" class="form-control popups__input"
                                   aria-label="Default"
                                   aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-12 p-0 text-left popups__label">@lang('site.Your Password')</label>
                            <input name="password" type="password" placeholder="@lang('site.Your Password')" class="form-control popups__input"
                                   aria-label="Default"
                                   aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="row m-0 p-0">
                            <small class="form-text font-weight-bold text-muted text-left p-1 col"> @lang('site.dont have an account?')
                                <a
                                        id="signup" href="{!! route('register') !!}"> @lang('site.SIGN UP')
                                    </a></small>
                            <small class="form-text font-weight-bold text-muted text-right p-1 col"> @lang('site.Forget Password?')<a
                                    id="forget-password" href="javascript:void(0);"> @lang('site.Click here')</a></small>
                        </div>
                        <button type="submit" class="btn btn-primary loginsubmit"> @lang('site.Sign In')</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
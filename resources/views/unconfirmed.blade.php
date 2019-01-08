@extends('layouts.base')

@section('body')

    @php
        $user = auth()->guest() ? auth('professional')->user() : auth()->user();
    @endphp


    @if(!$user || $user->confirmed)
        <meta http-equiv="refresh" content="0; {{ route('home')  }}">
    @endif

    <main class="profile">


        <section class=" position-relative m-0 p-0 d-block w-100 m-auto documents h-100 pb-3">
            @include('partials.header')
            <div class="container position-relative text-center mt-1 popups__signin">
                <h1 class="h1 font-weight-bold position-relative text-center p-2 documents__containers__title d-inline-block m-auto">
                    @lang('site.Your Account  Inactive')
                </h1>
                <hr class="popups__line">
                <div class="clearfix"></div>
                <div class="m-auto m-0 p-0 w-75">
                    <div class="popups__signing mt-4 mb-4 p-4 w-100 h-100 account-setting">
                        <div class="w-100">
                            <h3>@lang('site.Please check your mail to activate your account')</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        @include('partials.footer')
    </main>

@stop

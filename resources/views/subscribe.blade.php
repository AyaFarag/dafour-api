@extends('layouts.base')

@section('body')
<main class="profile">


    <section class=" position-relative m-0 p-0 d-block w-100 m-auto documents h-100 pb-3">
        @include('partials.header')
        <div class="container position-relative text-center mt-1 popups__signin">
            <h1 class="h1 font-weight-bold position-relative text-center p-2 documents__containers__title d-inline-block m-auto">
                Payment Details @lang('site.Upload')</h1>
            <hr class="popups__line">
            <div class="clearfix"></div>
            <div class="m-auto m-0 p-0 w-75">
                <div class="popups__signing mt-4 mb-4 p-4 w-100 h-100 account-setting">
                    <div class="w-100">
                        <form class="form-signup p-4" action="{!! route('plans.subscribe') !!}" method="post">
                            {!! csrf_field() !!}
                            <p class="validationsignup text-left clearfix text-danger"></p>
                            <div class="form-row mb-3">
                                <div class="col-12">
                                    <label class="col-12 text-left popups__label p-0"> @lang('site.Name On Card:')</label>
                                    <div class="clearfix"></div>
                                    <input type="text" class="form-control popups__input" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-sm-9">
                                    <label class="col-12 text-left popups__label p-0"> @lang('site.Card Number:')</label>
                                    <div class="clearfix"></div>
                                    <input type="number" class="form-control popups__input" placeholder="0000 0000 0000 0000">
                                </div>
                                <div class="col-sm-3">
                                    <label class="col-12 text-left popups__label p-0"> @lang('site.CVC:')</label>
                                    <div class="clearfix"></div>
                                    <input type="text" class="form-control popups__input" placeholder="CVC">
                                </div>
                            </div>
                            <div class="form-row mb-3">
                                <label class="col-12 text-left popups__label"> @lang('site.Expiration Date:')</label>
                                <div class="clearfix"></div>
                                <div class="col-sm-6">
                                    <input type="month" class="form-control popups__input">
                                </div>
                                <div class="col-sm-6 text-right">
                                    <img class="visa-cards" src="{!! asset('site/images/visa-cards.png') !!}"/>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary registersubmit mt-3">@lang('site.Purchase')</button>
                        </form>
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
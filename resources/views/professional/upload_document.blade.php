@extends('layouts.base')

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
                <div class="popups__signing mt-4 mb-4 p-4 w-100 h-100 account-setting">
                    <div>
                        <h4 class="h4 font-weight-bold position-relative text-center pb-4 documents__containers__title new-h4 d-inline-block m-auto">
                            @lang('site.Upload New Doc')</h4>
                        {!! Form::open(['route' => 'professional.docs.upload', 'method' => 'post', 'files' => 'true', 'class' => 'form-doc p-2']) !!}
                            @include('professional.upload_form')
                            <button type="submit" class="btn btn-primary registersubmit mt-3"> @lang('site.Upload')</button>
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

@section('js')
    <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
    <script src="{!! asset('site/js/fastselect.standalone.js') !!}"></script>
    <script src="{!! asset('site/js/function.js') !!}"></script>

    <script>
        function appendToWrapper(wrapper, position = 0) {
            $(wrapper).append('<div class="row w-100 mb-3 ml-0 mr-0 blockinputs"><input type="text" placeholder="@lang("site.Reference Title")" name="references[' + position + '][title]" class="form-control popups__input col-sm-6"><input type="url" placeholder="@lang("site.Reference Url")" name="references[' + position + '][link]" class="form-control popups__input col-sm-6"><a class="float-right remove-reference"><img src="{!! asset("site/images/close.png") !!}"/></a></div>');
        }

        var wrapper = $(".reference-inputs");
        appendToWrapper(wrapper);

        var add_button = $(".add-reference");
        var i = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            appendToWrapper(wrapper, i);
            i++;
        });

        $(wrapper).on("click", ".remove-reference", function (e) {
            e.preventDefault();
            $(this).parent('div').remove();
        });

        $("#publication_date").datepicker({
            dateFormat: "yy-mm-dd",
            autoSize: true
        });

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
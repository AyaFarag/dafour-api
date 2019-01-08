@extends('admin.layouts.app')

@section('content')
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Quick Example</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        {!! Form::open(['route' => 'admin.papers.store', 'method' => 'post','files'=>true]) !!}
            @include('admin.papers.form')
            <!-- /.box-body -->
            <div class="box-footer text-center ">
                <button type="submit" class="btn btn-lg btn-danger">Submit</button>
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('js')
    <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
    <script src="{!! asset('site/js/fastselect.standalone.js') !!}"></script>
    <script src="{!! asset('site/js/function.js') !!}"></script>
    <script>
        function appendToWrapper(wrapper, position = 0) {
            $(wrapper).append('<div class="row w-100 mb-3 ml-0 mr-0 blockinputs"><input type="text" placeholder="Reference Title" name="references[' + position + '][title]" class="form-control popups__input col-sm-6"><input type="url" placeholder="Reference Url" name="references[' + position + '][link]" class="form-control popups__input col-sm-6"><a class="float-right remove-reference btn btn-danger">Remove Reference</a></div>');
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
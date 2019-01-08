<script src="{!! asset('site/js/jquery-1.10.2.min.js') !!}"></script>
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
<script src="{!! asset('site/js/fastselect.standalone.js') !!}"></script>
<script src="{!! asset('site/js/function.js') !!}"></script>
<script src="{!! asset('site/js/build.min.js') !!}"></script>
<script src="{!! asset('site/js/tagsinput.js') !!}"></script>
<script src="{!! asset('site/js/bootstrap-combobox.js') !!}"></script>
<script src="{!! asset('site/js/jquery.easing.min.js') !!}"></script>
<script src="{!! asset('site/js/masterslider.min.js') !!}"></script>
<script src="{!! asset('site/js/masterslider.partialview.dev.js') !!}"></script>
<script src="{!! asset('site/js/numscroller-1.0.js') !!}"></script>

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
@yield('js')
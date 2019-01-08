<div class="box-body">
    <div class="col-sm-12">
        <div class="row">
            <div class="form-group">
                {!! Form::label('title', 'Document Title') !!}
                {!! Form::text('title', NULL, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Title']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                {!! Form::label('abstract', 'Abstract') !!}
                {!! Form::textarea('abstract', NULL, ['class' => 'form-control', 'id' => 'abstract', 'placeholder' => 'Abstract']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                {!! Form::label('keywords', 'Add Keywords', ['class' => 'col-xs-12']) !!}
                {!! Form::text('keywords', NULL, ['class' => 'form-control popups__input tagsInput', 'placeholder' => 'Search Keywords', 'multiple' => 'multiple', 'data-initial-value' => isset($keywords) ? $keywords : '[]', 'data-url' => url('keywords'), 'data-user-option-allowed' => 'true', 'data-load-once' => 'true']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                {!! Form::label('file', 'Upload Document', ['class' => 'popups__label']) !!}
                @if(isset($paper))
                    <p class="col-sm-12 text-left">
                        {{ str_limit($paper->title, 30) }}
                        <a href="{!! route('professional.docs.view', $paper->id) !!}" target="_blank">View</a>
                    </p>
                @endif
                {!! Form::file('file', ['class' => 'form-control popups__input', 'accept' => '.pdf']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                {!! Form::label('authors', 'Authors', ['class' => 'popups__label']) !!}
                {!! Form::text('authors', NULL, ['class' => 'form-control popups__input tagsInput', 'multiple' => 'multiple', 'data-initial-value' => isset($authors) ? $authors : '[]', 'data-url' => url('authors'), 'data-user-option-allowed' => 'false', 'data-load-once' => 'true', 'placeholder' => 'Authors']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                {!! Form::label('publication_date', 'Publication Date:', ['class' => 'popups__label']) !!}
                {!! Form::text('publication_date', NULL, ['class' => 'form-control popups__input date-input', 'data-inline' => 'false', 'data-role' => 'date']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                {!! Form::label('location_id', 'Organization Location', ['class' => 'popups__label']) !!}
                {!! Form::select('location_id', $locations, isset($paper) ? $paper->location()->id : null, ['class' => 'form-control h-100 popups__input', 'placeholder' => 'Choose Location...']) !!}
            </div>
        </div>


        <div class="row">
            <div class="form-group">
                {!! Form::label('school_id', 'Organization', ['class' => 'popups__label']) !!}
                {!! Form::select('school_id', $schools, null, ['class' => 'form-control popups__input', 'placeholder' => 'Choose School...']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('education_type', 'Education Type', ['class' => 'popups__label']) !!}
                {!! Form::select('education_type', config('education_types.' . app()->getLocale()), isset($education_type) ? $education_type : null, ['class' => 'form-control h-100 popups__input', 'placeholder' => 'Education Type...']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('references', 'References:', ['class' => 'popups__label']) !!}
            <div class="reference-inputs  w-100">

            </div>
        </div>
        <div class="clearfix addmoreadd">
            <a class="float-right add-reference btn btn-success">Add Reference</a>
        </div>
    </div>



</div>

@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fastselect/0.7.3/fastselect.min.css">
    <style>
        .fstElement{
            width: 100%;
        }
    </style>
@append



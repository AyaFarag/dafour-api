<p class="validationsignup text-left clearfix text-danger"></p>
<div class="form-row mb-3">
    {!! Form::label('title', trans('site.Document Title'), ['class' => 'col-12 text-left popups__label']) !!}
    <div class="clearfix"></div>
    <div class="col-sm-12 col-md-12">
        {!! Form::text('title', NULL, ['class' => 'form-control popups__input', 'placeholder' => trans('site.Document Title')]) !!}
    </div>
</div>
<div class="form-row mb-3">
    {!! Form::label('abstract', trans('site.Abstract'), ['class' => 'col-12 text-left popups__label']) !!}
    <div class="clearfix"></div>
    <div class="col-sm-12 col-md-12">
        {!! Form::textarea('abstract', NULL, ['class' => 'form-control popups__input', 'rows' => '10', 'cols' => '30']) !!}
    </div>
</div>
<div class="form-row mb-3">
    {!! Form::label('keyords', trans('site.Add Keywords'), ['class' => 'col-12 text-left popups__label']) !!}
    <div class="clearfix"></div>
    <div class="col-sm-12 col-md-12">
        {!! Form::text('keywords', NULL, ['class' => 'form-control popups__input tagsInput', 'placeholder' => '', 'multiple' => 'multiple', 'data-initial-value' => isset($keywords) ? $keywords : '[]', 'data-url' => url('keywords'), 'data-user-option-allowed' => 'true', 'data-load-once' => 'true']) !!}
    </div>
</div>
<div class="form-row mb-3">
    {!! Form::label('file', trans('site.Upload Document'), ['class' => 'col-12 text-left popups__label']) !!}
    @if(isset($paper))
        <p class="col-sm-12 text-left">
            {{ str_limit($paper->title, 30) }}
            <a href="{!! route('professional.docs.view', $paper->id) !!}" target="_blank">View</a>
        </p>
    @endif
    <div class="clearfix"></div>
    <div class="col-sm-12 col-md-12">
        {!! Form::file('file', ['class' => 'form-control popups__input', 'accept' => '.pdf']) !!}
    </div>
</div>
<div class="form-row mb-3">
    {!! Form::label('authors', trans('site.Authors'), ['class' => 'col-12 text-left popups__label']) !!}
    <div class="clearfix"></div>
    <div class="col-sm-12 col-md-12">
        {!! Form::text('authors', NULL, ['class' => 'form-control popups__input tagsInput', 'multiple' => 'multiple', 'data-initial-value' => isset($authors) ? $authors : '[]', 'data-url' => url('authors'), 'data-user-option-allowed' => 'false', 'data-load-once' => 'true', 'placeholder' => trans('site.Authors')]) !!}
    </div>
</div>
<div class="input-group mb-3">
    {!! Form::label('publication_date', trans('site.Publication Date'), ['class' => 'col-12 text-left p-0 popups__label']) !!}
    {!! Form::date('publication_date', NULL, ['class' => 'form-control popups__input date-input', 'data-inline' => 'false', 'data-role' => 'date','id'=>'publication_date']) !!}
</div>
<div class="form-row mb-3">
    {!! Form::label('location_id', trans('site.Organization Location'), ['class' => 'col-12 text-left popups__label']) !!}
    <div class="clearfix"></div>
    <div class="col-sm-12 col-md-12">
        {!! Form::select('location_id', $locations, isset($paper) ? $paper->location()->id : null, ['class' => 'form-control h-100 popups__input', 'placeholder' => trans('site.Organization Location')]) !!}
    </div>
</div>
<div class="row">
    <div class="form-row mb-3 col-md-9">
        {!! Form::label('school_id', trans('site.Organization'), ['class' => 'col-12 text-left popups__label']) !!}
        <div class="clearfix"></div>
        <div class="col-sm-12 col-md-12">
            {!! Form::select('school_id', $schools, null, ['class' => 'form-control h-100 popups__input', 'placeholder' => trans('site.Organization')]) !!}
        </div>
    </div>
    <div class="form-row mb-3 col-md-3 pr-0">
        {!! Form::label('education_type', trans('site.Education Type'), ['class' => 'col-12 text-left popups__label']) !!}
        <div class="clearfix"></div>
        <div class="w-100">
            {!! Form::select('education_type', config('education_types.' . app()->getLocale()), isset($education_type) ? $education_type : null, ['class' => 'form-control h-100 popups__input', 'placeholder' => trans('site.Education Type')]) !!}
        </div>
    </div>
</div>
<div class="input-group mb-3 reference-container">
    {!! Form::label('references', trans('site.References'), ['class' => 'col-12 p-0 text-left popups__label']) !!}
    <div class="reference-inputs  w-100">
        
    </div>
</div>
<div class="clearfix addmoreadd">
    <a class="float-right add-reference">{{trans('site.Add Reference')}}</a>
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

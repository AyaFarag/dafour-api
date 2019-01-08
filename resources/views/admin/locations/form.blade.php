<div class="box-body">
    <div class="row">
        <div class="form-group col-md-6">
            {!! Form::label('title_en', 'English Title') !!}
            {!! Form::text('title_en', NULL, ['class' => 'form-control', 'id' => 'title_en', 'placeholder' => 'English Title']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('title_ar', 'Arabic Title') !!}
            {!! Form::text('title_ar', NULL, ['class' => 'form-control', 'id' => 'title_ar', 'placeholder' => 'Arabic Title']) !!}
        </div>
    </div>
</div>
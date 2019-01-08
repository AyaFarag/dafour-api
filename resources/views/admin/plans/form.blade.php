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
    <div class="row">
        <div class="form-group col-md-6">
            {!! Form::label('description_en', 'English Description') !!}
            {!! Form::textarea('description_en', NULL, ['class' => 'form-control', 'id' => 'description_en', 'placeholder' => 'English Description']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('description_ar', 'Arabic Description') !!}
            {!! Form::textarea('description_ar', NULL, ['class' => 'form-control', 'id' => 'description_ar', 'placeholder' => 'Arabic Description']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            {!! Form::label('price', 'Plan price') !!}
            {!! Form::number('price', NULL, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Plan price']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('duration', 'Plan Duration ( in months )') !!}
            {!! Form::number('duration', NULL, ['class' => 'form-control', 'id' => 'duration', 'placeholder' => 'Duraion in months']) !!}
        </div>
    </div>
</div>
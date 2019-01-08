<div class="box-body">
    <div class="row">
        <div class="form-group col-md-12">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', NULL, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Title']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', NULL, ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Description']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            {!! Form::file('image'); !!}
        </div>
    </div>
    @if(isset($slider))
        <div class="row">
            <div class="form-group col-md-6">
                    <img src="{{ $slider->image }}" alt="">
            </div>
        </div>
    @endif
</div>
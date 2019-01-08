<div class="box-body">
    <div class="row">
        <div class="form-group col-md-4">
            {!! Form::label('first_name', 'First Name') !!}
            {!! Form::text('first_name', NULL, ['class' => 'form-control', 'id' => 'first_name', 'placeholder' => 'First Name']) !!}
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('middle_name', 'Middle Name') !!}
            {!! Form::text('middle_name', NULL, ['class' => 'form-control', 'id' => 'middle_name', 'placeholder' => 'Middle Name']) !!}
        </div>
        <div class="form-group col-md-4">
            {!! Form::label('last_name', 'Last Name') !!}
            {!! Form::text('last_name', NULL, ['class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Last Name']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            {!! Form::label('degree', 'Degree') !!}
            {!! Form::text('degree', NULL, ['class' => 'form-control', 'id' => 'degree', 'placeholder' => 'Degree']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', NULL, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Password']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('password_confirmation', 'Password') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation', 'placeholder' => 'Password']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-gourp col-md-6">
            {!! Form::label('phone', 'Phone') !!}
            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('country', 'Country') !!}
            {!! Form::select('country', config('countries'), null, ['class' => 'form-control', 'placeholder' => 'Choose country...']) !!}
        </div>
    </div>
</div>
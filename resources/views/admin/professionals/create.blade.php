@extends('admin.layouts.app')

@section('content')
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Quick Example</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        {!! Form::open(['route' => 'admin.professionals.store', 'method' => 'post']) !!}
            @include('admin.professionals.form')
            <!-- /.box-body -->
            <div class="box-footer text-center ">
                <button type="submit" class="btn btn-lg btn-danger">Submit</button>
            </div>
        {!! Form::close() !!}
    </div>
@stop
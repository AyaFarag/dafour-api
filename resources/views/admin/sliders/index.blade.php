@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-danger">
           <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                 <div class="row">
                    <div class="col-sm-12">
                       <table id="sliders" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                          <thead>
                             <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Title: activate to sort column ascending" style="width: 297px;">
                                    Title
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 200px;">
                                    Description
                                </th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Image: activate to sort column descending" style="width: 200px;" aria-sort="ascending">
                                    Image
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 95px;">
                                    Actions
                                </th>
                             </tr>
                          </thead>
                          <tbody>
                            @foreach($sliders as $slider)
                                <tr role="row">
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ str_limit($slider->description, 50)}}</td>
                                    <td>
                                        <img src="{{ $slider->image }}" width="100px">
                                    </td>
                                    <td>
                                        {!! Form::model($slider, ['route' => ['admin.sliders.destroy', $slider->id], 'method' => 'post', 'onsubmit' => 'return confirm("Are you sure");']) !!}
                                            <a href="{!! route('admin.sliders.edit', $slider->id) !!}" class="btn btn-xs btn-primary">View</a> || 
                                            <button class="btn btn-xs btn-danger" type="submit">Delete</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                          </tbody>
                          <tfoot>
                             <tr>
                                <th rowspan="1" colspan="1">Title</th>
                                <th rowspan="1" colspan="1">Description</th>
                                <th rowspan="1" colspan="1">Image</th>
                                <th rowspan="1" colspan="1">Actions</th>
                             </tr>
                          </tfoot>
                       </table>
                    </div>
                 </div>
              </div>
           </div>
           <!-- /.box-body -->
        </div>
    </div>
</div>
@stop

@section('js')
<script src="{!! asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
    $(function () {
      $('#sliders').DataTable();
    });
</script>
@append

@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">
@append
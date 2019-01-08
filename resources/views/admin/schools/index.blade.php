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
                                <table id="pros" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Title: activate to sort column ascending" style="width: 297px;">
                                                English Title
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Arabic Title: activate to sort column ascending" style="width: 200px;">
                                                Arabic Title
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Location: activate to sort column ascending" style="width: 200px;">
                                                Location
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 95px;">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($schools as $school)
                                        <tr role="row">
                                            <td>{{ str_limit($school->title_en, 25) }}</td>
                                            <td>{{ str_limit($school->title_ar, 25) }}</td>
                                            <td>{{ $school->location->{'title_' . app()->getLocale() } }}</td>
                                            <td>
                                                {!! Form::model($school, ['route' => ['admin.schools.destroy', $school->id], 'method' => 'post', 'onsubmit' => 'return confirm("Are you sure");']) !!}
                                                    <a href="{!! route('admin.schools.edit', $school->id) !!}" class="btn btn-xs btn-primary" type="submit">View</a>
                                                    <button class="btn btn-xs btn-danger" type="submit">Delete</button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Arabic Title</th>
                                            <th rowspan="1" colspan="1">English Title</th>
                                            <th rowspan="1" colspan="1">Location</th>
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
            $('#pros').DataTable();

            $('[id^=toggle-block-]').change(function() {
                let student = $('#' + this.id).attr('data-user')
                $.ajax({
                    url: "{!! route('admin.students.toggle_block') !!}",
                    method: 'POST',
                    data: {
                        _token: "{!! csrf_token() !!}",
                        student: student
                    }
                });
            });
        });
    </script>
@append

@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">
@append
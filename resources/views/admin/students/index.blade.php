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
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 297px;">
                                                Name
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 200px;">
                                                Email
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 200px;">
                                                Phone
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Country: activate to sort column descending" style="width: 200px;" aria-sort="ascending">
                                                Country
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 95px;">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students as $student)
                                        <tr role="row">
                                            <td>{{ $student->first_name . ' ' . $student->middle_name . ' ' . $student->last_name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td>{{ config('countries.' . $student->country) }}</td>
                                            <td>
                                                {!! Form::model($student, ['route' => ['admin.students.destroy', $student->id], 'method' => 'post', 'onsubmit' => 'return confirm("Are you sure");']) !!}
                                                {!! Form::checkbox('blocked', null, null, ['data-toggle' => 'toggle', 'data-size' => 'mini', 'data-onstyle' => 'danger', 'data-offstyle' => 'primary', 'data-on' => 'Blocked', 'data-off' => 'Permitted', 'data-user' => "{$student->id}", 'id' => "toggle-block-{$student->id}"]) !!}
                                                <a href="{!! route('admin.students.edit', $student->id) !!}" class="btn btn-xs btn-success">Edit</a>
                                                <button class="btn btn-xs btn-danger" type="submit">Delete</button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Name</th>
                                            <th rowspan="1" colspan="1">Degree</th>
                                            <th rowspan="1" colspan="1">Phone</th>
                                            <th rowspan="1" colspan="1">Country</th>
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
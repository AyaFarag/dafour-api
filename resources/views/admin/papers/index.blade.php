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
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Title: activate to sort column ascending" style="width: 150px;">
                                                Title
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Abstract: activate to sort column ascending" style="width: 200px;">
                                                Abstract
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Organization: activate to sort column ascending" style="width: 200px;">
                                                Organization
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Publication Date: activate to sort column descending" style="width: 100px;" aria-sort="ascending">
                                                Publication Date
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Downloads: activate to sort column descending" style="width: 100px;" aria-sort="ascending">
                                                Downloads
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="File: activate to sort column descending" style="width: 100px;" aria-sort="ascending">
                                                File
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 95px;">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($papers as $paper)
                                        <tr role="row">
                                            <td>{{ str_limit($paper->title, 25) }}</td>
                                            <td>{{ str_limit($paper->abstract, 25) }}</td>
                                            <td>{{ $paper->school->{'title_' . app()->getLocale()} }}</td>
                                            <td>{{ $paper->publication_date }}</td>
                                            <td>{{ $paper->downloads_count . str_plural(' Download', $paper->downloads_count) }}</td>
                                            <td>
                                                <a target="_blank" href="{!! route('admin.papers.view', $paper->id) !!}">{{ str_limit($paper->title, 25) }}.pdf</a>
                                            </td>
                                            <td>
                                                {!! Form::model($paper, ['route' => ['admin.papers.destroy', $paper->id], 'method' => 'post', 'onsubmit' => 'return confirm("Are you sure");']) !!}
                                                    <a href="{!! route('admin.papers.edit', $paper->id) !!}" class="btn btn-xs btn-primary" type="submit">View</a>
                                                    <button class="btn btn-xs btn-danger" type="submit">Delete</button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Title</th>
                                            <th rowspan="1" colspan="1">Abstract</th>
                                            <th rowspan="1" colspan="1">Organization</th>
                                            <th rowspan="1" colspan="1">Publication Date</th>
                                            <th rowspan="1" colspan="1">Downloads</th>
                                            <th rowspan="1" colspan="1">File</th>
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
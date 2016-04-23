@extends('layouts.default')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            @include('includes.alert')

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>{{ $title }}</h4>
                                </div>
                                <div class="col-md-6">                            
                                     <a class="pull-right" href="{!! route('file.create')!!}"><button class="btn btn-success">Upload/Add file</button></a>
                                </div>
                            </div>
                        </div>
                                                   
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                @if(count($files))
                                    <table  id="dataTable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>File Type</th>
                                            <th>File Name</th>
                                            <th>URL</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($files as $file)
                                            <tr>
                                                <td>{!! $file->file_type !!}</td>
                                                <td>{!! $file->file_name !!}</td>
                                                <td>{!! $file->file_link !!}</td>
                                                <td><a class="btn btn-info btn-xs btn-archive Editbtn" href="{!!route('file.show',$file->id)!!}"  style="margin-right: 3px;">Show Details</a></td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    No file added yet. Be first to add a file
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('style')

{!! Html::style('assets/datatables/jquery.dataTables.min.css') !!}

@endsection

@section('script')

    {!! Html::script('assets/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/datatables/dataTables.bootstrap.js') !!}




    <!-- for Datatable -->
    <script type="text/javascript">

        $(document).ready(function() {
            
            /* do not add datatable method/function here , its always loaded from footer -- masiur */
            $('#dataTable').dataTable();

        });
    </script>


@stop







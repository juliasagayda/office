@extends('adminlte::page')

@section('content')
        <div class="row">
            <div class="col-xs-12">

                <div class="box">

                    <div class="box-header">
                        <h3 class="box-title">Departments</h3>

                        <div class="box-tools">


                            <form method="GET" action="{{ url('/departments') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                <div class="input-group">
                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search" value="{{ request('search') }}">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                            <th>Name</th>
                            <th>Description</th>
                            </thead>
                            <tbody>
                            @foreach($departments as $item)
                            <tr>

                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <a href="{{ url('/departments/' . $item->id) }}" data-skin="skin-black-light" class="btn bg-black btn-xs"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody></table>
                        {{ $departments->links() }}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </div>
@stop

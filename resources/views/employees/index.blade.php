@extends('adminlte::page')

@section('content')
        <div class="row">

                <div class="box">

                    <div class="box-header">
                        <h3 class="box-title">Employees</h3>

                        <div class="box-tools">


                            <form method="GET" action="{{ url('/employees') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Date of Birth</th>
                            <th>Position</th>
                            <th>Department</th>
                            <th>Type of rate</th>
                            <th>Worked hours (h) </th>
                            <th>Salary</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @foreach($employees as $item)
                            <tr>

                                <td>{{ $item->first_name }}</td>
                                <td>{{ $item->last_name }}</td>
                                <td>{{ $item->date_of_birth }}</td>
                                <td>{{ $item->position }}</td>
                                <td>
                                    <a href="{{ url('/departments/' . $item->id) }}" data-skin="skin-black-light" class="">
                                    {{ $item->departments->name}}
                                    </a>
                                </td>
                                <td>{{ $item->rate_hour ? 'Hour' : 'Month' }}</td>
                                <td>{{ $item->worked_hour }}</td>
                                <td> {{ !$item->rate_hour ? $item::getMonthSalary($item->salary, $item->worked_hour) : $item->salary }} </td>
                                <td>
                                    <a href="{{ url('/employees/' . $item->id) }}" data-skin="skin-black-light" class="btn bg-black btn-xs"><i class="fa fa-eye"></i></a>

                                    <form method="POST" action="{{ url('/employees' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" data-skin="skin-black-light" class="btn bg-black btn-xs" title="Delete Employee" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody></table>
                        {{ $employees->links() }}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </div>
@stop

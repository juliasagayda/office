@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Employee {{ $employees->first_name }} {{ $employees->last_name }} </div>
                    <div class="card-body">

                        <a href="{{ url('/employees') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/employees/' . $employees->id . '/edit') }}" title="Edit Employee"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('employees' . '/' . $employees->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Employee" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> First name </th><td> {{ $employees->first_name }} </td></tr>
                                    <tr><th> Last name </th><td> {{ $employees->last_name }} </td></tr>
                                    <tr><th> Date of birth </th><td> {{ $employees->date_of_birth }} </td></tr>
                                    <tr><th> Position </th><td> {{ $employees->position }} </td></tr>
                                    <tr><th> Department </th><td> {{ $employees->departments->name }} </td></tr>
                                    <tr><th> Type of payment </th><td> {{ $employees->rate_hour ? 'Hour' : 'Month' }} </td></tr>
                                    <tr><th> Salary </th><td> {{ !$employees->rate_hour ? $employees::getMonthSalary($employees->salary, $employees->worked_hour) : $employees->salary }} </td></tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

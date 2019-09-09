<?php

namespace App\Http\Controllers;

use App\Employees;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Departments;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{

    public function index(Request $request)
    {
        $perPage = 10;
        $departments = Departments::latest()->paginate($perPage);

        return view('departments.index', compact('departments'));
    }


    public function show($id)
    {
        $perPage = 10;
        $employees = Employees::where('departments_id', $id)->paginate($perPage);

        return view('departments.show', compact('employees'));
    }


}

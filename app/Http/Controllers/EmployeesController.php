<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{

    public function index(Request $request)
    {

        $perPage = 10;
        $employees = Employees::latest()->paginate($perPage);

        return view('employees.index', compact('employees'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $employees = Employees::findOrFail($id);

        return view('employees.show', compact('employees'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Employees::destroy($id);

        return redirect('employees')->with('flash_message', 'Employees deleted!');
    }
}

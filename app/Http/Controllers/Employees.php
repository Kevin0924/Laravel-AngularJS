<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Employees extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @param int $id
     * @return Response
     */
    public function index( $id=null ) {
        if($id == null){
            return Employee::orderBy('id','asc')->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Store a newly created resource in storage
     *
     * @param Request $request
     * @return Response
     */

    public function store(Request $request){
        $employee = new Employee;

        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->contact_number = $request->input('contact_number');
        $employee->position = $request->input('position');
        $employee->save();

        return 'Employee record successfully created with id' . $employee->id;
    }

    /**
     * Display the specific resource
     *
     * @param int $id
     * @return Response
     */
    public function show($id){
        return Employee::find($id);
    }

    /**
     * Update the specific resource in storage
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id){
        $employee = Employee::find($id);

        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->contact_number = $request->input('contact_number');
        $employee->position = $request->input('position');
        $employee->save();

        return 'Success updating user#' . $employee->id;
    }

    /**
     * Remove the specific resource in storage
     *
     *@param int $id
     *@return Response
     */
    public function destroy($id){
        $employee = Employee::find($id);

        $employee->delete();

        return 'Empoyee record successfully deleted #' . $id;
    }
}

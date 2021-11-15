<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $companies = Company::with("Employee")->get()->toArray();
        $companies = DB::table("companies AS C")
                        ->select("E.id","E.first_name","E.last_name","E.email","E.phone","C.name")
                        ->join("employees AS E","E.company_id","C.id")
                        ->orderBy("C.id","DESC")
                        ->get()
                        ->toArray();

        return array_reverse($companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $employee = new Employee([
            'first_name' => $request->input('first_name'),
            'email' => $request->input('email'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone_number'),
            'company_id' => $request->input('company_id'),
        ]);

        $employee->save();
  
        return response()->json('Employee successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = employee::find($id);
        return response()->json($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = employee::find($id);
        $employee->update($request->all());
  
        return response()->json('Employee successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Employee = employee::find($id);
        $Employee->delete();
  
        return response()->json('Employee successfully deleted');
    }
}

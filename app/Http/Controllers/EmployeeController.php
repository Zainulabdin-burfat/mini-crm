<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

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


    public function create()
    {
        //
        
    }


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

    public function show(Employee $employee)
    {
        //
    }


    public function edit($id)
    {
        $employee = employee::find($id);
        return response()->json($employee);
    }


    public function update(Request $request, $id)
    {
        $employee = employee::find($id);
        $employee->update($request->all());
  
        return response()->json('Employee successfully updated');
    }

    public function destroy($id)
    {
        $Employee = employee::find($id);
        $Employee->delete();
  
        return response()->json('Employee successfully deleted');
    }
}

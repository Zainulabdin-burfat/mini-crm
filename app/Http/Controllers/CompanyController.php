<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

// use Mail;
use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page=null)
    {
        // $data = Company::all()->toArray();
        // $data = Company::paginate($page);
        // return $data;

        $data = Company::paginate(2);
        return response()->json($data);
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
        try {

            DB::beginTransaction();

            $validate = $request->validate([
                'name' => 'required|min:3',
                'image' => 'required|image|mimes:jpeg,png,jpg|dimensions:min_width=100,min_height=100'
            ]);
            
            $image_name = $request->image->getClientOriginalName();
            $request->image->move(storage_path('app/public'),$image_name);
            
            $Company = Company::create([
                "name" => $request->name,
                "email" => $request->email,
                "logo" => "storage/".$image_name,
                "website" => $request->website
            ]);

            // Mail::to('panhjicar@gmail.com')->send(new MailtrapExample());

            $data = [];
            Mail::send('/email/active', $data, function($message){
                $message->to('panhjicar@gmail.com', 'Admin');
                $message->from('panhjicar@gmail.com', 'System');
                $message->subject('Registration');
            });
            DB::commit();
            return Response()->json(["data" => $validate, "message" => "Company Added Successfully ..!"]);
        } catch (Exception $e) {
            DB::rollBack();
            return Response()->json(["message" => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $company = Company::find($id);
        $company->update($request->all());
  
        return response()->json('post successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
  
        return response()->json('company successfully deleted');
    }
}

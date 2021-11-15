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
  
    public function index($page=null)
    {
        $data = Company::paginate(10);
        return response()->json($data);
    }

    public function create()
    {
        //
    }


    public function add(Request $request)
    {
        try {

            DB::beginTransaction();

            $request->validate([
                'name'  => 'required|min:3',
                'image' => 'image|mimes:jpeg,png,jpg|dimensions:min_width=100,min_height=100'
            ]);
            
            $image_name = null;
            if (isset($request->image)) {
                $image_name = "storage/".$request->image->getClientOriginalName();
                $request->image->move(storage_path('app/public'),$image_name);
            }
           
            $Company = Company::create([
                "name"      => $request->name,
                "email"     => $request->email,
                "logo"      => $image_name,
                "website"   => $request->website
            ]);

            Mail::to('panhjicar@gmail.com')->send(new MailtrapExample());

            DB::commit();
            return Response()->json(["status" => true, "message" => "Company Added Successfully ..!"]);

        } catch (Exception $e) {
            DB::rollBack();
            return Response()->json(["message" => $e->getMessage(), "status" => false]);
        }
    }

    public function show(Company $company)
    {
        //
    }

    public function edit($id)
    {
        $company = Company::find($id);
        return response()->json($company);
    }


    public function update(Request $request,$id)
    {
        $company = Company::find($id);
        $company->update($request->all());
  
        return response()->json('post successfully updated');
    }


    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
  
        return response()->json('company successfully deleted');
    }
}

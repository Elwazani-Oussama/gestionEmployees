<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function createEmployee(Request $request)
    {
        $request -> validate([
            "name" => "required",
            "email" => "required|email|unique:employee",
            "age" => "required",
            "phone_no" => "required",
            "gender" => "required",
        ]);

        $emp = new Employee();


        $emp -> name=$request->name;
        $emp -> email=$request->email;
        $emp -> age=$request->age;
        $emp -> phone_no=$request->phone_no;
        $emp -> gender=$request->gender;
        $emp -> save();

        // response
        return response()->json([
            "status" => 1,
            "message" => "Employee created successfull"
        ]);
    }


    public function listEmployee()
    {
        // $employees=Employee::get();
        // print_r($employees);

        // return response()->json([
        //     "status" => 1,
        //     "message" => "list des employes",
        //     "data" => $employees
        // ]);
        return response()->json(Employee::all(),200);
    }

    
    public function getSingleEmployee($id)
    {
        if(Employee::where("id", $id)->exists()){

            $employee_detail=Employee::where("id", $id)->first();
            return response()->json([
                "status" => 1,
                "message" => "employes Trouve",
                "data" => $employee_detail
            ]);
        }
        else {
            return response()->json([
                "status" => 1,
                "message" => "employee non trouve",
            ],404);
        }
    }

    public function UpdateEmployee(Request $request, $id)
    {
        if(Employee::where("id", $id)->exists())
        {
            $employee=Employee::find($id);

            $employee->name = !empty($request->name)?$request->name:$employee->name;
            $employee->email = !empty($request->email)?$request->email:$employee->email;
            $employee->age = !empty($request->age)?$request->age:$employee->age;
            $employee->phone_no = !empty($request->phone_no)?$request->phone_no:$employee->phone_no;
            $employee->gender = !empty($request->gender)?$request->gender:$employee->gender;

            $employee->save();

            return response()->json([
                "status"=>1,
                "message"=>"employee modifie avec success"
            ]);

        }
        else{
            return response()->json([
                "status"=>1,
                "message"=>"doesn't work",
            ],404);
        }

    }

    public function DeleteEmployee($id)
    {
        if(Employee::where("id", $id)->exists())
        {
            $employee=Employee::find($id);

            $employee->delete();
            return response()->json([
                "status"=>1,
                "message"=>"employee deleted avec success"
            ]);
        }
        else{
            return response()->json([
                "status"=>1,
                "message"=>"doesn't work",
            ],404);
        }

    }
}

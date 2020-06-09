<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Employee;
use Illuminate\Http\Request;
class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add_employee(){
        return view('admin.employee.add_employee');
    }
    public function save_employee(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:employees|max:30',
            'phone' => 'required|unique:employees|max:20',
            'address' => 'required|max:100',
            'experience' => 'required|max:2',
            'salary' => 'required|max:20',
            'vacation' => 'required|max:20',
            'city' => 'required|max:20',
            'nid_no' => 'required|unique:employees|max:20',
        ]);
        $image = $request->file('photo');
        $image_full_name = time() . '.' . $image->getClientOriginalExtension();
        $directory = 'admin/images/';
        $image_url = $directory.$image_full_name;
        $image->move($directory, $image_full_name);
        $employee = new Employee();
        $employee['name'] = $request['name'];
        $employee['email'] = $request['email'];
        $employee['phone'] = $request['phone'];
        $employee['address'] = $request['address'];
        $employee['experience'] = $request['experience'];
        $employee['salary'] = $request['salary'];
        $employee['vacation'] = $request['vacation'];
        $employee['city'] = $request['city'];
        $employee['nid_no'] = $request['nid_no'];
        $employee['photo'] = $image_url;
        $employee->save();
        //Session::flash('success', 'Data Inserted successfully');
        return redirect('/add_employee')->with('message', 'Employee Information save successfully');
    }
    public function manage_employee(){
        $employees = Employee::all();
        return view('admin.employee.manage_employee', compact('employees'));
    }
    public function view_employee($id){
        $id = Employee::find($id);
        return view('admin.employee.view_employee',compact('id'));
    }
    public function edit_employee($id){
        $id = Employee::find($id);
        return view('admin.employee.edit_employee',compact('id'));
    }
    public function update_employee(Request $request, $id){
        $image = $request->file('photo');
        if($image){
            $image = $request->file('photo');
            unlink($image);
            $image_full_name = time() . '.' . $image->getClientOriginalExtension();
            $directory = 'admin/images/';
            $image_url = $directory.$image_full_name;
            $image->move($directory, $image_full_name);
            $employee = Employee::findorfail($id);
            $employee['name'] = $request['name'];
            $employee['email'] = $request['email'];
            $employee['phone'] = $request['phone'];
            $employee['address'] = $request['address'];
            $employee['experience'] = $request['experience'];
            $employee['salary'] = $request['salary'];
            $employee['vacation'] = $request['vacation'];
            $employee['city'] = $request['city'];
            $employee['nid_no'] = $request['nid_no'];
            $employee['photo'] = $image_url;
            $employee->update();
        }else{
            $employee = Employee::findorfail($id);
            $employee['name'] = $request['name'];
            $employee['email'] = $request['email'];
            $employee['phone'] = $request['phone'];
            $employee['address'] = $request['address'];
            $employee['experience'] = $request['experience'];
            $employee['salary'] = $request['salary'];
            $employee['vacation'] = $request['vacation'];
            $employee['city'] = $request['city'];
            $employee['nid_no'] = $request['nid_no'];
            $employee->update();
        }
        return redirect('/manage_employee')->with('message', "Update Successfully");
    }
    public function delete_employee($id){
        $delete = Employee::find($id);
        $photo = $delete->photo;
        unlink($photo);
        $delete->delete();
        return redirect('/manage_employee')->with('message', "Deleted Successfully");
    }
}

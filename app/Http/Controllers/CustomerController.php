<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Employee;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add_customer(){
        return view('admin.customer.add_customer');
    }
    public function save_customer(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'phone' => 'required|unique:customers|max:20',
            'address' => 'required|max:100',
            'bank_name' => 'required|max:100',
        ]);
        $image = $request->file('photo');
        $image_full_name = time().'.'.$image->getClientOriginalExtension();
        $directory = 'admin/images/';
        $image_url = $directory.$image_full_name;
        $image->move($directory, $image_full_name);
        $customer = new Customer();
        $customer['name'] = $request['name'];
        $customer['email'] = $request['email'];
        $customer['phone'] = $request['phone'];
        $customer['address'] = $request['address'];
        $customer['shop_name'] = $request['shop_name'];
        $customer['account_holder'] = $request['account_holder'];
        $customer['account_number'] = $request['account_number'];
        $customer['bank_name'] = $request['bank_name'];
        $customer['bank_branch'] = $request['bank_branch'];
        $customer['city'] = $request['city'];
        $customer['photo'] = $image_url;
        $customer->save();
        return redirect('/add_customer')->with('message','Customer Information Save Successfully');
    }
    public function manage_customer(){
        $customers = Customer::all();
        return view('admin.customer.manage_customer',compact('customers'));
    }
    public function view_customer($id){
        $id = Customer::find($id);
        return view('admin.customer.view_customer',compact('id'));
    }
    public function edit_customer($id){
        $id = Customer::find($id);
        return view('admin.customer.edit_customer',compact('id'));
    }
    public function update_customer(Request $request, $id){
        $image = $request->file('photo');
        $image_full_name = time() . '.' . $image->getClientOriginalExtension();
        $directory = 'admin/images/';
        $image_url = $directory.$image_full_name;
        $image->move($directory, $image_full_name);
        $customer = Customer::findorfail($id);
        $customer['name'] = $request['name'];
        $customer['email'] = $request['email'];
        $customer['phone'] = $request['phone'];
        $customer['address'] = $request['address'];
        $customer['shop_name'] = $request['shop_name'];
        $customer['account_holder'] = $request['account_holder'];
        $customer['account_number'] = $request['account_number'];
        $customer['bank_name'] = $request['bank_name'];
        $customer['bank_branch'] = $request['bank_branch'];
        $customer['city'] = $request['city'];
        $customer['photo'] = $image_url;
        $customer->update();
        return redirect('/manage_customer')->with('message', "Update Successfully");
    }
    public function delete_customer($id){
        $delete = Employee::find($id);
        $photo = $delete->photo;
        unlink($photo);
        $delete->delete();
        return redirect('/manage_customer')->with('message', 'Delete Successfully');
    }
}

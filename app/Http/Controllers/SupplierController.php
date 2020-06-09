<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add_supplier(){
        return view('admin.supplier.add_supplier');
    }
    public function save_supplier(Request $request){
        $photo = $request->file('photo');
        $photo_full_name = time().'.'.$photo->getClientOriginalExtension();
        $location = 'admin/images/';
        $imgUrl = $location.$photo_full_name;
        $photo->move($location, $photo_full_name);
        $supplier = new Supplier();
        $supplier['name'] = $request['name'];
        $supplier['email'] = $request['email'];
        $supplier['phone'] = $request['phone'];
        $supplier['address'] = $request['address'];
        $supplier['type'] = $request['type'];
        $supplier['shop'] = $request['shop'];
        $supplier['account_holder'] = $request['account_holder'];
        $supplier['account_number'] = $request['account_number'];
        $supplier['bank_name'] = $request['bank_name'];
        $supplier['branch_name'] = $request['branch_name'];
        $supplier['city'] = $request['city'];
        $supplier['photo'] = $imgUrl;
        $supplier->save();
        return redirect('/add_supplier')->with('message', 'Supplier Information Save');
    }
    public function manage_supplier(){
        $suppliers = Supplier::all();
        return view('admin.supplier.manage_supplier',compact('suppliers'));
    }
    public function view_supplier($id){
        $id = Supplier::find($id);
        return view('admin.supplier.view_supplier',compact('id'));
    }
    public function edit_supplier($id){
        $supplier = Supplier::find($id);
        return view('admin.supplier.edit_supplier',compact('supplier'));
    }
    public function update_supplier(Request $request, $id){
        $photo = $request->file('photo');
        $photo_full_name = time().'.'.$photo->getClientOriginalExtension();
        $location = 'admin/images/';
        $imgUrl = $location.$photo_full_name;
        $photo->move($location, $photo_full_name);
        $supplier = Supplier::findorfail($id);
        $supplier['name'] = $request['name'];
        $supplier['email'] = $request['email'];
        $supplier['phone'] = $request['phone'];
        $supplier['address'] = $request['address'];
        $supplier['type'] = $request['type'];
        $supplier['shop'] = $request['shop'];
        $supplier['account_holder'] = $request['account_holder'];
        $supplier['account_number'] = $request['account_number'];
        $supplier['bank_name'] = $request['bank_name'];
        $supplier['branch_name'] = $request['branch_name'];
        $supplier['city'] = $request['city'];
        $supplier['photo'] = $imgUrl;
        $supplier->update();
        return redirect('/manage_supplier')->with('message', 'Supplier Information Updated Successfully');
    }
    public function delete_supplier($id){
        $id = Supplier::find($id);
        $photo = $id->photo;
        unlink($photo);
        $id->delete();
        return redirect('/manage_supplier')->with('message', 'Successfully Deleted');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
class PosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add_pos(){
        $products = DB::table('products')
            ->join('categories','products.cat_id','categories.id')
            ->select('categories.category_name','products.*')
            ->get();
        $customers = DB::table('customers')->get();
        return view('admin.pos.add_pos',compact('products','customers'));
    }
    public function search(Request $request){
        $search = $request->search;
        $products = DB::table('products')
            ->join('categories','products.cat_id','categories.id')
            ->select('categories.category_name','products.*')
            ->where('product_name','like','%'.$search.'%')
            ->get();
        return view('admin.pos.add_pos',compact('products'));
    }
    public function cart(Request $request){
        $data = array();
        $data['id']=$request['id'];
        $data['name']=$request['name'];
        $data['qty']=$request['qty'];
        $data['price']=$request['price'];
        $data['weight']=$request['weight'];
        $add = Cart::add($data);
        return redirect()->back()->with('message','Product Added');
    }
    public function cart_update(Request $request,$rowId){
        $qty = $request['qty'];
        $update_cart = Cart::update($rowId, $qty);
        return redirect()->back()->with('message','Updated Successfully');
    }
    public function cart_remove($rowId){
        $remove_cart = Cart::remove($rowId);
        return redirect()->back()->with('message','Updated Successfully');
    }


    //invoice here-----
    public function invoice(Request $request){
        $validatedData = $request->validate([
            'cus_id' => 'required',
        ],[
            'cus_id.required' => 'Select Customer First!',
        ]);
        $cus_id = $request->cus_id;
        $customer = DB::table('customers')->where('id', $cus_id)->first();
        $contents = Cart::content();
       return view('admin.pos.invoice',compact('customer','contents'));
    }
    public function final_invoice(Request $request){
        $validatedData = $request->validate([
            'payment_status' => 'required',
            'pay' => 'required',
            'due' => 'required',
        ],[
            'payment_status.required' => 'Select Payment Query!',
        ]);
        $data = array();
        $data['customer_id'] = $request['customer_id'];
        $data['order_date'] = $request['order_date'];
        $data['order_status'] = $request['order_status'];
        $data['total_product'] = $request['total_product'];
        $data['sub_total'] = $request['sub_total'];
        $data['vat'] = $request['vat'];
        $data['total'] = $request['total'];
        $data['payment_status'] = $request['payment_status'];
        $data['pay'] = $request['pay'];
        $data['due'] = $request['due'];
        $order_id = DB::table('orders')->insertGetId($data);
        $contants = Cart::content();
        $odata = array();
        foreach ($contants as $contant){
            $odata['order_id'] = $order_id;
            $odata['product_id'] = $contant->id;
            $odata['quantity'] = $contant->qty;
            $odata['unitcost'] = $contant->price;
            $odata['total'] = $contant->total;
            $insert = DB::table('ordertable')->insert($odata);
        }
        Cart::destroy();
        return redirect('/add_pos')->with('message','Payment Complete');
    }


    //Order
    public function padding_order(){
        $panddings = DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.name','orders.*')
            ->where('order_status','panding')
            ->get();
        return view('admin.orders.pandding_orders',compact('panddings'));
    }
    public function order_status($id){
        $orders = DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.*','orders.*','orders.id as order_id')
            ->where('orders.id',$id)
            ->first();
        $ordersdetails = DB::table('ordertable')
            ->join('products','ordertable.product_id','products.id')
            ->select('ordertable.*','products.product_name','products.product_code')
            ->where('order_id',$id)
            ->get();
        return view('admin.orders.order_confirmation',compact('orders','ordersdetails'));
    }
    public function pos_done($id){
        $confirm = DB::table('orders')->where('id',$id)->update(['order_status' => 'success']);
        return redirect('/padding_order')->with('message','Product Confirm');
    }

    public function confirm_order(){
        $confirmed = DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.name','orders.*')
            ->where('order_status','success')
            ->get();
        return view('admin.orders.confirm_order',compact('confirmed'));
    }


}

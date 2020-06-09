<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Product;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add_product(){
        return view('admin.product.add_product');
    }
    public function save_product(Request $request){
        $photo = $request->file('product_image');
        $photo_full_name = time().'.'.$photo->getClientOriginalExtension();
        $location = 'admin/images/product/';
        $imgUrl=$location.$photo_full_name;
        $photo->move($location, $photo_full_name);
        $data = array();
        $data['product_name'] = $request['product_name'];
        $data['product_code'] = $request['product_code'];
        $data['cat_id'] = $request['cat_id'];
        $data['sup_id'] = $request['sup_id'];
        $data['product_garage'] = $request['product_garage'];
        $data['product_route'] = $request['product_route'];
        $data['buy_date'] = $request['buy_date'];
        $data['expire_date'] = $request['expire_date'];
        $data['buying_rate'] = $request['buying_rate'];
        $data['selling_rate'] = $request['selling_rate'];
        $data['product_image'] = $imgUrl;
        $product = DB::table('products')->insert($data);
        return redirect('/add_product/')->with('message','Product Save Successfully');
    }
    public function manage_product(){
        $products = DB::table('products')->get();
        return view('admin.product.manage_product',compact('products'));
    }
    public function search(Request $request){
        $search= $request->get('search');
        $products = DB::table('products')->where('product_name','like','%'.$search.'%');
    }
    public function view_product($id){
        $product = DB::table('products')
            ->join('categories','products.cat_id','categories.id')
            ->join('suppliers','products.sup_id','suppliers.id')
            ->select('categories.category_name','products.*','suppliers.name')
            ->where('products.id', $id)
            ->first();
        return view('admin.product.view_product',compact('product'));
    }
    public function delete_product($id){
        $product = Product::find($id);
        $photo = $product->product_image;
        unlink($photo);
        $product->delete();
        return redirect('/manage_product')->with('message','Product Deleted Successfully');
    }
    public function edit_product($id){
        $product = Product::find($id);
        return view('admin.product.edit_product',compact('product'));
    }
    public function update_product(Request $request, $id){
        $image = $request->file('product_image');
        if($image){
            $image = $request->file('product_image');
            unlink($image);
            $image_full_name = time() . '.' . $image->getClientOriginalExtension();
            $directory = 'admin/images/product/';
            $image_url = $directory.$image_full_name;
            $image->move($directory, $image_full_name);
            $data = Product::findorfail($id);
            $data['product_name'] = $request['product_name'];
            $data['product_code'] = $request['product_code'];
            $data['cat_id'] = $request['cat_id'];
            $data['sup_id'] = $request['sup_id'];
            $data['product_garage'] = $request['product_garage'];
            $data['product_route'] = $request['product_route'];
            $data['buy_date'] = $request['buy_date'];
            $data['expire_date'] = $request['expire_date'];
            $data['buying_rate'] = $request['buying_rate'];
            $data['selling_rate'] = $request['selling_rate'];
            $data['product_image'] = $image_url;
            $data->update();
        }else{
            $data = Product::findorfail($id);
            $data['product_name'] = $request['product_name'];
            $data['product_code'] = $request['product_code'];
            $data['cat_id'] = $request['cat_id'];
            $data['sup_id'] = $request['sup_id'];
            $data['product_garage'] = $request['product_garage'];
            $data['product_route'] = $request['product_route'];
            $data['buy_date'] = $request['buy_date'];
            $data['expire_date'] = $request['expire_date'];
            $data['buying_rate'] = $request['buying_rate'];
            $data['selling_rate'] = $request['selling_rate'];
            $data->update();
        }
        return redirect('/manage_product')->with('message', "Product Update Successfully");
    }
    //Product Import And Export Here------
    public function import_product(){
        return view('admin.product.import_product');
    }
    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
    public function import(Request $request)
    {
        $import = Excel::import(new ProductsImport, $request->file('import_product'));
        return redirect('/import_product/')->with('message','Import Data');
    }
}

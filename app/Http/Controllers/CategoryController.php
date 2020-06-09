<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add_category(){
        return view('admin.category.add_category');
    }
    public function save_category(Request $request){
        $category = new Category();
        $category['category_name'] = $request['category_name'];
        $category->save();
        return redirect('/add_category')->with('message', 'Category Information save Successfully');
    }
    public function manage_category(){
        $category = Category::get();
        return view('admin.category.manage_category',compact('category'));
    }
    public function edit_category($id){
        $id = Category::find($id);
        return view('admin.category.edit_category',compact('id'));
    }
    public function update_category(Request $request, $id){
        $category = Category::findorfail($id);
        $category['category_name'] = $request['category_name'];
        $category->update();
        return redirect('/manage_category')->with('message', 'Category Update Successfully');
    }
    public function delete_category($id){
        $id = Category::find($id);
        $id->delete();
        return redirect('/manage_category')->with('message', 'Deleted Category Info');
    }
}

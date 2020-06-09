<?php

namespace App\Http\Controllers;

use App\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpensesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add_expenses(){
        return view('admin.expenses.add_expenses');
    }
    public function save_expenses(Request $request){
        $expenses = new Expenses();
        $expenses['details'] = $request['details'];
        $expenses['amount'] = $request['amount'];
        $expenses['month'] = $request['month'];
        $expenses['date'] = $request['date'];
        $expenses['year'] = $request['year'];
        $expenses->save();
        return redirect('/add_expenses')->with('message','Expenses Save Successfully');
    }
    public function manage_expenses(){
        $expenses = Expenses::all()->sortDesc();
        return view('admin.expenses.manage_expenses',compact('expenses'));
    }
    public function edit_expenses($id){
        $edit_expenses = Expenses::find($id);
        return view('admin.expenses.edit_expenses',compact('edit_expenses'));
    }
    public function update_expenses(Request $request, $id){
        $update_expenses = Expenses::findorfail($id);
        $update_expenses['details'] = $request['details'];
        $update_expenses['amount'] = $request['amount'];
        $update_expenses->update();
        return redirect('/manage_expenses')->with('message','Expenses Update Successfully');
    }
    public function total_expenses(){
        return view('admin.expenses.total_expenses');
    }
    public function previous_month(){
        return view('admin.expenses.last_month');
    }
    public function today_expenses(){
        return view('admin.expenses.today_expenses');
    }
    public function this_month_expenses(){
        return view('admin.expenses.this_month_expenses');
    }
    public function year_expenses(){
        return view('admin.expenses.year_expenses');
    }
    public function monthly_expenses(){
        $month = "January";
        $expenses = DB::table('expenses')->where('month',$month)->get();
        $amount = DB::table('expenses')->where('month',$month)->sum('amount');
        return view('admin.expenses.monthly_expenses',compact('expenses','amount'));
    }
    public function january_expenses(){
        $month = "January";
        $expenses = DB::table('expenses')->where('month',$month)->get();
        $amount = DB::table('expenses')->where('month',$month)->sum('amount');
        return view('admin.expenses.monthly_expenses',compact('expenses','amount'));
    }
    public function february_expenses(){
        $month = "February";
        $expenses = DB::table('expenses')->where('month',$month)->get();
        $amount = DB::table('expenses')->where('month',$month)->sum('amount');
        return view('admin.expenses.monthly_expenses',compact('expenses','amount'));
    }
    public function march_expenses(){
        $month = "March";
        $expenses = DB::table('expenses')->where('month',$month)->get();
        $amount = DB::table('expenses')->where('month',$month)->sum('amount');
        return view('admin.expenses.monthly_expenses',compact('expenses','amount'));
    }
    public function april_expenses(){
        $month = "April";
        $expenses = DB::table('expenses')->where('month',$month)->get();
        $amount = DB::table('expenses')->where('month',$month)->sum('amount');
        return view('admin.expenses.monthly_expenses',compact('expenses','amount'));
    }
    public function may_expenses(){
        $month = "May";
        $expenses = DB::table('expenses')->where('month',$month)->get();
        $amount = DB::table('expenses')->where('month',$month)->sum('amount');
        return view('admin.expenses.monthly_expenses',compact('expenses','amount'));
    }
    public function june_expenses(){
        $month = "June";
        $expenses = DB::table('expenses')->where('month',$month)->get();
        $amount = DB::table('expenses')->where('month',$month)->sum('amount');
        return view('admin.expenses.monthly_expenses',compact('expenses','amount'));
    }
    public function july_expenses(){
        $month = "July";
        $expenses = DB::table('expenses')->where('month',$month)->get();
        $amount = DB::table('expenses')->where('month',$month)->sum('amount');
        return view('admin.expenses.monthly_expenses',compact('expenses','amount'));
    }
    public function august_expenses(){
        $month = "July";
        $expenses = DB::table('expenses')->where('month',$month)->get();
        $amount = DB::table('expenses')->where('month',$month)->sum('amount');
        return view('admin.expenses.monthly_expenses',compact('expenses','amount'));
    }
    public function september_expenses(){
        $month = "September";
        $expenses = DB::table('expenses')->where('month',$month)->get();
        $amount = DB::table('expenses')->where('month',$month)->sum('amount');
        return view('admin.expenses.monthly_expenses',compact('expenses','amount'));
    }
    public function october_expenses(){
        $month = "October";
        $expenses = DB::table('expenses')->where('month',$month)->get();
        $amount = DB::table('expenses')->where('month',$month)->sum('amount');
        return view('admin.expenses.monthly_expenses',compact('expenses','amount'));
    }
    public function november_expenses(){
        $month = "November";
        $expenses = DB::table('expenses')->where('month',$month)->get();
        $amount = DB::table('expenses')->where('month',$month)->sum('amount');
        return view('admin.expenses.monthly_expenses',compact('expenses','amount'));
    }
    public function december_expenses(){
        $month = "December";
        $expenses = DB::table('expenses')->where('month',$month)->get();
        $amount = DB::table('expenses')->where('month',$month)->sum('amount');
        return view('admin.expenses.monthly_expenses',compact('expenses','amount'));
    }
}

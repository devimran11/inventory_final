<?php

namespace App\Http\Controllers;

use App\AdvanceSalary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvanceSalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add_advance_salary(){
        return view('admin.salary.add_advance_salary');
    }
    public function save_advance_salary(Request $request){
        $month = $request['month'];
        $emp_id = $request['emp_id'];
        $advance = DB::table('advance_salaries')
            ->where('month', $month)
            ->where('emp_id', $emp_id)
            ->first();
        if($advance === null){
            $salary = new AdvanceSalary();
            $salary['emp_id'] = $request['emp_id'];
            $salary['month'] = $request['month'];
            $salary['year'] = $request['year'];
            $salary['advance_salary'] = $request['advance_salary'];
            $salary->save();
            return redirect('/add_advance_salary')->with('message','Salary Information Saved');
        }else{
            echo 'Already Advance Paid';
        }
    }
    public function manage_advance_salary(){
        $salary = DB::table('advance_salaries')
            ->join('employees','advance_salaries.emp_id','=','employees.id')
            ->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
            ->orderBy('id','DESC')
            ->get();
        return view('admin.salary.manage_advance_salary')->with('salaries', $salary);
    }
}

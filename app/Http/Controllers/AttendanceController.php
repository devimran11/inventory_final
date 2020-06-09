<?php

namespace App\Http\Controllers;

use App\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function take_attendance(){
        $employees = DB::table('employees')->get();
        return view('admin.attendance.take_attendance',compact('employees'));
    }
    public function save_attendance(Request $request){
        $date = $request->att_date;
        $att_date = DB::table('attendances')->where('att_date',$date)->first();
        if($att_date){
            return redirect('/take_attendance')->with('message','Today Already Attendance Saved');
        }else{
            foreach ($request->user_id as $id){
                $data[] = [
                    "user_id" => $id,
                    "attendance" =>$request->attendance[$id],
                    "att_date" =>$request->att_date,
                    "att_year" =>$request->att_year,
                    "month" =>$request->month,
                    "edit_date" =>date('d_m_Y'),
                ];
            }
            $att= DB::table('attendances')->insert($data);
            return redirect('/take_attendance')->with('message','Attendance Saved');
        }

    }
    public function all_attendance(){
        $all_att = DB::table('attendances')->select('edit_date')->groupBy('edit_date')->get();
        return view('admin.attendance.all_attendance',compact('all_att'));
    }
    public function edit_attendance($edit_date){
        $edit_data = DB::table('attendances')->where('edit_date', $edit_date)->first();
        $edit_dates = DB::table('attendances')
            ->join('employees','attendances.user_id','employees.id')
            ->select('employees.name','employees.photo','attendances.*')
            ->where('edit_date', $edit_date)
            ->get();
        return view('admin.attendance.edit_attendance',compact('edit_dates','edit_data'));
    }
    public function update_attendance(Request $request){
            foreach ($request->id as $id){
                $data=[
                    "attendance" =>$request->attendance[$id],
                    "att_date" =>$request->att_date,
                    "att_year" =>$request->att_year,
                    "month" =>$request->month,
                ];
            }
            $attendance = Attendance::where(['att_date'=>$request->att_date,'id'=>$id])->first();
            $attendance->update($data);
            return redirect('/all_attendance/')->with('message','Update Attendance Successfully');

    }

}

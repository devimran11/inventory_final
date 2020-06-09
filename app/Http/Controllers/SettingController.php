<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add_setting(){
        return view('admin.setting.add_setting');
    }
    public function save_setting(Request $request){
        $company_logo = $request->file('company_logo');
        $image_full_name = time().'.'.$company_logo->getClientOriginalExtension();
        $location='admin/images/logo/';
        $image_url = $location.$image_full_name;
        $company_logo->move($location, $image_full_name);
        $setting = new Setting();
        $setting['company_name'] = $request['company_name'];
        $setting['company_address'] = $request['company_address'];
        $setting['company_email'] = $request['company_email'];
        $setting['company_phone'] = $request['company_phone'];
        $setting['company_logo'] = $image_url;
        $setting['company_mobile'] = $request['company_mobile'];
        $setting['company_city'] = $request['company_city'];
        $setting['company_country'] = $request['company_country'];
        $setting['company_zipcode'] = $request['company_zipcode'];
        $setting->save();
        return redirect('/add_setting')->with('message','Save Company Information');
    }
    public function manage_setting(){
        $settings = Setting::all();
        return view('admin.setting.manage_setting',compact('settings'));
    }
    public function edit_setting($id){
        $edit_setting = Setting::find($id);
        return view('admin.setting.edit_setting',compact('edit_setting'));
    }
    public function update_setting(Request $request, $id){
        $company_logo = $request->file('company_logo');
        if($company_logo){
            $company_logo = $request->file('company_logo');
            $image_full_name = time().'.'.$company_logo->getClientOriginalExtension();
            $location='admin/images/logo/';
            $image_url = $location.$image_full_name;
            $company_logo->move($location, $image_full_name);
            $setting = Setting::findorfail($id);
            $setting['company_name'] = $request['company_name'];
            $setting['company_address'] = $request['company_address'];
            $setting['company_email'] = $request['company_email'];
            $setting['company_phone'] = $request['company_phone'];
            $setting['company_logo'] = $image_url;
            $setting['company_mobile'] = $request['company_mobile'];
            $setting['company_city'] = $request['company_city'];
            $setting['company_country'] = $request['company_country'];
            $setting['company_zipcode'] = $request['company_zipcode'];
            $setting->update();
            return redirect('/manage_setting/')->with('message','Update Company Information');
        }else{
            $setting = Setting::findorfail($id);
            $setting['company_name'] = $request['company_name'];
            $setting['company_address'] = $request['company_address'];
            $setting['company_email'] = $request['company_email'];
            $setting['company_phone'] = $request['company_phone'];
            $setting['company_mobile'] = $request['company_mobile'];
            $setting['company_city'] = $request['company_city'];
            $setting['company_country'] = $request['company_country'];
            $setting['company_zipcode'] = $request['company_zipcode'];
            $setting->update();
            return redirect('/manage_setting')->with('message','Update Company Information');
        }
    }
}

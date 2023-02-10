<?php

namespace App\Http\Controllers;

use App\Http\Controllers\userController;
use App\Models\attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function get_employees()
    {
               
        
    }
    public function admin()
    {
        $user =attendance::all();
        
        // dd($user);
       
          
        
        return view('hi',compact('user')); 
        
        
    }
    public function add_employee(Request $request)
    {
        
        $password=hash::make($request->password);
        user::create([
            'name'=>$request->name,
            'password'=>hash::make($request->password),
            'email'=>$request->email,
            'user_type'=>$request->get('user_type'),

            
        ]);
        return redirect()->back()->with('message', 'تم تسجيل الموظف بنجاح');
        
        
    }

}

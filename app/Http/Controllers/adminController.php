<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\qr_code;
use App\Models\attendance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\userController;

class adminController extends Controller
{
    public function get_employees()
    {
               
        
    }

    public function generate_qrcode()
    {            
            // $randomString = Str::random(30);
            // dd($randomString);
            // return view('hi',compact('randomString'));
    }
    public function mod()
    {
     
        $uuid=qr_code::find(1);
        return view('mod.mod',compact('uuid')); 
        
        
    }
    public function admin()
    {
         $user =attendance::all();
        // $randomString = Str::random(30);
        // dd($user);
       
        
        
       
          
        
        return view('hi',compact('user')); 
        
        
    }
    public function add_attendance($uuid)
    {
        
       $qr= qr_code::find(1);
       
       
      
         $attend = new attendance();
        
        if($qr->qr_code==$uuid)
            {
                attendance::updateOrCreate([
                    'attendence_status'=>'حضور',
                    'user_id'=>Auth::user()->id,
                    'attendence_time'=> Carbon::now()->addHour(),
                    'leave_time'=>null
                ]);
                return '<h1>تم تسجيل الحضور</h1>';  
            }
            else
            {
                return redirect()->back()->with('Message','الرابط غير صالح');  
                
            }
      }
    public function update_attendance($uuid)
    {
        
        $qr= qr_code::find(1);
        if($qr->qr_code==$uuid)
        {
            $update = attendance::where('user_id',Auth::user()->id);
            $update->update([
                'attendence_status' => 'انصراف',
    
                'leave_time' => Carbon::now()->addHour(),
    
            ]);

            return "<h1>تم تسجيل الانصراف</h1>";  
        }
       
        
       
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

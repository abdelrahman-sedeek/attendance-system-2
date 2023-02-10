<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\qr_code;
use App\Models\attendance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\adminController;
use GuzzleHttp\Psr7\Message;

class usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }
    public function get_qrcode(qr_code $id)
    {
        $frist=$id->id;
        $uuid=qr_code::where('id',1)->get();
        dd($uuid);
        $uuid->qr_code = Str::uuid()->toString();
        
        return response()->json($frist);
    }
    
   
    
    public function redirect()
    {
      
        if(Auth::user()->user_type=='1')
        {
            return redirect()->route('admin');
        }
        else
        {
            return redirect()->route('user');
            
        }
    }
    public function user()
    {
        return view('user.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_attendance(qr_code $uuid )
    {
        $frist=qr_code::where('id',1)->get('qr_code');
         $qr= $uuid->id=1;
        //  $uuid=$qr->qr_code;
        
       
         URL::defaults(['uuid' => $qr]);
         $attend = new attendance();
        // URL::("add_attendance/{hi}");
        // for ($count = 1; $count < 100;$count++)
        // {
        //     // $uuid->qr_code = Str::uuid()->toString();
            
        // }
        
        // $uuid->qr_code_user_pivot->user_id = Auth::user()->id;
        // $uuid->save();
        // $id = Auth::user()->id;
        attendance::updateOrCreate([
            'attendence_status'=>'حضور',
            'user_id'=>Auth::user()->id,
           'attendence_time'=> Carbon::now()->addHour(),
            'leave_time'=>null
        ]);
        return redirect()->back()->with('Message','تم تسجيل الحضور');  
      }
    public function update_attendance()
    {
        
        URL::temporarySignedRoute( 'update_attendance', now()->addMinutes(1), ['user' =>1] );
        for ($count = 1; $count < 100;$count++)
        {
        
            
        }
        
       
        $update = attendance::where('user_id',Auth::user()->id);
        $update->update([
            'attendence_status' => 'انصراف',

            'leave_time' => Carbon::now()->addHour(),

        ]);
        
       
        return redirect()->back()->with('message', 'تم تسجيل الانصراف');  
      }

    
}

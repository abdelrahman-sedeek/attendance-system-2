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
    
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\PHPMailer;
use Mail;
use App\User;
use App\userDetails;
use App\Userotp;
use Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('Registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator        = Validator::make($request->all(), [
            'uname'   => 'required',
            'pwd' => 'required',
            'cpwd' => 'required',
            'mail' => 'required|email|unique:usersdetails',
            'dob' => 'required',
            'cty' => 'required'
        ]);
        if ($validator->fails()) {
           return back()->withErrors($validator);
        } else {
            $objuser            = new User();
            $objuser->username  = $request->uname;
            $objuser->password  = Hash::make($request->pwd);
            $objuser->save();

            $lastId = $objuser->id;

            $objuserdetails         = new userDetails();
            $objuserdetails->userId = $lastId;
            $objuserdetails->mail  = $request->mail;
            $objuserdetails->dob    = $request->dob;
            $objuserdetails->city   = $request->cty;
            $objuserdetails->status   = '0';
            $objuserdetails->save();

            $otp = mt_rand(1000,9999);

            $objuserotp = new Userotp();
            $objuserotp->userId = $lastId;
            $objuserotp->userotp = $otp;
            $objuserotp->save();

            $data['lastid'] = $lastId;

            
            $mail_username = env('MAIL_USERNAME');
            $mail_password = env('MAIL_PASSWORD');
            $mail_port = env('MAIL_PORT');
            $mail_fromaddr = env('MAIL_FROM_ADDRESS');
            $mail_fromaddrname = env('MAIL_FROM_NAME');

            $userotp = Userotp::where('id','=',$lastId)->first();

            $usersotp = $userotp->userotp;

            $tomail = $request->mail;

            Mail::send('mail.send',['name' => $request->uname, 'otp' => $usersotp],function($message){

                $message->from('user@gmail.com', 'User');


                $message->to('user@gmail.com');
            });
                
                Session::flash('message','user successfully Registered,check mail and enter otp!');
                return redirect('otpverification');
        } 
    }

    public function otpverification()
    {
        $lastId = Userotp::max('id');
        $data['userotp'] = Userotp::where('id','=',$lastId)->first();
        return view('otpverification',$data);
    }

    public function verification(Request $request)
    {
        $userId = $request->userid;
        $otpvalinput = $request->otp;
        $userotp = Userotp::where('userId','=',$userId)->first(); 
        $otpval = $userotp->userotp;
        if ($otpvalinput == $otpval) {
            $objuserdetails         = userDetails::find($userId);   
            $objuserdetails->status  = '1';
            $objuserdetails->save();
           Session::flash('message','User Registration successful!');
            return redirect('/Register');
        }
        else
        {
            Session::flash('message','Otp is invalid!');
            return redirect('otpverification');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

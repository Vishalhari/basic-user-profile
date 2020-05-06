<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\userDetails;
use Session;

class ProfileController extends Controller
{
      /*checking user Authentication*/
    function __construct()
    {
        $this->middleware('auth');
    }


    public function userHome()
    {
        $id          = Auth::user()->id; 
       $data['userdata'] = User::where('id','=',$id)->first();
       return view('userhome',$data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id          = Auth::user()->id;  /* Logged user Id */ 
        $data['user'] = User::with(
        [
         'userdetails'  => function ($query) {
                           $query->select('id','userId as usersId','mail','dob','city','status');}
        ])->where('id','=',$id)
        ->first();
        return view('Profile',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'mail' => 'required|email',
            'dob' => 'required',
            'cty' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
             $id          = Auth::user()->id;  /* Logged user Id */ 
             $objuserdetails         = userDetails::find($id);   
             $objuserdetails->mail  = $request->mail;
             $objuserdetails->dob    = $request->dob;
             $objuserdetails->city   = $request->cty;
             $objuserdetails->save();
             Session::flash('message','successfully Updated User Profile!');
            return redirect('/profile');
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

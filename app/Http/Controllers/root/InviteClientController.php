<?php

namespace App\Http\Controllers\root;

use Illuminate\Http\Request;


use App\User;
use App\Http\Controllers\OtherFunctionsController;
use Mail; 
use DB;
use Validator;
use App\model\organization;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class InviteClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $org = DB::table('organizations')->get();
        $org = organization::all();
        return view('root.InviteClient', ['page' => 'invite client', 'organization' => $org]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $org = new organization();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'organization' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('inviteClient')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $name = $request->input('name');
            $orgname = $request->input('organization');
            $email = $request->input('email');

            $newCodeObj = new OtherFunctionsController();

            $confirmCode = $newCodeObj->getClientConfirmationCode();

            $data['name'] = $name;
            $data['org'] = $orgname;
            $data['email'] = $email;

            $data['domain_servername'] = url();
            $data['confirmCode'] = $confirmCode;

            $data['confirmationURL'] = url()."/client/register/".$confirmCode;

            $org->fullname = $data['name'];
            $org->org_name = $data['org'];
            $org->email = $data['email'];
            $org->email_confirmation_code = $data['confirmCode'];

            $org->save();

            Mail::send('emails.confirmation', ['user' => $data['name'], 'confirmation_url' => $data['confirmationURL']], function ($m) use ($data) {
            $m->to($data['email'], 'geran')->subject('Welcome to Bus Booking App: You are invited, It is Free!');
            });

            $thankyou_msg = 'Invitation sent. Thank you for inviting new Client.';

            return view('emails.thankyou', ['page' => 'client invitation', 'message' => $thankyou_msg]);
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

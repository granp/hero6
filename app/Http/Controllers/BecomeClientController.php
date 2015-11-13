<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User;
use App\Http\Controllers\OtherFunctionsController;
use Mail; 
use Validator;
use App\model\Organization;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use RegisterClientController;

class BecomeClientController extends Controller
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
        return view('becomeClient.becomeClient');
    }

    public function sendConfirmationLink($id){
        $org = new organization();

        $org_details = $org::where('id', $id)->first();

        $data['name'] = $org_details->fullname;
        $data['email'] = $org_details->email;
        $data['confirmCode'] = $org_details->email_confirmation_code;
        $data['domain_servername'] = url();
        $data['confirmationURL'] = url()."/client/register/".$data['confirmCode'];

        $success = Mail::send('emails.confirmation', ['user' => $data['name'], 'confirmation_url' => $data['confirmationURL']], function ($m) use ($data) {
            $m->to($data['email'], $data['name'])->subject('Confirm you account: Please click URL!');
            });

        return view('emails.thankyou',['page'=>'Email','message'=>'Confirmation Email Sent']);
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
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('becomeClient')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $name = $request->input('name');
            $orgname = $request->input('organization');
            $email = $request->input('email');
            $password = $request->input('password');

            $newCodeObj = new OtherFunctionsController();

            $confirmCode = $newCodeObj->getClientConfirmationCode();

            $data['name'] = $name;
            $data['org'] = $orgname;
            $data['email'] = $email;
            $data['password'] = $password;

            $data['domain_servername'] = url();
            $data['confirmCode'] = $confirmCode;

            $data['confirmationURL'] = url()."/client/register/".$confirmCode;

            $org->fullname = $data['name'];
            $org->org_name = $data['org'];
            $org->password = $data['password'];
            $org->email = $data['email'];
            $org->email_confirmation_code = $data['confirmCode'];
            $org->status_conf_code = 0;

            $org->save();

            Mail::send('emails.becomeClientThankYouEmail', ['user' => $data['name'], 'email' => $data['email'], 'password' => $data['password'], 'confirmation_url' => $data['confirmationURL']], function ($m) use ($data) {
            $m->to($data['email'], $data['name'])->subject('Welcome to Bus Booking App: Thank you for your interest!');
            });

            return view('becomeClient.thankyou');
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

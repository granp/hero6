<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Log;
use App\User;
use Auth;
use Validator;
use App\City;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CityController extends Controller
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
        $cities = DB::table('cities')->get();
        return view('pages.city.newcity', ['page' => 'add city','cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $city = new City();

        $validator = Validator::make($request->all(), [
            'cityname' => 'required|max:255',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('addcity')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $cityname = $request->input('cityname');
            $cityaddress = $request->input('address');
            
            $city->city = strtolower($cityname);
            $city->address = strtolower($cityaddress);
            $city->status = 0;

            $city->save();
            // $cities = DB::table('cities')->get();

            return view('pages.dashboard', ['page' => 'dashboard']);
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

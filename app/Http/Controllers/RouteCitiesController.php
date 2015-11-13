<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Log;
use App\User;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

class RouteCitiesController extends Controller
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

    public function showRoute()
    {
        $cities = DB::table('cities')->get();

        return view('pages.routes.newcourse', ['page' => 'new routes', 'cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = DB::table('cities')->get();
        $routes = DB::table('routes')->get();

        return view('pages.routencities', ['page' => 'routes', 'cities' => $cities, 'get_routes' => $routes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function storeRoute(Request $request)
    {
        $userEmail = Auth::user()->email;

        $validator = Validator::make($request->all(), [
            'route_name' => 'required',
            'origin'   => 'required',
            'destination' => 'required', 
            ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('addroute')
                        ->withErrors($validator)
                        ->withInput();
        }else{

            $origin = DB::table('cities')
                            ->select('city')
                            ->where('id', $request->input('origin'))
                            ->get();

            $destination = DB::table('cities')
                            ->select('city')
                            ->where('id', $request->input('destination'))
                            ->get();

            $route_name = strtolower($request->input('route_name'));
            $status = 1;

            // var_dump($origin);

            $insertRoute = DB::table('routes')->insertGetId(
                ['name' => $route_name,
                'origin' => $origin[0]->city,
                'destination' => $destination[0]->city,
                'status' => $status,
                ]
            );

        // return $location_from." ".$location_to;

            if($insertRoute){
                
                Log::info('New Route Inserted by '.$userEmail.': '.$route_name.'|'.$origin[0]->city.'>'.$destination[0]->city.'|'.$status);
                
                return redirect()
                    ->route('routes');
            }
        }
    }
}

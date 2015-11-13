<?php

namespace App\Http\Controllers;

use DB;
use Log;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Support\ServiceProvider;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $bustype = DB::table('bustype')->get();

        return view('pages.buses', ['page' => '','get_buses' => $bustype]);
    }

    public function showBusType()
    {
        $routes = DB::table('routes')->get();

        return view('pages.bus.bustype', ['page' => '', 'get_routes' => $routes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    public function storeBusType(Request $request){

        $userEmail = Auth::user()->email;

        //Custom Validation
        Validator::extend('dsrow', function($attribute, $value, $parameters) {
            if($value > 4)
                return true;
        });
        Validator::extend('routedefault', function($attribute, $value, $parameters) {
            return $value != 'default';
        });

        $validator = Validator::make($request->all(), [
            'bustypename' => 'required',
            'busSeatRow' => 'dsrow',
            'seatPrice' => 'required',
            'routetotravel' => 'routedefault'
            ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('addBusType')
                        ->withErrors($validator)
                        ->withInput();
        } else{
            $busTypeName = strtolower($request->input('bustypename'));
            $busSeatRow = strtolower($request->input('busSeatRow'));
            $deptre_date = date('Y-m-d', strtotime($request->input('deptre_date')));
            $d_time = date('H:i:s', strtotime($request->input('deptre_time'))); //convert time AM/PM to 24hours
            $arrival_date = date('Y-m-d', strtotime($request->input('arrival_date')));
            $a_time = date('H:i:s', strtotime($request->input('arrival_time')));//convert time AM/PM to 24hours
            $seatPrice = strtolower($request->input('seatPrice'));
            $routetotravel = strtolower($request->input('routetotravel'));
            $busSeatMapJson = $request->input('seatMapJson');

            $NewJson = new JsonController(); //create Object controller. See JsonController.php

            $jdata = $NewJson->getJsonFormat($busSeatMapJson); //call and assign object controller. see JsonController.php

            $merge_depture_datetime = $deptre_date." ".$d_time;
            $merge_arrival_datetime = $arrival_date." ".$a_time;

            $d_datetime = date('Y-m-d H:i:s', strtotime($merge_depture_datetime));
            $a_datetime = date('Y-m-d H:i:s', strtotime($merge_arrival_datetime));

            //insert to database
            $insertBusType = DB::table('bustype')->insertGetId(
                [
                    'bustype_name' => $busTypeName,
                    'seat_row' => $busSeatRow,
                    'departure_datetime' => $d_datetime,
                    'arrival_datetime' => $a_datetime,
                    'seat_price' => $seatPrice,
                    'route_id' => $routetotravel,
                    'seatmap_json' => $jdata,
                    'status' => 0,
                ]
            );

            if($insertBusType){
                // Log::info('New Route Inserted by '.$userEmail.': '.$bustype_name.'|'.$seat_row.'>'.$departure_datetime.'|'.$status);

                return redirect()->route('buses');
            }

            // return view('/welcome', ['page' => '', 'busTypeName' => $ss." <--time->".$d_time."|".$arrival_date]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

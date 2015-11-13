<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SeatBookingController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //get bustype info
        $busInfo = DB::table('bustype')
                    ->where('id', '=', $id)
                    ->get();

                    foreach ($busInfo as $key => $value) {
                        $depDT  = $value->departure_datetime;
                        $arrDT = $value->arrival_datetime;
                        $routeID = $value->route_id;
                        $busFare = $value->seat_price;
                    }

        $routeInfo = DB::table('routes')
                    ->where('id', '=', $routeID)
                    ->get();

                    foreach ($routeInfo as $key => $value) {
                        $origin = $value->origin;
                        $destination = $value->destination;
                    }


        $user_id = Auth::user()->id;

        $OFCObj = new OtherFunctionsController();
        $refnumber = $OFCObj->getReferenceNumber();
        $ticketnumber = $OFCObj->getTicketCode();

        $inputField_key = array();
        $inputData_arr = array();
        $passenger_arr = array();

        $reservedSeats = explode(",", $request->seatdatajs);
        $fields = array('fname', 'lname', 'birthday', 'adress', 'contact_no'); 
        $adminfee = 50;  
        $totalAdminFee = count($reservedSeats)*$adminfee; 
        $totalFare = 0;
        $totalPayment = 0;  

        foreach ($reservedSeats as $seatname) {
            foreach ($fields as $fieldName) {
                if($fieldName == 'birthday'){
                    $inputField_key[$fieldName] = date('Y-m-d', strtotime($request->input($seatname."_".$fieldName)));  
                }else{
                    $inputField_key[$fieldName] = $request->input($seatname."_".$fieldName);
                }
            }
            
            $inputField_key['user_id'] = $user_id;
            $inputField_key['seatname'] = $seatname;
            $inputField_key['busfare'] = $busFare;
            $inputField_key['reference_number'] = $OFCObj->getReferenceNumber();
            $totalFare += $busFare;

            array_push($inputData_arr, $inputField_key);
        }
        $totalPayment = $totalFare + $totalAdminFee;

            $passenger_arr['passenger'] = $inputData_arr;
            $passenger_arr['bustype_id'] = $id;
            $passenger_arr['deptDT'] = $depDT;
            $passenger_arr['origin'] = $origin;
            $passenger_arr['seat_count'] = count($reservedSeats);
            $passenger_arr['destination'] = $destination;
            $passenger_arr['invoice_no'] = $OFCObj->getTicketCode();
            $passenger_arr['invoiceDate'] = date('l jS M Y');
            $passenger_arr['totalFare'] = $totalFare;
            $passenger_arr['totalAdminFee'] = $totalAdminFee;
            $passenger_arr['totalPayment'] = $totalPayment;

            Session::push('psnger', $passenger_arr);

        return view('pages.checkout.checkout', ['page' => '','chckoutDataJson' => $passenger_arr]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Session::has('psnger')) {
              Session::forget('psnger'); //delete session variable
            }


        $data = DB::table('bustype')
                    ->where('id', $id)
                    ->get();

        /*get all reserved seats from the database*/
        $seatReserved = DB::table('bustickets')
                            ->select('seatname')
                            ->where('bustype_id', $id)
                            ->get();

        // convert to json
        $seatReserved = json_decode(json_encode($seatReserved),true);

        //initialized array to store the seat researved
        $ar = array();
        foreach ($seatReserved as $key => $value) {
            $notAvailableSeat = $value['seatname'];

            array_push($ar, $notAvailableSeat);
        }

        //get the coulumn seatmap_json from the $data and convert to json
        foreach ($data as $key => $value) {
            $jdata = json_decode($value->seatmap_json);
        }

        //encode and decode to jsoon the seatmap from the database
        $jdata2 = json_decode(json_encode($jdata),true);

        /*this will search for the reserved seat and set json variable 
        "seatAvailable" if already taken */
        for ($i=0; $i < count($jdata2); $i++) { 
            for ($j=1; $j <= count($jdata2[$i]); $j++) { 
                $seatname = $jdata2[$i]['col'.$j]['seatname'];

                $jdata2[$i]['col'.$j]['seatAvailable'] = $this->lookout($seatname, $ar);
            }
        }

        //encode a new json because we edit the json variable
        $jdata2 = json_encode($jdata2);

        return view('pages.book.seatBooking', ['page' => '', 'bustypeprofile_data'=>$data, 'seatmap_Reserved' => $jdata2]);
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

    public function getReferenceNumber(){



        return null;
    }

    public function lookout($args01, $args02){

        foreach ($args02 as $value) {
            if($args01 == $value){
                return "1";
            }
        }

        return "";
    }
}

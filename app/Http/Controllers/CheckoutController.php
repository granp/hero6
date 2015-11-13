<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump($id);
        $request->input("iradio");
        $passengerDetails = Session::get('psnger');

        if (Session::has('psnger')) {
              var_dump(Session::get('psnger'));
            }

        foreach ($passengerDetails as $key => $value) {

            $bustype_id = $value['bustype_id'];
            $deptDT = $value['deptDT'];
            $origin = $value['origin'];
            $seat_count = $value['seat_count'];
            $destination = $value['destination'];
            $invoice_no = $value['invoice_no'];
            $invoiceDate = $value['invoiceDate'];
            $totalFare = $value['totalFare'];
            $totalAdminFee = $value['totalAdminFee'];
            $totalPayment = $value['totalPayment'];

                foreach ($value['passenger'] as $key => $psnger) {
                    $fname = $psnger['fname'];
                    $lname = $psnger['lname'];
                    $birthday = $psnger['birthday'];
                    $address = $psnger['adress'];
                    $contact_no = $psnger['contact_no'];
                    
                    $user_id = $psnger['user_id'];
                    $seatname = $psnger['seatname'];
                    $busfare = $psnger['busfare'];
                    $reference_number = $psnger['reference_number'];
                    

                    $newTicket = DB::table('bustickets')->insertGetId([
                        'user_id' => $user_id,
                        'bustype_id' => $bustype_id,
                        'invoice_no' => $invoice_no,
                        'origin' => $origin,
                        'destination' => $destination,
                        'busfare' => $busfare,
                        'departure_datetime' => $deptDT,
                        'reference_no' => $reference_number,
                        'fname' => $fname,
                        'lname' => $lname,
                        'birthday' => $birthday,
                        'address' => $address,
                        'contact_no' => $contact_no,
                        'seatname' => $seatname,
                        ]);
                }
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

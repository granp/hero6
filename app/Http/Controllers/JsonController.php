<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class JsonController extends Controller
{
    
    public function getJSonFormat($json){

        $json_dec = json_decode($json, true);

        $return_arr = array();
        $row_array = array();

        foreach($json_dec as $key => $value){
            for ($i=1; $i <= count($value); $i++) {

                $child_row_array['seatname'] = $value['col'.$i];
                $child_row_array['seatprice'] = "";
                $child_row_array['avmobile'] = "";
                $child_row_array['seatAvailable'] = "";

                $row_array['col'.$i] = $child_row_array;
            }
            array_push($return_arr,$row_array);
        }

        return json_encode($return_arr);
    }
}

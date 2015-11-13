<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OtherFunctionsController extends Controller
{
    
    public function getReferenceNumber(){
        $unique_ref_length = 8;
        $possible_chars = "23456789BCDFGHJKMNPQRSTVWXYZ";  

        $unique_ref = "";
        $i = 0; 
        while ($i < $unique_ref_length) {
            // Pick a random character from the $possible_chars list  
            $char = substr($possible_chars, mt_rand(0, strlen($possible_chars)-1), 1); 
            $unique_ref .= $char; 

            $i++; 
        }

        return $unique_ref;
    }

    public function getTicketCode(){

      $unique =   FALSE;
      $length =   7;
      $chrDb  =   array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9');

      while (!$unique){

            $str = '';
            for ($count = 0; $count < $length; $count++){

                $chr = $chrDb[rand(0,count($chrDb)-1)];

                if (rand(0,1) == 0){
                   $chr = strtolower($chr);
                }
                if (3 == $count){
                   $str .= '-';
                }
                $str .= $chr;
            }

            /* check if unique */
            $existingCode = DB::table('book_details')->where('ticket_number', $str)->first();
            if (!$existingCode){
               $unique = TRUE;
            }

      }
      return $str;
  }

  public function getClientConfirmationCode(){

        $unique_ref_length = 16;
        $possible_chars = "23456789BCDFGHJKMNPQRSTVWXYZ";  

        $unique_ref = "";
        $i = 0; 
        while ($i < $unique_ref_length) {
            // Pick a random character from the $possible_chars list  
            $char = substr($possible_chars, mt_rand(0, strlen($possible_chars)-1), 1); 
            $unique_ref .= $char; 

            $i++; 
        }

        return $unique_ref;
    }

}

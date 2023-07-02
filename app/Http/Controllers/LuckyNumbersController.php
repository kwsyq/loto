<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

use App\Mail\LuckyNumbers;
use \App\Helpers\LuckyNumbersHelper;
use \App\Models\Customer;


class LuckyNumbersController extends Controller
{
    //
    public function lucky_numbers()
    {
        $numbers=LuckyNumbersHelper::lucky_numbers();

        return json_encode($numbers);
    }

    public function send_email()
    {
        $output="";
        $cust=Customer::all();
        foreach($cust as $c){
            if($c->active){
                $numbers=LuckyNumbersHelper::lucky_numbers();
                Mail::to($c->email)->send(new LuckyNumbers($numbers, $c->name));
                $c->emails()->create(['sent_numbers'=>LuckyNumbersHelper::format_lucky_numbers($numbers)]);
            }
        }
    }


}

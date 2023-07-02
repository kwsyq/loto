<?php

namespace App\Jobs;
use Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use \App\Mail\LuckyNumbers;
use \App\Helpers\LuckyNumbersHelper;
use \App\Models\Customer;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $cust=Customer::all();
        foreach($cust as $c){
            if($c->active){
                $numbers=LuckyNumbersHelper::lucky_numbers();
                try {
                   Mail::to($c->email)->send(new LuckyNumbers($numbers, $c->name));
                } catch(Exception $ex){
                    Log::error($ex);
                }
                $c->emails()->create(['sent_numbers'=>LuckyNumbersHelper::format_lucky_numbers($numbers)]);
            }
        }
    }
}

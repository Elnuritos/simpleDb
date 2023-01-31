<?php

namespace App\Console\Commands;

use DateTime;
use Carbon\Carbon;
use App\Models\Users;
use App\Models\Groups;
use App\Mail\MyTestMail;
use App\Models\GroupUser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CheckExp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:check_expiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $date1 = new DateTime("now");
        
        $t= GroupUser::where('expired_at','>',$date1)->get();
        foreach ($t as $key => $value) {
            $user_name=Users::where('id',$value->user_id)->value('name');
            $user_email=Users::where('id',$value->user_id)->value('email');
            $group_name=Groups::where('id',$value->group_id)->value('name');
            $data = array('name'=>$user_name,'email'=>$user_email);
         $text="Здравствуйте" .$user_name."! Истекло время вашего участия в группе ".$group_name;
         $details = [

            'title' => 'Mail from Elnur Safarov',
    
            'body' => $text
    
        ];
    
       
    
        Mail::to($user_email)->send(new MyTestMail($details));
    
        $value->delete();
        }
        
            
         
    }
}

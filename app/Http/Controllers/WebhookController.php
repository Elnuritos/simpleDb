<?php

namespace App\Http\Controllers;



use App\Models\Groups;

use App\Http\Controllers\Controller;
use App\Models\GroupUser;
use App\Models\Users;
use Carbon\Carbon;

class WebhookController extends Controller
{
    
    public function tre()
    {
        
        GroupUser::create([
            'user_id'=>1,
            'group_id'=>2,
            'expired_at'=>Carbon::now()
        ]);
        dd(GroupUser::all());
    }
    public function removeupdate()
    {
    }
}

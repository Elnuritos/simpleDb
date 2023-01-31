<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Users;
use App\Models\GroupUser;
use Illuminate\Console\Command;

class AddUserToGroup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:member';

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
        $user_id = $this->ask('Enter the user_id');
        $group_id = $this->ask('Enter the group_id');
        GroupUser::create([
            'user_id'=>$user_id,
            'group_id'=>$group_id,
            'expired_at'=>Carbon::now()
        ]);
        if (Users::where('id',$user_id)->value('active')!=1) {
            Users::where('id',$user_id)->update(['active'=>1]);
        }
    }
}

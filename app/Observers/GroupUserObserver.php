<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\Groups;
use App\Models\GroupUser;
use PHPUnit\TextUI\XmlConfiguration\Group;

class GroupUserObserver
{
    /**
     * Handle the GroupUser "created" event.
     *
     * @param  \App\Models\GroupUser  $groupUser
     * @return void
     */
    public function creating(GroupUser $groupUser)
    {
        
        $time=Groups::where('id', $groupUser->group_id)->value('expire_hours');
        $date = Carbon::parse($groupUser->expired_at)->addHour($time);
        $groupUser->expired_at=$date;
        
    }

    /**
     * Handle the GroupUser "updated" event.
     *
     * @param  \App\Models\GroupUser  $groupUser
     * @return void
     */
    public function updated(GroupUser $groupUser)
    {
        //
    }

    /**
     * Handle the GroupUser "deleted" event.
     *
     * @param  \App\Models\GroupUser  $groupUser
     * @return void
     */
    public function deleted(GroupUser $groupUser)
    {
        //
    }

    /**
     * Handle the GroupUser "restored" event.
     *
     * @param  \App\Models\GroupUser  $groupUser
     * @return void
     */
    public function restored(GroupUser $groupUser)
    {
        //
    }

    /**
     * Handle the GroupUser "force deleted" event.
     *
     * @param  \App\Models\GroupUser  $groupUser
     * @return void
     */
    public function forceDeleted(GroupUser $groupUser)
    {
        //
    }
}

<?php

namespace Database\Seeders;

use App\Models\Groups;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Groups::create([
            'name'=>'Группа1',
            'expire_hours'=>1, 
        ]);
        Groups::create([
            'name'=>'Группа2',
            'expire_hours'=>2, 
        ]);
    }
}

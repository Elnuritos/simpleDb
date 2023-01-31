<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::create([
            'name'=>'Иванов',
            'email'=>'info@datainlife.ru', 
        ]);
        Users::create([
            'name'=>'Петров',
            'email'=>'job@datainlife.ru', 
        ]);
    }
}

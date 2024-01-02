<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
        'name'=>'Admin',
        'email'=>'genushealthcaresolution@gmail.com',
        'role'=>1,
        'password'=>Hash::make('admin@123'),
        ]);
    
    }
}

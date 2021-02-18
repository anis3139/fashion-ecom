<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'anis',
            'email'=>'anis904692@gmail.com',
            'email_verified_at' => now(),
            'password'=>bcrypt('ANIs9434278'),
            'remember_token' => Str::random(10)
        ]);
    }
}

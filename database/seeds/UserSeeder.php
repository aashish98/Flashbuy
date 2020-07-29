<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Crypt;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run(){
        $admin = DB::table('users')->where('email', '=', 'admin@test.com')->first();

        if ($admin === null) {
            // user doesn't exist
            $user = User::create([

                'fname' => 'ankit',
            'lname' => 'khantwal',
            'username' => 'admin',
            'role'  => 'admin',
            'email' => 'admin@test.com',
            'phone' => '1223344556',
            'birthdate'=>'1990-07-09',
            'password'=>$password,
            ]);
         }
    }
    
}

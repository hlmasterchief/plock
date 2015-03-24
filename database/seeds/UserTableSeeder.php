<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->delete();

        $user = new App\User();
        $user->username = "test";
        $user->email = "test@gmail.com";
        $user->password = bcrypt("test");
        $user->save();
    }

}

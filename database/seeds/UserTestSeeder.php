<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTestSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->delete();

        $user = new App\User();
        $user->slugname = "test";
        $user->email = "test@gmail.com";
        $user->password = bcrypt("test");
        $user->save();
    }

}

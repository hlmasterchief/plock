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
        $user = new App\Models\User();
        $user->username = "test";
        $user->email = "test@gmail.com";
        $user->password = bcrypt("test");
        $user->save();
    }

}

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

        $user = new App\Models\User();
        $user->username = "test";
        $user->email = "test@gmail.com";
        $user->password = bcrypt("test");
        $user->save();

        $profile = new App\Models\Profile();
        $user->profile()->save($profile);

        $user = new App\Models\User();
        $user->username = "test2";
        $user->email = "test2@gmail.com";
        $user->password = bcrypt("test");
        $user->save();

        $profile = new App\Models\Profile();
        $user->profile()->save($profile);

        $user = new App\Models\User();
        $user->username = "test3";
        $user->email = "test3@gmail.com";
        $user->password = bcrypt("test");
        $user->save();

        $profile = new App\Models\Profile();
        $user->profile()->save($profile);

        $user = new App\Models\User();
        $user->username = "test4";
        $user->email = "test4@gmail.com";
        $user->password = bcrypt("test");
        $user->save();

        $profile = new App\Models\Profile();
        $user->profile()->save($profile);
    }

}

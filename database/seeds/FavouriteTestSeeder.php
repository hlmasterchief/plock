<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FavouriteTestSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('movies')->delete();
        DB::table('favourites')->delete();

        $favourite = new App\Models\Favourite();
        $favourite->name = "The Godfather";
        $favourite->type = "movies";
        $favourite->save();

        $movie = new App\Models\Movie();
        $movie->plot = "The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.";
        $movie->release_date = "1972-03-24";
        $favourite->data()->save($movie);

        $favourite->data->save();


        $favourite = new App\Models\Favourite();
        $favourite->name = "The Dark Knight";
        $favourite->type = "movies";
        $favourite->save();

        $movie = new App\Models\Movie();
        $movie->plot = "When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, the caped crusader must come to terms with one of the greatest psychological tests of his ability to fight injustice.";
        $movie->release_date = "2008-06-18";
        $favourite->data()->save($movie);

        $favourite->data->save();
    }

}

<?php

class FavouriteFuncTest extends TestCase {

    public function setUp() {
        parent::setUp();
    }

    /**
     * @test
     */
    public function it_has_to_create_successfully_a_movie() {
        $movie = new App\Models\Movie();

        $credentials = [
            'name'          =>  'Frozen',
            'type'          =>  'movies',
            'plot'          =>  "When the newly crowned Queen Elsa accidentally uses her power to turn things into ice to curse her".
                                " home in infinite winter, her sister, Anna, teams up with a mountain man, his playful reindeer,".
                                " and a snowman to change the weather condition.",
            'release_date'  =>  "2013-11-27"
        ];

        $this->action('POST', 'FavouriteController@postCreate', [], $credentials);
        $this->assertNotNull($movie->all()->first());
    }

    /**
     * @test
     */
    public function it_has_to_search_successfully_a_movie() {
        $credentials = [
            'name' =>  'Dark',
            'type' =>  'movies',
        ];

        $response = $this->action('POST', 'FavouriteController@postSearch', [], $credentials);
        $this->assertViewHas('favourites');
    }

}
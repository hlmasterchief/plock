<?php namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\BookmarkRepositoryInterface;

class BookmarkRepository implements BookmarkRepositoryInterface {

    /**
     * Inject Bookmark eloquent
     * @param \App\Models\Bookmark $bookmark
     */
    public function __construct(\App\Models\Bookmark $bookmark) {
        $this->bookmark = $bookmark;
    }

    /**
     * Get Bookmark by Id
     * @param  int $id
     * @return App\Models\Bookmark
     */
    public function find($id) {
        return $this->bookmark->find($id);
    }

    /**
     * Store Bookmark in Database
     * @param  array  $modifiers
     * @return App\Models\Bookmark
     */
    public function create($user_id, array $modifiers) {
        // $data = array_only($modifiers, ['favourite_id', 'description']);

        if (!isset($modifiers['favourite_id']) || is_null(\App\Models\Favourite::find($modifiers['favourite_id']))) {
            $favourite = new \App\Models\Favourite;
            $favourite->name = $modifiers['name'];
            $favourite->type = $modifiers['type'];
            $favourite->save();

            $movies = new \App\Models\Movie;
            $movies->genre = $modifiers['genre'];
            $movies->country = $modifiers['country'];
            $movies->director = $modifiers['director'];
            $movies->plot = $modifiers['description'];
            $movies->year = $modifiers['year'];
            $movies->favourite_id = $favourite->id;
            $movies->save();

            $favourite_id = $favourite->id;
        } else {
            $favourite_id = $modifiers['favourite_id'];
        }

        $data = array_only($modifiers, ['review']);
        $bookmark = $this->bookmark->create($data);
        $bookmark->favourite_id = $favourite_id;
        $bookmark->user_id = $user_id;
        $bookmark->description = $modifiers['review'];
        $bookmark->save();

        return $bookmark;
    }

    /**
     * Update Favourite image in Database
     * @param  object  $modifiers
     * @return App\Models\Favourite
     */
    public function updateImage($id, $modifiers) {
        $favourite = $this->find($id)->favourite;

        $destination = public_path() . "/img/favourite";
        $filename    = md5(time());
        $random      = rand(11111,99999);
        $extension   = $modifiers->getClientOriginalExtension();

        $modifiers->move($destination, $filename.$random.".".$extension);

        $favourite->image = "/img/favourite/".$filename.$random.".".$extension;

        $favourite->save();

        return $favourite;
    }

    /**
     * Update Bookmark in Database
     * @param  array  $modifiers
     * @return App\Models\Bookmark
     */
    public function update($id, array $modifiers) {
        $bookmark = $this->find($id);

        if ($modifiers['description']) {
            $bookmark->description = $modifiers['description'];
        }

        $bookmark->save();

        return $bookmark;
    }

    /**
     * Delete Bookmark in Database
     * @param  array  $modifiers
     * @return App\Models\Bookmark
     */
    public function delete($id) {
        $bookmark = $this->find($id);

        return $bookmark->delete();
    }

    /**
     * Save Bookmark in Database
     * @param  array  $modifiers
     * @return App\Models\Bookmark
     */
    public function save($id, $user_id, array $modifiers) {
        $bookmark = $this->find($id);

        $clone = new \App\Models\Bookmark;

        $clone->description = $modifiers['description'];
        $clone->favourite_id = $bookmark->first()->favourite_id;
        $clone->user_id = $user_id;

        if (empty($modifiers['newbox'])) {
            $clone->box_id = $modifiers['box_new_id'];
        }
        else {
            $newbox = new \App\Models\Box;
            $newbox->title = $modifiers['newbox'];
            $newbox->user_id = $user_id;
            $newbox->save();

            $clone->box_id = $newbox->id;
        }

        $clone->save();

        return $clone;
    }
}
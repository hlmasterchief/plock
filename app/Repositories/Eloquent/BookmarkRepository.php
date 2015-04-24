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
        $data = array_only($modifiers, ['favourite_id', 'description']);

        $bookmark = $this->bookmark->create($data);
        $bookmark->user_id = $user_id;
        $bookmark->save();

        return $bookmark;
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
}
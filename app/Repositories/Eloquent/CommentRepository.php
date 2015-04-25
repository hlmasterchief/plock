<?php namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface {

    /**
     * Inject Comment eloquent
     * @param \App\Models\Comment $comment
     */
    public function __construct(\App\Models\Comment $comment,
                                \App\Models\User $user,
                                \App\Models\Bookmark $bookmark) {
        $this->comment = $comment;
        $this->user = $user;
        $this->bookmark = $bookmark;
    }

    /**
     * Get Comment by Id
     * @param  int $id
     * @return App\Models\Comment
     */
    public function find($id) {
        return $this->comment->find($id);
    }

    /**
     * Store Comment in Database
     * @param  array  $modifiers
     * @return App\Models\Comment
     */
    public function create($user_id, array $modifiers) {
        $data = array_only($modifiers, ['content']);

        $user     = $this->user->find($user_id);
        $bookmark = $this->bookmark->find($modifiers['bookmark_id']);

        $comment = $this->comment->create($data);
        $comment->user()->associate($user);
        $comment->bookmark()->associate($bookmark);

        $comment->save();

        return $comment;
    }

    /**
     * Update Comment in Database
     * @param  array  $modifiers
     * @return App\Models\Comment
     */
    public function update($id, array $modifiers) {
        $comment = $this->find($id);

        if ($modifiers['content']) {
            $comment->content = $modifiers['content'];
        }

        $comment->save();

        return $comment;
    }

    /**
     * Delete Comment in Database
     * @param  array  $modifiers
     * @return App\Models\Comment
     */
    public function delete($id) {
        $comment = $this->find($id);

        return $comment->delete();
    }
}
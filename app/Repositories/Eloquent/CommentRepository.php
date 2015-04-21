<?php namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface {

    /**
     * Inject Comment eloquent
     * @param \App\Models\Comment $comment
     */
    public function __construct(\App\Models\Comment $comment) {
        $this->comment = $comment;
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
        $data = array_only($modifiers, ['bookmark_id', 'content']);

        $comment = $this->comment->create($data);
        $comment->user_id = $user_id;
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
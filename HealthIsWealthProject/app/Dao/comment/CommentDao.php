<?php

namespace App\Dao\comment;

use App\Models\Comment;
use App\Contracts\Dao\comment\CommentDaoInterface;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;

/**
 * Data accessing object for customer
 */
class CommentDao implements CommentDaoInterface
{
    /**
     * get data from comment
     * @return View comment
     */
    public function getComment()
    {
        $comment = new Comment;
        $comment->content = request()->content;
        $comment->post_id = request()->post_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();
        return $comment;
    }

    /**
     * To delete commnent by id
     * @param string $id comment id
     * @param string $deletedUserId deleted commnet id
     * @return string $message message for success or not
     */
    public function deleteComment($id)
    {
        return Comment::find($id);
    }
}

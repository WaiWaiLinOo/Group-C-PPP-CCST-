<?php

namespace App\Contracts\Dao\comment;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of comment
 */
interface CommentDaoInterface
{
    /**
     * get data from comment
     * @return View comment
     */
    public function getComment();

    /**
     * To delete commnent by id
     * @param string $id comment id
     * @param string $deletedUserId deleted commnet id
     * @return string $message message for success or not
     */
    public function deleteComment($id);
}

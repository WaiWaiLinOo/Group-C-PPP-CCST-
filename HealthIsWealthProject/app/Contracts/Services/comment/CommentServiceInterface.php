<?php

namespace App\Contracts\Services\comment;

/**
 * Interface for comment service
 */
interface CommentServiceInterface
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

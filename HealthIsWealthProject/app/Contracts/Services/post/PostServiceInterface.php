<?php

namespace App\Contracts\Services\post;

/**
 * Interface for post service
 */
interface PostServiceInterface
{
    /**
     * get data from database
     * @return View getdata
     */
    public function getPost();

    /**
     * store user
     * @return View getdata
     */
    public function storePost($request);

     /**
     * To delete post by id
     * @param string $id post id
     * @param string $deletedPostId
     * @return string $message message for success or not
     */
    public function deletePost($id);
}

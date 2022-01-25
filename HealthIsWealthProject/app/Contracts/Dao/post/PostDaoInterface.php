<?php

namespace App\Contracts\Dao\post;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of post
 */
interface PostDaoInterface
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
     * show the form  for post edit
     * @param $id
     */
    public function editPost($id);

    /**
     * update the form  for post
     * @param $request
     * @param $id
     */
    public function updatePost($request, $id);

    /**
     * delete the form  for post
     * @param $request
     * @param $id
     */
    public function deletePost($post);

    /**
     * To get post list for excel export
     */
    public function exportPostList();
}

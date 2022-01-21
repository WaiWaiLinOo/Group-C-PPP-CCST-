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
    * show the form  for post edit
    * @param $id
    */
    public function editPost($id);

    /**
    *  update the form  for post
    * @param $request
    * @param $id
    */
    public function updatePost($request,$id);
}

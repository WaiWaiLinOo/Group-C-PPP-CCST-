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

    /*post delete*/
    public function deletePost($id);
}

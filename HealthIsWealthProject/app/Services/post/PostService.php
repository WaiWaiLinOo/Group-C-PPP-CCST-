<?php

namespace App\Services\post;

use App\Contracts\Dao\post\PostDaoInterface;
use App\Contracts\Services\post\PostServiceInterface;

/**
 * Service class for post.
 */
class PostService implements PostServiceInterface
{

    /*
     * post dao
     */
    private $postDao;

    /**
     * Class Constructor
     * @param postDaoInterface
     * @return
     */
    public function __construct(PostDaoInterface $postDao)
    {
        $this->postDao = $postDao;
    }

    /**
     * to get data from database
     *
     * @return View getdata from database
     */
    public function getPost()
    {
        return $this->postDao->getPost();
    }

    /**
     * store user
     * @return View getdata
     */
    public function storePost($request)
    {
        return $this->postDao->storePost($request);
    }
    /**
     * To delete post by id
     * @param string $id post id
     * @param string $deletedPostId
     * @return string $message message for success or not
     */
    public function deletePost($id)
    {
        return $this->postDao->deletePost($id);
    }

    /**
     *  update the form  for post
     * @param $request
     * @param $id
     * @return object
     */
    public function updatePost($request, $id)
    {
        return $this->postDao->updatePost($request, $id);
    }
    /**
     *  Show the form  for post edit
     * @param $id
     * @return object
     */
    public function editPost($id)
    {
        return $this->postDao->editPost($id);
    }
}

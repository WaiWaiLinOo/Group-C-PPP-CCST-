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
    public function storePost($request){
        return $this->postDao->storePost($request); 
    }
        
}
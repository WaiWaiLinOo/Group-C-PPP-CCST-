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
}
<?php

namespace App\Services\comment;

use App\Contracts\Dao\comment\CommentDaoInterface;
use App\Contracts\Services\comment\CommentServiceInterface;

/**
 * Service class for customer.
 */
class CommentService implements CommentServiceInterface
{

    /*
     * customer dao
     */
    private $commentDao;

    /**
     * Class Constructor
     * @param customerDaoInterface
     * @return
     */
    public function __construct(CommentDaoInterface $commentDao)
    {
        $this->commentDao = $commentDao;
    }

    /**
     * get data from comment
     * @return View comment
     */
    public function getComment()
    {
        return $this->commentDao->getComment();
    }

    /**
     * To delete commnent by id
     * @param string $id comment id
     * @param string $deletedUserId deleted commnet id
     * @return string $message message for success or not
     */
    public function deleteComment($id)
    {
        return $this->commentDao->deleteComment($id);
    }
}

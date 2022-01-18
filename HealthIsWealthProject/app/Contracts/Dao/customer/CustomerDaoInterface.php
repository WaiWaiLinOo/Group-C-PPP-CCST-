<?php

namespace App\Contracts\Dao\customer;

/**
 * Interface for Data Accessing Object of customer
 */
interface CustomerDaoInterface
{
    /**
     * To delete user by id
     * @param string $id user id
     * @param string $deletedUserId deleted user id
     * @return string $message message for success or not
     */
    public function deleteUser($id);
    
    /**
     * to get data from database
     *
     * @return View get data from databse
     */
    public function getUser();
}

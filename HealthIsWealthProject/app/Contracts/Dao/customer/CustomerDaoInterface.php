<?php

namespace App\Contracts\Dao\customer;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of customer
 */
interface CustomerDaoInterface
{
      
    /**
     * to get data from database
     *
     * @return View get data from databse
     */
    public function getUser();

    /**
     * To show user in user edit form
     *@param $id
     */
    public function userEditView($id);

    /**
     * To update user role
     *@param $id
     *@param $request
     */
    public function userRoleUpdate($request, $id);
    /**
     * To delete user by id
     * @param string $id user id
     * @param string $deletedUserId deleted user id
     * @return string $message message for success or not
     */
    public function deleteUser($id);
  
}

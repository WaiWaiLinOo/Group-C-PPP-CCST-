<?php

namespace App\Dao\customer;

use App\Models\User;
use App\Contracts\Dao\customer\CustomerDaoInterface;

/**
 * Data accessing object for customer
 */
class CustomerDao implements CustomerDaoInterface
{

    /**
     * to get data from database
     *
     * @return View get data
     */
    public function getUser()
    {
        return User::all();
    }
    
    /**
     * To show user in user edit form
     *@param $id
     *@return object
     */
    public function userEditView($id)
    {
        $user = User::find($id);
        return $user;
    }

    /**
     * To update user role
     *@param $id
     *@param $request
     * @return 
     */
    public function userRoleUpdate($request, $id)
    {
        return 'Role Update Successfully!';
    }

    /**
     * To delete user by id
     * @param string $id user id
     * @param string $deletedUserId deleted user id
     * @return string $message message for success or not
     */
    public function deleteUser($id)
    {
        return User::find($id)->delete();
    }
}

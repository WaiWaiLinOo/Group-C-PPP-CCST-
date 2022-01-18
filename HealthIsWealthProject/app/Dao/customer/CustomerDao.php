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
}

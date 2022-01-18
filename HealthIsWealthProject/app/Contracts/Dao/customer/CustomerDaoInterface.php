<?php

namespace App\Contracts\Dao\customer;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of customer
 */
interface CustomerDaoInterface
{

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
}

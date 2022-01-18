<?php

namespace App\Contracts\Services\customer;


/**
 * Interface for customer service
 */
interface CustomerServiceInterface
{

    /**
     * get data from database
     * @return View getdata
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

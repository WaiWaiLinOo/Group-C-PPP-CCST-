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
    public function getUser($request);

    /**
     * store user
     * @return View getdata
     */
    public function storeUser($request);

    /**
     * get data from role
     * @return View role
     */
    public function getRole();

    /**
     * get data from customer id
     * @return View customer
     */
    public function getUserId($id);

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
     * To update user profile
     *@param $id
     *@param $request
     */
    public function profileUpdate($request, $id);

    /**
     * To delete user by id
     * @param string $id user id
     * @param string $deletedUserId deleted user id
     * @return string $message message for success or not
     */
    public function deleteUser($id);

    public function exportPDF();
}

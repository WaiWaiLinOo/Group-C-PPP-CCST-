<?php

namespace App\Contracts\Services\customer;

use Illuminate\Http\Request;

/**
 * Interface for customer service
 */
interface CustomerServiceInterface
{

    /**
     * get data from database
     * @return View getdata
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

    /**
     * To send email to specified email
     * 
     * @param Request $request request with inputs
     * @return bool
     */
    public function sendMail(Request $request);
    /**
     * To search user
     * @return string $message message for success or not
     */
    public function searchUser(Request $request);

    /**
     * To export pdf
     * @return string $message message for success or not
     */
    public function exportPDF();
}

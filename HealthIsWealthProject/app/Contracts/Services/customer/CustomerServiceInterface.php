<?php

namespace App\Contracts\Services\customer;

use Illuminate\Http\Request;

/**
 * Interface for customer service
 */
interface CustomerServiceInterface
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

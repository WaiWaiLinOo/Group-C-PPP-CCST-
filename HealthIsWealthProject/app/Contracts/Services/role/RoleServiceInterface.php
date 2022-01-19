<?php

namespace App\Contracts\Services\role;


/**
 * Interface for role service
 */
interface RoleServiceInterface
{
    /**
     * To show role
     *@param $request
     */
    public function getRole($request);

     /**
     * To show role id
     *@param $request
     */
    public function getRoleId($id);
}

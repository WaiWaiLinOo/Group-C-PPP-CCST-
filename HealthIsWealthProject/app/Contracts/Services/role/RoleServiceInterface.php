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
      /**
     * To delete role by id
     * @param string $id role id
     * @param string $deletedRoleId
     * @return string $message message for success or not
     */
    public function deleteRole($id);
}

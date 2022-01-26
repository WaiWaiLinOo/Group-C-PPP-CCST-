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
     * To get permission
     */
    public function getPermission();

    /**
     * To store role
     *@param $request
     */
    public function storeRole($request);

    /**
     * To show role id
     *@param $request
     */
    public function getRoleId($id);

    /**
     * To edit role
     *@param $id
     */
    public function editRole($id);

    /**
     * To update role
     *@param $request
     *@param $id
     */
    public function updateRole($request, $id);

    /**
     * To delete role by id
     * @param string $id role id
     * @param string $deletedRoleId
     * @return string $message message for success or not
     */
    public function deleteRole($id);
}

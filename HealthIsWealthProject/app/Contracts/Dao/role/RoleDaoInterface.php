<?php

namespace App\Contracts\Dao\role;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of role
 */
interface RoleDaoInterface
{
    /**
     * To show role
     *@param $request
     */
    public function getRole($request);

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
     * To delete role by id
     * @param string $id role id
     * @param string $deletedRoleId
     * @return string $message message for success or not
     */
    public function deleteRole($id);
}

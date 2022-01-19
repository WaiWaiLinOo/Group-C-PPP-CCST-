<?php

namespace App\Dao\role;

use App\Models\User;
use App\Contracts\Dao\role\RoleDaoInterface;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

/**
 * Data accessing object for role
 */
class RoleDao implements RoleDaoInterface
{
    /**
     * to get data from database
     *
     * @return View get data
     */
    public function getRole($request)
    {
        return Role::orderBy('id', 'DESC')->paginate(5);
    }

    /**
     * To store role
     *@param $request
     */
    public function storeRole($request)
    {
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return $role;
    }

    /**
     * to get data from database
     *
     * @return View get roleId
     */
    public function getRoleId($id)
    {
        return Role::find($id);
    }

    /**
     * To delete role
     * @return Object delete Role
     */
    public function deleteRole($id)
    {
        return Role::find($id)->delete();
    }
}

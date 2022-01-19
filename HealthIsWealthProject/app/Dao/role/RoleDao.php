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
     * to get data from database
     *
     * @return View get roleId
     */
    public function getRoleId($id)
    {
        return Role::find($id);
        //$role = Role::find($id);
        //$rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
        //->where("role_has_permissions.role_id",$id)
        //->get();
    }
}

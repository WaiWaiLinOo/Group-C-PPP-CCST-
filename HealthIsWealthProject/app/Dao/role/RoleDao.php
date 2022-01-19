<?php

namespace App\Dao\role;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Contracts\Dao\role\RoleDaoInterface;

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
     * To get permission
     * @return object
     */
    public function getPermission(){
        return Permission::get();
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
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();
        return ['role' => $role,'rolePermissions' => $rolePermissions ];
    }

    /**
     * To edit role
     *@param $id
    */
    public function editRole($id){
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return ['role' => $role,'permission' => $permission,'rolePermission' => $rolePermissions];
    }
    
    /**
     * To update role
     *@param $request
     */
    public function updateRole($request,$id){
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));

        return 'Role updated successfully';
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

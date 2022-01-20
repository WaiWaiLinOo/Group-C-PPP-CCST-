<?php

namespace App\Dao\customer;

use App\Models\User;
use App\Contracts\Dao\customer\CustomerDaoInterface;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;

/**
 * Data accessing object for customer
 */
class CustomerDao implements CustomerDaoInterface
{

    /**
     * to get data from database
     *
     * @return View get data
     */
    public function getUser($request)
    {
        return User::orderBy('id', 'DESC')->paginate(5);
    }

    /**
     * to get data from role
     *
     * @return View get role all
     */
    public function getRole()
    {
        return Role::pluck('name', 'name')->all();
    }

    /**
     * to get data from customerId
     *
     * @return View get id
     */
    public function getUserId($id)
    {
        return User::find($id);
    }

    /**
     * to store from customerId
     *
     * @return View 
     */
    public function storeUser($request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return $user;
    }

    /**
     * to edit data and show updated
     * @return object
     */
    public function userEditView($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return ['user' => $user,'roles' => $roles,'userRole' => $userRole];
    }

    /**
     * To update user role
     *@param $id
     *@param $request
     * @return
     */
    public function userRoleUpdate($request, $id)
    {   

        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        
        return 'Role Update Successfully!';
    }

    /**
     * @param string $id user id
     * @param string $deletedUserId deleted user id
     */
    public function deleteUser($id)
    {
        return User::find($id)->delete();
    }
}

<?php

namespace App\Dao\customer;

use DB;
use Hash;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Contracts\Dao\customer\CustomerDaoInterface;

/**
 * Data accessing object for customer
 */
class CustomerDao implements CustomerDaoInterface
{

    /**
     * to get data from database
     * @return View get data
     */
    public function getUser($request)
    {
        return User::orderBy('id', 'DESC')->paginate(5);
    }

    /**
     * to get data from role
     * @return View get role all
     */
    public function getRole()
    {
        return Role::pluck('name', 'name')->all();
    }

    /**
     * to get data from customerId
     * @return View get id
     */
    public function getUserId($id)
    {
        return User::find($id);
    }

    /**
     * to store from customerId
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
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return ['user' => $user, 'roles' => $roles, 'userRole' => $userRole];
    }

    /**
     * To update user role
     * @param $id
     * @param $request
     * @return
     */
    public function userRoleUpdate($request, $id)
    {
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        }
        else {
            $input = Arr::except($input, array('password'));
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return 'Role Update Successfully!';
    }

    /**
     * To update user profile
     * @param $id
     * @param $request
     */
    public function profileUpdate($request, $id)
    {

        $user = User::find($id);
        if ($profile = $request->file('profile')) {
            $name = time() . '.' . $request->file('profile')->clientExtension();
            $request->file('profile')->move('userProfile', $name);
            $user->profile = $name;
        }

        if ($certificate = $request->file('certificate')) {
            $certificate = time() . '.' . $request->file('certificate')->clientExtension();
            $request->file('certificate')->move('userCertificate', $certificate);
            $user->certificate = $certificate;
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->dob = $request->input('dob');
        $user->address = $request->input('address');
        $user->update();
        return 'Profile Update Successfully!';
    }

    /**
     * @param string $id user id
     * @param string $deletedUserId deleted user id
     */
    public function deleteUser($id)
    {
        return User::find($id)->delete();
    }
    /**
     * search user
     * @param string $request
     */
    public function searchUser(Request $request)
    {
        $name = $request->name;
        $start_date = $request->s_name;
        $end_date = $request->e_date;

        //$user = DB::table('users')
        //    ->select('users.*');

        //if ($name) {
        //    $user->where('students.name', 'LIKE', '%' . $name . '%');
        //}
        //if ($start_date) {
        //    $user->where('students.created_at', 'LIKE', '%' . $start_date . '%');
        //}
        //if ($end_date) {
        //    $user->where('students.updated_at', 'LIKE', '%' . $end_date . '%');
        //}
        //return $user->get();
    }

}

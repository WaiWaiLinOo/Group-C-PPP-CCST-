<?php

namespace App\Dao\customer;


use Hash;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Contracts\Dao\customer\CustomerDaoInterface;
use PDF;

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
        return DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.name')
            ->whereNull('users.deleted_at')
            ->select('users.*', 'roles.name')
            ->get();
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
        $user = new User;
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->password = Hash::make($request['password']);
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->role_id =  $request->roles;
        $user->save();
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
        $user = User::find($id);
        $user->role_id =  $request->roles;
        $user->update();
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
        if ($request->file()) {
            $filename = time() . '.' . $request->profile->clientExtension();
            $filePath = $request->file('profile')->storeAs('userProfile', $filename, 'public');
            $path = 'storage/' . $filePath;
            $user->profile = $path;
        }
        if ($certificate = $request->file('certificate')) {
            $certificate = time() . '.' . $request->file('certificate')->clientExtension();
            $filePath = $request->file('certificate')->storeAs('userCertificate', $certificate, 'public');
            $path = 'storage/' . $filePath;
            $user->certificate = $path;
        }

        $user->user_name = $request->input('user_name');
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
     */
    public function searchUser(Request $request)
    {
        $user_name = $request->user_name;
        $role = $request->input('role');
        $start_date = $request->s_date;
        $end_date = $request->e_date;

        $user = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.name')
            ->whereNull('users.deleted_at')
            ->select('users.*', 'roles.*');
        if ($user_name) {
            $user->where('users.user_name', 'LIKE', '%' . $user_name . '%');
        }
        if ($role) {
            $user->where('roles.name', 'LIKE', '%' . $role . '%');
        }
        if ($start_date) {
            $user->whereDate('users.created_at', '>=', $start_date);
        }
        if ($end_date) {
            $user->whereDate('users.created_at', '<=', $end_date);
        }
        return $user->get();
    }
    public function exportPDF()
    {
        $data = User::all();
        view()->share('data', $data);
    }
}

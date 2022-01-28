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
        //return User::orderBy('id', 'DESC')->paginate(5);
        //return User::all();
        return DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.name')
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
                //$input = $request->all();
                //$input['password'] = Hash::make($input['password']);
                //$input['role_id'] =  $request->role;
                //$user = User::create($input);
                //$user->assignRole($request->input('roles'));
                //return $user;
        $user = new User;
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->password = Hash::make($request['password']);
        $user->role_id =  $request->role;
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
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
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
     */
    public function searchUser(Request $request)
    {
        $user_name = $request->user_name;
        $role = $request->input('role');
        $start_date = $request->s_date;
        $end_date = $request->e_date;

        $user = DB::table('users')
            ->join('roles', 'users.id', '=', 'roles.id')
            ->select('users.*', 'roles.name');
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

    /**
     * export pdf
     */
    public function exportPDF()
    {
        $data = DB::table('users')
            ->join('roles', 'users.id', '=', 'roles.id')
            ->select('users.*', 'roles.name')
            ->get();
        //    $data = DB::table('users')
        //        ->join('cate','students.major_id', '=','majors.id')
        //        ->get();
        //    view()->share('students', $student);
        //    $pdf = PDF::loadview('exportpdf');
        //    return $pdf->download('data.pdf');
        //
        //
        //        $data = User::all();
        view()->share('data', $data);
    }
}

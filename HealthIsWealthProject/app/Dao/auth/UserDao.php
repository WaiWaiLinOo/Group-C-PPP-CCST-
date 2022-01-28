<?php

namespace App\Dao\auth;


use App\Models\User;
use Illuminate\Http\Request;
use App\Contracts\Dao\auth\UserDaoInterface;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;

class UserDao implements UserDaoInterface
{
    /**
     * save data in database
     *
     * @return View savadata into database
     */
    public function saveUser(Request $request)
    {
        //        if ($request->file()) {
        //            $filename = time() . '.' . $request->profile->clientExtension();
        //            $filePath = $request->file('profile')->storeAs('userProfile', $filename, 'public');
        //            $path = 'storage/'.$filePath;
        //            $user['profile'] = $path;
        //        }
        //
        //        if ($certificate = $request->file('certificate')) {
        //            $certificate = time() . '.' . $request->file('certificate')->clientExtension();
        //            $request->file('certificate')->storeAs('userCertificate',$certificate,'public');
        //            $user['certificate'] = "$certificate";
        //        }
        //
        //        $user = User::create([
        //            'user_name' => $request['user_name'],
        //            'email' => $request['email'],
        //            'password' => Hash::make($request['password']),
        //            'profile' => $path,
        //            'certificate' => $certificate,
        //            'dob' => $request['dob'],
        //            'address' => $request['address'],
        //
        //        ]);
        //        $user->assignRole('User');
        //        return $user;
        $user = new User;
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->password = Hash::make($request['password']);
        $user->role_id =  $request->roles;
        $user->save();
        $user->assignRole('User');
        return $user;
    }

    /**
     * to get data from role
     * @return View get role all
     */
    public function getRole()
    {
        return Role::pluck('name', 'name')->all();
    }
}

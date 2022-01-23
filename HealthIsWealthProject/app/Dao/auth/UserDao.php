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
        if ($profile = $request->file('profile')) {
            $name = time() . '.' . $request->file('profile')->clientExtension();
            $request->file('profile')->move('userProfile',$name);
            $user['profile'] = "$name";
        }

        if ($certificate = $request->file('certificate')) {
            $certificate = time() . '.' . $request->file('certificate')->clientExtension();
            $request->file('certificate')->move('userCartificate',$certificate);
            $user['certificate'] = "$certificate";
        }
       
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'profile' => $name,
            'certificate' => $certificate,
            'dob' => $request['dob'],
            'address' => $request['address'],

        ]);
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

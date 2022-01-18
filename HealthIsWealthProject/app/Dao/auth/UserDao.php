<?php

namespace App\Dao\auth;


use App\Models\User;
use Illuminate\Http\Request;
use App\Contracts\Dao\auth\UserDaoInterface;
use Illuminate\Support\Facades\Hash;

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
            $name = time() . '_' . $request->file('profile')->getClientOriginalName();
            $request->file('profile')->store('public/images');
            $user['profile'] = "$name";
        }
        if ($certificate = $request->file('certificate')) {
            $certificate = time() . '_' . $request->file('certificate')->getClientOriginalName();
            $request->file('profile')->store('public/images');
            $user['certificate'] = "$certificate";
        }
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'profile' => $name,
            'certificate' => $certificate,
            'dob' => $request['dob'],
            'address' => $request['address'],

        ]);
    }
}

<?php

namespace App\Dao\auth;


use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;

use App\Contracts\Dao\auth\UserDaoInterface;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Foundation\Auth\RegistersUsers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\auth\UserServiceInterface;

/**
 * Data accessing object for post
 */
class UserDao implements UserDaoInterface
{
    /**
     * To getuser
     */
    public function saveUser(Request $request)
    {  if ($profile = $request->file('profile')) {
        $name = time().'_'.$request->file('profile')->getClientOriginalName();
        $request->file('profile')->store('public/images');
        $user['profile'] = "$name";
    }
    if ($certificate = $request->file('certificate')) {
        $certificate = time().'_'.$request->file('certificate')->getClientOriginalName();
        $request->file('profile')->store('public/images');
        $user['certificate'] = "$certificate";
    }
        return User::create([
            //$user = User::create([
          
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

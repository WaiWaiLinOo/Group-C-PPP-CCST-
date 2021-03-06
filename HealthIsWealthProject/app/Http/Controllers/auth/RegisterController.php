<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\UserCreateRequest;
use App\Notifications\WelcomeEmailNotification;
use App\Contracts\Services\auth\UserServiceInterface;
use Alert;


class RegisterController extends Controller
{
    /**
     * user interface
     */
    private $userInterface;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->middleware('guest');
        $this->userInterface = $userServiceInterface;
    }

    /**
     * Where to redirect users after registration.
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Where to redirect auth.register
     * @var string
     */
    protected function showRegistrationView()
    {
        $roles = $this->userInterface->getRole();
        return view('auth.register')->with('roles', $roles);
    }

    /**
     * To save User with values from request
     * @param Request $request request including inputs
     * @return Object dave user
     */
    protected function create(UserCreateRequest $request)
    {
        $roles = $this->userInterface->getRole();
        $user = $this->userInterface->saveUser($request);
        Alert::success('Congrats', 'You\'ve Successfully Registered');
        $user->notify(new WelcomeEmailNotification($user));
        return redirect()
            ->route('home', ['user' => $user, 'roles' => $roles,]);
    }
}

<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Contracts\Services\auth\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserCreateRequest;

class RegisterController extends Controller
{
    /**
     * user interface
     */
    private $userInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->middleware('guest');
        $this->userInterface = $userServiceInterface;
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Where to redirect auth.register
     *
     * @var string
     */
    protected function showRegistrationView()
    {
        return view('auth.register');
    }

    /**
     * To save User with values from request
     * @param Request $request request including inputs
     * @return Object dave user
     */
    protected function create(UserCreateRequest $request)
    {
        $validated = $request->validated();
        $user = $this->userInterface->saveUser($request, $validated);
        return redirect()
            ->route('home');
    }
}

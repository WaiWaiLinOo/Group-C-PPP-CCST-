<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Contracts\Services\customer\CustomerServiceInterface;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;

class CustomerController extends Controller
{
    /**
     * customer interface
     */
    private $customerInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CustomerServiceInterface $customerServiceInterface)
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->customerInterface = $customerServiceInterface;
    }

    /**
     * Show user data
     *
     * @return View Userdata
     */
    public function index(Request $request)
    {
        $customers = $this->customerInterface->getUser($request);
        return view('customer.index', compact('customers'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
        //return view('customer.showlist', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->customerInterface->getRole();
        return view('customer.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
        $user = $this->customerInterface->storeUser($request);

        return redirect()->route('customers.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = $this->customerInterface->getUserId($id);
        return view('users.show', compact('customer'));
    }

    /**
     * To show user in user edit form
     *@param $id
     * @return view
     */
    public function edit($id)
    {
        $user = $this->customerInterface->userEditView($id);
        return view('customer.edit', compact('user'));
    }

    /**
     * To update user role
     *@param $id
     *@param $request
     * @return view
     */
    public function userRoleUpdate(Request $request, $id)
    {
        $message = $this->customerInterface->userRoleUpdate($request, $id);
        return $message;
    }

    /**
     * To delelte user role
     *@param $id
     *@param $request
     * @return view
     */
    public function destroy($id)
    {
        $user = $this->customerInterface->deleteUser($id);
        return redirect()->route('customerView')
            ->with('success', 'User deleted successfully');
    }
}

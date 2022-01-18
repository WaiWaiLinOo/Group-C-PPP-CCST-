<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Contracts\Services\customer\CustomerServiceInterface;

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
        $this->middleware('guest');
        $this->customerInterface = $customerServiceInterface;
    }

    /**
     * Show user data
     *
     * @return View Userdata
     */
    public function index()
    {
        $customers = $this->customerInterface->getUser();

        return view('customer.showlist', compact('customers'));
    }

    /**
     * To show user in user edit form
     *@param $id
     * @return view
     */

    public function userEditView($id)
    {
        $user = $this->customerInterface->userEditView($id);
        return view('customer.user_edit', compact('user'));
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

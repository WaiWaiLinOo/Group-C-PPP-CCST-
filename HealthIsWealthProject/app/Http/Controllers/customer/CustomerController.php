<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
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
     * To show user in user edit form
     *@param $id
     * @return view
     */

    public function userEditView($id)
    {
        $user = $this->customerInterface->userEditView($id); 
        return view('customer.user_edit',compact('user'));
    }

    /**
    * To update user role
    *@param $id
    *@param $request
    * @return view
    */
    public function userRoleUpdate(Request $request, $id)
    {
       
        $message = $this->customerInterface->userRoleUpdate($request,$id); 
        dd($message);
    }
}

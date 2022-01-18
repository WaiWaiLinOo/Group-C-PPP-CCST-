<?php

namespace App\Http\Controllers\customer;

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->customerInterface->deleteUser($id);
        return redirect()->route('customerView')
            ->with('success', 'User deleted successfully');
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
}

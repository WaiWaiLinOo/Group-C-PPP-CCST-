<?php

namespace App\Services\customer;

use App\Mail\CustomerList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Contracts\Dao\customer\CustomerDaoInterface;
use App\Contracts\Services\customer\CustomerServiceInterface;

/**
 * Service class for customer.
 */
class CustomerService implements CustomerServiceInterface
{

    /*
     * customer dao
     */
    private $customerDao;

    /**
     * Class Constructor
     * @param customerDaoInterface
     * @return
     */
    public function __construct(CustomerDaoInterface $customerDao)
    {
        $this->customerDao = $customerDao;
    }

    /**
     * to get data from database
     *
     * @return View getdata from database
     */
    public function getUser($request)
    {
        return $this->customerDao->getUser($request);
    }

    /**
     * get data from role
     * @return View role
     */
    public function getRole()
    {
        return $this->customerDao->getRole();
    }

    /**
     * get data from customer id
     * @return View customer
     */
    public function getUserId($id)
    {
        return $this->customerDao->getUserId($id);
    }

    /**
     * store user
     * @return View getdata
     */
    public function storeUser($request)
    {
        return $this->customerDao->storeUser($request);
    }

    /**
     * To delete user by id
     * @param string $id user id
     * @param string $deletedUserId deleted user id
     * @return string $message message for success or not
     */
    public function deleteUser($id)
    {
        return $this->customerDao->deleteUser($id);
    }

    /**
     * To show user in user edit form
     *@param $id
     *@return object
     */
    public function userEditView($id)
    {
        return $this->customerDao->userEditView($id);
    }

    /**
     * To update user role
     *@param $id
     *@param $request
     */
    public function userRoleUpdate($request, $id)
    {
        return $this->customerDao->userRoleUpdate($request, $id);
    }

    /**
     * To update user role
     *@param $id
     *@param $request
     */
    public function profileUpdate($request, $id)
    {
        return $this->customerDao->profileUpdate($request, $id);
    }

    /**
     * To send email to specified email
     * 
     * @param Request $request request with inputs
     * @return bool
     */
    public function sendMail(Request $request)
    {
        $customers = $this->customerDao->getUser($request);
        if ($customers) {
            Mail::to($request->email)->send(new CustomerList($customers));
            // Check mail sending process has error.
            if (count(Mail::failures()) > 0) {
                return redirect('/')->with('status', 'Mail cannot sent!');
            } else {
                return true;
            }
        } else {
            return redirect('/')->with('status', 'Students is absent!');
        }
    }

    /**
     * To search user
     *@param $id
     *@param $request
     */
    public function searchUser(Request $request)
    {
        return $this->customerDao->searchUser($request);
    }

    /**
     * To expor pdf
     *@param $id
     *@param $request
     */
    public function exportPDF()
    {
        return $this->customerDao->exportPDF();
    }
}

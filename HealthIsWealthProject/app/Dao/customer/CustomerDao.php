<?php

namespace App\Dao\customer;
use App\Models\User;
use App\Contracts\Dao\customer\CustomerDaoInterface;

/**
 * Data accessing object for customer
 */
class CustomerDao implements CustomerDaoInterface
{

   /**
   * to get data from database
   *
   * @return View get data
   */
    public function getUser()
    {
        return User::all();
    }

}

<?php

namespace App\Contracts\Dao\contact;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of customer contact
 */
interface ContactDaoInterface
{
    /**
     * store contact data
     * @return View getdata
     */
    public function storeDataContact(Request $request);

    /*contactshow
    *@return View show data
    */
    public function getContactData();

}

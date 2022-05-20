<?php

namespace App\Dao\contact;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Contracts\Dao\contact\ContactDaoInterface;

/**
 * Interface for Data Accessing Object of customer contact data
 */
class ContactDao implements ContactDaoInterface
{

    /**
     * store contact data
     * @return View getdata
     */
    public function storeDataContact(Request $request){

        $contact= Contact::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'detail' => $request['detail'],
        ]);
        return $contact;
    }

    /*contactshow
    *@return View show data
    */
    public function getContactData(){

        return Contact::all();
    }

}

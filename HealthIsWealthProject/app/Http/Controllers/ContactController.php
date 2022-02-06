<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ContactCreateRequest;
use App\Contracts\Services\contact\ContactServiceInterface;


class ContactController extends Controller

{
    /**
     * Create a new controller instance.
     * @return void
     */
    private $contactInterface;

    /**
     * Create a new controller instance.
     * Display a listing of the resource.
     * @return void
     */
    public function __construct(ContactServiceInterface $contactServiceInterface)
    {
        $this->contactInterface = $contactServiceInterface;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = $this->contactInterface->getContactData();
        return view('contactshow')->with('contact',$contact);
    }

    /**
     * store contact
     * @return \Illuminate\Http\Response
     */
    public function store(ContactCreateRequest $request)
    {
$this->contactInterface->storeDataContact($request);
        Alert::success('Congrats', 'You\'ve Successfully Created Message');
        return view('contactus');
    }
}

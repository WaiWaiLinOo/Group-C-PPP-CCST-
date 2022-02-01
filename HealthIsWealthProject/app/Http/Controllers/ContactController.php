<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Contracts\Services\contact\ContactServiceInterface;
use App\Http\Requests\ContactCreateRequest;
use Alert;

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
        return view('contactshow', compact('contact'));
    }

    /**
     * store contact
     * @return \Illuminate\Http\Response
     */
    public function store(ContactCreateRequest $request)
    {
        $validated = $request->validated();
        $this->contactInterface->storeDataContact($request, $validated);
        Alert::success('Congrats', 'You\'ve Successfully Created Message');
        return view('contactus');
    }
}

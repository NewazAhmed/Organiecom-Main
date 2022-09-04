<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use App\Subscribe;
use Carbon\Carbon;

class ContactController extends Controller
{


    

    //===Middleware here===
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
//===So that no one can access here without login===

    public function index(){
        $contact = Contact::latest()->get();
        return view('admin.contact.index', compact('contact'));
    }

    public function contact_view($contact_id){
        $contact = Contact::findOrFail($contact_id);
        return view('admin.contact.view', compact('contact'));
    }


//=====Contact Delete======

public function contact_delete($contact_id){
        $brand = Contact::find($contact_id)->delete();

        return Redirect()->back()->with('danger','Message Deleted!');
    }


//=====Subscribers======

    public function subscribe(){
        $subscribe = Subscribe::latest()->get();
        return view('admin.subscriber.index', compact('subscribe'));
    }

    public function subscribe_delete($subscribe_id){
        $subscribe = Subscribe::find($subscribe_id)->delete();

        return Redirect()->back()->with('danger','Email Deleted!');
    }
}


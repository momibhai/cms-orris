<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index(){

        $contacts = Contact::latest()->paginate(30);

        return view('contacts.index', compact('contacts'));
    }

     // Method to update contacted status
     public function updateContacted(Request $request, $id)
     {
         $contact = Contact::findOrFail($id);
         $contact->contacted = $request->has('contacted');
         $contact->save();
 
         return redirect()->route('contacts.index')->with('success', 'Contact status updated!');
     }
     
}

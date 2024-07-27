<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function saveForm(Request $request)
    {

        $request->validate([
            'name' => '',
            'email' => '',
            'phone' => '',
            'subject' => '',
            'content' => '',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        if ($request->email) {
            $contact->email = $request->email;
        }
        $contact->subject = $request->subject;
        $contact->content = $request->content;
        $contact->save();
        
        return redirect()->back()->with('success', 'Thank you for contacting us! We will contact you soon.');
    }
}

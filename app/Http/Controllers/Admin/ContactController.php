<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\ContactReply;
use App\Http\Controllers\Controller;
use App\Mail\ContactReplyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::orderBy('id','desc')->get();
        return view('admin.contact.index',[
            'contacts' => $contacts,
        ]);
    }

    public function view($id){
        $contact = Contact::where('id',$id)->first();
        Contact::where('id',$contact->id)->update([
            'read_status' => 'read'
        ]);
        return view('admin.contact.view',[
            'contact' => $contact,
        ]);
    }

    public function destroy($id){
        Contact::where('id',$id)->delete();
        return back()->with('alert-danger','Contact Delete Successfully');
    }

    public function deleteAll(Request $request){
        $checked = $request->input('checked',[]);
        foreach ($checked as $id) {
            Contact::where("id",$id)->delete(); //Assuming you have a Todo model.
       }
        return back()->with('alert-danger','Delete Contact');
    }

    public function reply($id){
        $contact = Contact::where('id',$id)->first();
        $all_replies = ContactReply::where('contact_id',$contact->id)->get();
        Contact::where('id',$contact->id)->update([
            'read_status' => 'read'
        ]);
        return view('admin.contact.reply',[
            'contact' => $contact,
            'all_replies' => $all_replies
        ]);
        return back()->with('alert-danger','Contact Delete Successfully');
    }

    public function replySubmit(Request $request){
        $request->validate([
            'message' => 'required'
        ]);
        $reply = ContactReply::create([
            'contact_id' => $request->contact_id,
            'email' => $request->email,
            'message' => $request->message,
            'created_by' => Auth::user()->email,
        ]);
        Mail::to($reply->email)->send(new ContactReplyMail($reply));
        Contact::where('id',$reply->contact_id)->update([
            'reply_status' => '2'
        ]);
        return back()->with('alert-success','Reply Successfully');
    }


}

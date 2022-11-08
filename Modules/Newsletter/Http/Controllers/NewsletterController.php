<?php

namespace Modules\Newsletter\Http\Controllers;

// use App\Mail\NewsletterMail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Modules\Newsletter\Entities\Email;
use Illuminate\Contracts\Support\Renderable;
use Modules\Newsletter\Emails\NewsletterMail;
use App\Models\Customer;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        if (!enableModule('newsletter')) {
            abort(404);
        }
        $request->validate([
            'sub_email' => 'required|email|unique:emails,email'
        ],
        [
            'sub_email.required' => 'Email field is required!',
            'sub_email.unique' => 'The email has already been taken.',
        ]);

        $usersubscribe = Customer::where('email', $request->sub_email)->first();
        if($usersubscribe){
            if($usersubscribe->subscribe == NULL){
                Customer::where('email', $request->sub_email)->update([
                    'subscribe' => 1,
                ]);
                Email::create(['email' => $request->sub_email]);
                return redirect()->back()->with('success', 'Your subscription successfully!');
            }else {
                Email::create(['email' => $request->sub_email]);
                return redirect()->back()->with('success', 'Your subscription successfully!');
            }
        }else{
            Email::create(['email' => $request->sub_email]);
            return redirect()->back()->with('success', 'Your subscription added successfully! ');
        }
    }

    public function sendMail()
    {
        if (!userCan('newsletter.mailsend')) {
            abort(403);
        }
        $data['emails'] = Email::get();
        return view('newsletter::send-mail', $data);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (!userCan('newsletter.view')) {
            abort(403);
        }

        $data['emails'] = Email::latest()->get();
        return view('newsletter::index', $data);
    }

    public function destroy(Email $email)
    {
        if (!userCan('newsletter.delete')) {
            abort(403);
        }
        $deleted = $email->delete();
        $deleted ? flashSuccess('Email Deleted Successfully') : flashError();
        return back();
    }

    public function submitMail(Request $request)
    {
        if (!userCan('newsletter.mailsend')) {
            abort(403);
        }
        $arrayEmails = $request->emails;
        $emailSubject = $request->subject;
        $emailBody = $request->body;

        foreach ($arrayEmails as $email) {
            Mail::to($email)->send(new NewsletterMail($emailSubject, $emailBody));
        };

        flashSuccess('Mail Sent Successfully');
        return back();
    }
}

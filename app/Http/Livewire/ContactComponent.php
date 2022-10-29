<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Contact\Entities\Contact;
use App\Models\Setting;
use Mail;
use App\Mail\SendmailtoAdmin;

class ContactComponent extends Component
{
    public $name, $email, $subject, $message, $success;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required|min:10',
    ];

    public function submitContact()
    {
        
        $this->validate();
        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        $this->reset();
        $this->success = "Message Sent Successfully";

        $setting_email = Setting::find(1)->email;
        Mail::to($setting_email)->send(new SendmailtoAdmin); 
    }

    public function render()
    {
        return view('livewire.contact-component');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class CntactForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;
    public $successMessage;
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        'message' => 'required|min:5',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $contacts = $this->validate();

        $contacts['name'] = $this->name;
        $contacts['email'] = $this->email;
        $contacts['phone'] = $this->phone;
        $contacts['message'] = $this->message;


        // Mail::to('vasil@vasil.com')->send($contact);
        //sleep(2);
        $this->successMessage = 'We received your message successfully and will get back to you shortly!';

        $this->resetForm();
    }

    private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.cntact-form');
    }
}

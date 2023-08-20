<?php

namespace App\Http\Livewire;
use App\Models\Contact;
use Livewire\Component;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $comment;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' =>'required|numeric',
            'comment' =>  'required'
        ]);
    }
    public function sendMessage()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' =>'required|numeric',
            'comment' =>  'required'
        ]);
        $contact = new Contact();
        $contact->name= $this->name;
        $contact->email= $this->email;
        $contact->phone= $this->phone;
        $contact->comment= $this->comment;
        $contact->save();
        session()->flash('contact_message','Thanks,Your message has been Added!');

    }
    public function render()
    {
        return view('livewire.contact-component')->layout('layouts.base');
    }
}

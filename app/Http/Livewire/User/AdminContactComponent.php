<?php

namespace App\Http\Livewire\User;
use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;
class AdminContactComponent extends Component
{
   
    public function render()
    {
        $contact = Contact::paginate(10);
        return view('livewire.user.admin-contact-component',['contacts'=>$contact])->layout('layouts.base');
    }
}

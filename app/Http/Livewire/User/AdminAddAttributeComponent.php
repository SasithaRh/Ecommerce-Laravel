<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\ProductAttribute;
class AdminAddAttributeComponent extends Component
{

    public $name;
    public function addAttribute()
    {
        $pattribute = new ProductAttribute();
        $pattribute->name = $this->name;
        $pattribute->save();
        session()->flash('message','New Atrribute added  successfully');


    }

    public function render()
    {
        return view('livewire.user.admin-add-attribute-component')->layout('layouts.base');
    }
}

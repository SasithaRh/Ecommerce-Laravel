<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\ProductAttribute;
class AdminEditAttributeComponent extends Component
{
    public $attribute_id;
    public $name;

    public function mount($attribute_id)
    {
       $pattribute = ProductAttribute::find($attribute_id);
       $this->attribute_id = $pattribute->id;
       $this->name = $pattribute->name;
    }

    public function editAttribute()
    {
        $pattribute = ProductAttribute::find($this->attribute_id);
        $pattribute->name= $this->name;
        $pattribute->save();
        session()->flash('message','Atrribute updated  successfully');
    }

    public function render()
    {
        return view('livewire.user.admin-edit-attribute-component')->layout('layouts.base');
    }
}

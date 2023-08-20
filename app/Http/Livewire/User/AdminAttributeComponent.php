<?php

namespace App\Http\Livewire\User;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\ProductAttribute;
class AdminAttributeComponent extends Component
{
    use  WithPagination;
 
    public function deleteAttribute($attribute_id)
    {
        $attribute= ProductAttribute::find($attribute_id);
        $attribute->delete();

        session()->flash('message','Attribute has been deleted successfully');
    }
    public function render()
    {
        $attributes=ProductAttribute::paginate(10);

        return view('livewire.user.admin-attribute-component',['attributes'=>$attributes])->layout('layouts.base');
    }
}

<?php

namespace App\Http\Livewire\User;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;
use App\Models\Product;

use Livewire\Component;

class UserCategoryComponent extends Component
{
    public function deleteCategory($id)
    {
        $category= Category::find($id);
        $category->delete();

        session()->flash('message','Category has been deleted successfully');
    }
    public function render()
    {
        $categories=Category::paginate(8);
        return view('livewire.user.user-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}

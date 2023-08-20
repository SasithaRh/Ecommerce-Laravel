<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Category;
use App\Models\HomeCategory;
class UserHomeCategoryComponent extends Component
{
    public $selected_categories = [];
    public $numberofproduct;

    public function mount()
    {
        $category = HomeCategory::find(1);
        $this->selected_categories = explode(',',$category->sel_categories);
        $this->numberofproduct= $category->no_of_products;
    } 

    public function updateHomeCategory()
    {
        $category = HomeCategory::find(1);
        $category->sel_categories= impode(',',$this->selected_categories);
        $category->no_of_products= $category->no_of_products;
        $category->save();
        session()->flash('message','Home Category updated successfully');


    } 
    public function render()
    {
        
        $categories=Category::all();
        return view('livewire.user.user-home-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}

<?php

namespace App\Http\Livewire\User;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
class UserAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $category_id;
    public function generateslug()
    {
       $this->slug=Str::slug($this->name);
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required|unique:categories'  
        ]);
    }

    public function storeCategory()
    {
        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);

        if($this->category_id)
        {
            $category = new Subcategory();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->category_id = $this->category_id;
            $category->save();

            
        }else{
            $category=new Category();
            $category->name=$this->name;
            $category->slug=$this->slug;
            $category->save();
           
        }
        session()->flash('message','Category has been ctreated successfully');

        
    }
    public function render()
    {
        $category = Category::all();
        return view('livewire.user.user-add-category-component',['categories'=>$category])->layout('layouts.base');
    }
}

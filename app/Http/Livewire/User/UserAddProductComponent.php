<?php

namespace App\Http\Livewire\User;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\ProductAttribute;
class UserAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $images;

    public $attr;
    public $inputs = [];
    public $attribute_arr = [];
    public $attribues_value ;

    public function mount()
    {
        $this->stock_status='instock';
        $this->featured=0;
    }
    public function add()
    {
        if(!in_array($this->attr,$this->attribute_arr)){
            array_push($this->inputs,$this->attr);
            array_push($this->attribute_arr,$this->attr);

        }
    }

public function remove($attr)
{
    unset($this->inputs[$attr]);
}

    public function generateslug()
    {
       $this->slug=Str::slug($this->name,'-');
    }
    public function addProduct()
    {
        $product=new Product();
        $product->name=$this->name;
        $product->slug=$this->slug;
        $product->short_description=$this->short_description;
        $product->description=$this->description;
        $product->regular_price=$this->regular_price;
        $product->sale_price=$this->sale_price;
        $product->SKU=$this->SKU;
        $product->stock_status=$this->stock_status;
        $product->featured=$this->featured;
        $product->quantity=$this->quantity;
        $imageName=Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image=$imageName;
        if($this->images){
            $imagename = '';
            foreach($this->images as $key=>$image){
                $imaName=Carbon::now()->timestamp.$key.'.'.$image->extension();
                $image->storeAs('products',$imaName);
                $imagename =$imagename.','.$imaName;
            }
            $product->images=$imagename;

        }
        $product->category_id=$this->category_id;
        $product->save();
        session()->flash('message','Product has been ctreated successfully');
    }
    public function render()
    {
        $categories=Category::all();
        $pattributes = ProductAttribute::all();
        return view('livewire.user.user-add-product-component',['categories'=>$categories,'pattributes'=>$pattributes])->layout('layouts.base');
    }
}

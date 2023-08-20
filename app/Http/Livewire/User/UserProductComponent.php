<?php

namespace App\Http\Livewire\User;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
class UserProductComponent extends Component
{
    use WithPagination;
    public $searchTerm;
    public function deleteProduct($id)
    {
        $product= Product::find($id);
        $product->delete();

        session()->flash('message','Product has been deleted successfully');
    }
    public function render()
    {
        $search= '%' . $this->searchTerm . '%' ;
        $products=Product::where('name','LIKE',$search)
        ->orWhere('stock_status','LIKE',$search)
        ->orWhere('regular_price','LIKE',$search)
        ->orWhere('sale_price','LIKE',$search)
        
        ->orderBy('id','DESC')
        ->paginate(10);
        return view('livewire.user.user-product-component',['products'=>$products])->layout('layouts.base');
    }
}

<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Product;
use Cart;
class HomeComponent extends Component
{
    public function render()
    {
        $lproducts=Product::orderBy('created_at','DESC')->get()->take(10);
        $sproducts=Product::where('sale_price','>',0)->inRandomOrder()->get()->take(8);
        if(Auth::check()){
            Cart::instance('cart')->restore(Auth::user()->email);
        }

        return view('livewire.home-component',['lproducts'=>$lproducts,'sproducts'=>$sproducts])->layout('layouts.base');
    }
}

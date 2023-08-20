<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
class UserOrdersComponent extends Component
{
    public function render()
    {
        $orders = Order::where('user_id',Auth::user()->id)->paginate(7);
        return view('livewire.admin.user-orders-component',['orders'=>$orders])->layout('layouts.base');
    }
}

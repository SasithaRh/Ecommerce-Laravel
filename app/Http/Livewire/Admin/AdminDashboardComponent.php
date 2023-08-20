<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
class AdminDashboardComponent extends Component
{
    public function render()
    {
        $orders = Order::orderBy('created_at','DESC')->where('user_id',Auth::user()->id)->get()->take(10);
        $totalcost = Order::where('status','!=','canceled')->where('user_id',Auth::user()->id)->sum('total');
        $totalPurchase = Order::where('status','!=','canceled')->where('user_id',Auth::user()->id)->count();
        $totalDeliverd = Order::where('status','delivered')->where('user_id',Auth::user()->id)->count();
        $totalCanceled = Order::where('status','canceled')->where('user_id',Auth::user()->id)->count();
        return view('livewire.admin.admin-dashboard-component',['orders'=>$orders,
        'totalcost'=>$totalcost,
        'totalPurchase'=>$totalPurchase,
        'totalDeliverd'=>$totalDeliverd,
        'totalCanceled'=>$totalCanceled])->layout('layouts.base');
    }
}

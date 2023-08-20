<?php

namespace App\Http\Livewire\User;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Order;
class UserDashboardComponent extends Component
{
    public function render()
    {
        $orders = Order::orderBy('created_at','DESC')->get()->take(10);
        $totalSalses = Order::where('status','delivered')->count();
        $totalRevenue = Order::where('status','delivered')->sum('total');
        $todaySales = Order::where('status','delivered')->whereDate('created_at',Carbon::today())->count();
        $todayRevenue = Order::where('status','delivered')->whereDate('created_at',Carbon::today())->sum('total');

        return view('livewire.user.user-dashboard-component',['orders'=>$orders,
        'totalSalses'=>$totalSalses,
        'totalRevenue'=>$totalRevenue,
        'todaySales'=>$todaySales,
        'todayRevenue'=>$todayRevenue])->layout('layouts.base');
    }
}

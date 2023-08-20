<?php

namespace App\Http\Livewire\User;
use App\Models\Coupon;
use Livewire\Component;
use Livewire\WithPagination;
class UserCouponsComponent extends Component
{
    public function deleteCoupons($coupons_id)
    {
        $coupon = Coupon::find($coupons_id);
        $coupon->delete();

        session()->flash('message','Coupon has been deleted successfully');
    }
    public function render()
    {
        $Coupons = Coupon::paginate(8);
        return view('livewire.user.user-coupons-component',['Coupons'=>$Coupons])->layout('layouts.base');
    }
}

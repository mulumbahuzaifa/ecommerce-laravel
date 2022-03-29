<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use Livewire\Component;

class AdminCouponsComponent extends Component
{
    public function deleteCoupon($coupon_id){
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        session()->flash('message', 'Coupon has been deleted successfully');
    }
    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin-coupons-component', ['coupons'=> $coupons])->layout('layouts.base');
    }
}
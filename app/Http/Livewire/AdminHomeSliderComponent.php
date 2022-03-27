<?php

namespace App\Http\Livewire;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public function deleteSlide($id){
        $slider = HomeSlider::find($id);
        $slider->delete();
        session()->flash('message', 'Slide has been deleted successfully');
    }

    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin-home-slider-component',['sliders' => $sliders])->layout('layouts.base');
    }
}
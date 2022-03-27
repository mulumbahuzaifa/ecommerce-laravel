<?php

namespace App\Http\Livewire;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;

    public function mount(){
        $this->status = 0;
    }

    public function addSlide(){
        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $slider->status = $this->status;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('sliders', $imageName);
        $slider->image = $imageName;
        $slider->save();
        session()->flash('message', 'Slider has been created Successfully');
    }
    public function render()
    {
        return view('livewire.admin-add-home-slider-component')->layout('layouts.base');
    }
}
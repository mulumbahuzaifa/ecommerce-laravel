<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class AdminHomeCategoryComponent extends Component
{
    public $selected_categories = [];
    public $numberOfProducts;

    public function mount(){
        $category = HomeCategory::find(1);
        $this->selected_categories = explode(',', $category->sel_category);
        $this->numberOfProducts = $category->no_of_products;
    }
    public function updateHomeCategory(){
        $category = HomeCategory::find(1);
        $category->sel_category = implode(',', $this->selected_categories);
        $category->no_of_products = $this->numberOfProducts;
        $category->save();
        session()->flash('message', 'HomeCategory has been updated successfully');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin-home-category-component', ['categories'=> $categories])->layout('layouts.base');
    }
}
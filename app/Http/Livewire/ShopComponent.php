<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $min_price;
    public $max_price;

    public function mount(){
        $this->sorting = "default";
        $this->pagesize = 12;

        $this->min_price = 1;
        $this->max_price = 10000;
    }
    public function store($product_id, $product_name, $product_price){
        Cart::instance('cart')->add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added to cart');
        return redirect()->route('product.cart');
    }
    public function addToWishlist($product_id, $product_name, $product_price){
        Cart::instance('wishlist')->add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        return redirect()->route('product.shop');

    }
    use WithPagination;
    public function render()
    {
        if ($this->sorting=='date') {
            $products = Product::orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }
        else if ($this->sorting=='price') {
            $products = Product::orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        }
        else if ($this->sorting=='price_desc') {
            $products = Product::orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        }
        else {
            $products = Product::paginate($this->pagesize);
        }
        $categories = Category::all();

        return view('livewire.shop-component', ['products' => $products, 'categories' => $categories])->layout('layouts.base');
    }
}
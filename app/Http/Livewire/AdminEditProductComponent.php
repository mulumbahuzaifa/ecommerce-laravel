<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $short_description;
    public $description;
    public $image;
    public $category_id;
    public $newImage;
    public $product_id;

    public function mount($product_slug){
        $product = Product::where('slug', $product_slug)->first();
         $this->name =$product->name;
         $this->slug =$product->slug;
         $this->regular_price =$product->regular_price;
         $this->sale_price =$product->sale_price;
         $this->SKU =$product->SKU;
         $this->stock_status =$product->stock_status;
         $this->featured =$product->featured;
         $this->quantity =$product->quantity;
         $this->short_description =$product->short_description;
         $this->description =$product->description;
         $this->image =$product->image;
         $this->category_id =$product->category_id;
         $this->product_id =$product->id;
    }

    public function generateslug(){
        $this->slug = Str::slug($this->name, '-');
    }
    // public function updated($fields){
    //     $this->validateOnly($fields,[
    //         'name' => 'required',
    //         'slug' => 'required',
    //         'regular_price' => 'required|numeric',
    //         // 'sale_price' => 'numeric',
    //         'stock_status' => 'required',
    //         'SKU' => 'required',
    //         'quantity' => 'required|numeric',
    //         'short_description' => 'required',
    //         'description' => 'required',
    //         'newImage' => 'mimes:jpeg,png',
    //         'category_id' => 'required',
    //     ]);
    // }

    public function updateProduct(){

        // $this->validate([
        //     'name' => 'required',
        //     'slug' => 'required',
        //     'regular_price' => 'required|numeric',
        //     // 'sale_price' => 'numeric',
        //     'stock_status' => 'required',
        //     'SKU' => 'required',
        //     'quantity' => 'required|numeric',
        //     'short_description' => 'required',
        //     'description' => 'required',
        //     'newImage' => 'mimes:jpeg,png',
        //     'category_id' => 'required',
        // ]);

        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->SKU = $this->SKU;
        $product->quantity = $this->quantity;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        if($this->newImage){
            $imageName = Carbon::now()->timestamp. '.' . $this->newImage->extension();
            $this->newImage->storeAs('products', $imageName);
            $product->image = $imageName;
        }

        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('message', 'Product has been updated Successfully');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin-edit-product-component', ['categories' => $categories])->layout('layouts.base');
    }
}
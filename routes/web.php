<?php

use App\Http\Livewire\AdminAddCategoryComponent;
use App\Http\Livewire\AdminAddProductComponent;
use App\Http\Livewire\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\AdminAddCouponsComponent;
use App\Http\Livewire\AdminAddHomeSliderComponent;
use App\Http\Livewire\AdminCouponsComponent;
use App\Http\Livewire\AdminEditCategoryComponent;
use App\Http\Livewire\AdminEditCouponsComponent;
use App\Http\Livewire\AdminEditHomeSliderComponent;
use App\Http\Livewire\AdminEditProductComponent;
use App\Http\Livewire\AdminHomeCategoryComponent;
use App\Http\Livewire\AdminHomeSliderComponent;
use App\Http\Livewire\AdminOrderComponent;
use App\Http\Livewire\AdminOrderDetailsComponent;
use App\Http\Livewire\AdminProductComponent;
use App\Http\Livewire\AdminSaleComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\UserOrderComponent;
use App\Http\Livewire\UserOrderDetailsComponent;
use App\Http\Livewire\WishlistComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class);
Route::get('/shop', ShopComponent::class)->name('product.shop');;
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/wishlist', WishlistComponent::class)->name('product.wishlist');
Route::get('/search', SearchComponent::class)->name('product.search');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');
Route::get('/product/{slug}', DetailsComponent::class)->name('product.detail');
Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

//For User
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');

    Route::get('/user/orders', UserOrderComponent::class)->name('user.orders');
    Route::get('/user/orders/{order_id}', UserOrderDetailsComponent::class)->name('user.orderdetails');
});

//For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function(){
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/categories/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.editproduct');
    Route::get('/admin/categories/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');

    Route::get('/admin/slider', AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add', AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slide_id}', AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');

    Route::get('/admin/home-categories', AdminHomeCategoryComponent::class)->name('admin.homecategory');
    Route::get('/admin/sale', AdminSaleComponent::class)->name('admin.sale');

    Route::get('/admin/coupons', AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/coupons/add', AdminAddCouponsComponent::class)->name('admin.addcoupon');
    Route::get('/admin/coupons/edit/{coupon_id}', AdminEditCouponsComponent::class)->name('admin.editcoupon');

    Route::get('/admin/orders', AdminOrderComponent::class)->name('admin.orders');
    Route::get('/admin/orders/{order_id}', AdminOrderDetailsComponent::class)->name('admin.orderdetails');
});
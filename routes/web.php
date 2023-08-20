<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserCategoryComponent;
use App\Http\Livewire\User\AdminOrderComponent;
use App\Http\Livewire\User\AdminOrderDetailsComponent;
use App\Http\Livewire\User\UserHomeCategoryComponent;
use App\Http\Livewire\User\UserAddCategoryComponent;
use App\Http\Livewire\User\UserCouponsComponent;
use App\Http\Livewire\User\UserAddCouponsComponent;
use App\Http\Livewire\User\UserEditCouponsComponent;
use App\Http\Livewire\User\AdminContactComponent;
use App\Http\Livewire\User\AdminAttributeComponent;
use App\Http\Livewire\User\AdminAddAttributeComponent;
use App\Http\Livewire\User\AdminEditAttributeComponent;


use App\Http\Livewire\Admin\UserOrdersComponent;
use App\Http\Livewire\Admin\UserOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\UserReviewComponent;
use App\Http\Livewire\Admin\UserProfileComponent;

//use App\Http\Livewire\Admin\AdminCategoryComponent;

use App\Http\Livewire\User\UserProductComponent;
use App\Http\Livewire\User\UserEditCategoryComponent;
 use App\Http\Livewire\User\UserAddProductComponent;
 use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\User\UserEditProductComponent;
// use App\Http\Livewire\Admin\AdminHomeSliderComponent;
// use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
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



Route::get('/', HomeComponent::class)->name('home');
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');
Route::get('/search', SearchComponent::class)->name('product.search');
Route::get('/thankyou', ThankyouComponent::class)->name('thankyou');
Route::get('/contactus', ContactComponent::class)->name('contactus');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// For normal user
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
     Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
     Route::get('/user/category',UserCategoryComponent::class)->name('user.categories');
     Route::get('/user/category/add',UserAddCategoryComponent::class)->name('user.addcategory');
     Route::get('/user/category/edit',UserEditCategoryComponent::class)->name('user.editcategory');
   //  Route::get('/user/product/edit/{product_slug}',UserEditProductComponent::class)->name('user.editproduct');
     Route::get('/user/category/edit/{category_slug}/{scategory_slug?}',UserEditCategoryComponent::class)->name('user.editcategory');
     Route::get('/user/products',UserProductComponent::class)->name('user.product');
     Route::get('/user/product/add',UserAddProductComponent::class)->name('user.addproduct');
     Route::get('/user/product/edit/{product_slug}',UserEditProductComponent::class)->name('user.editproduct');
     Route::get('/user/home-categories',UserHomeCategoryComponent::class)->name('user.homecategories');
     Route::get('/user/coupons',UserCouponsComponent::class)->name('user.coupons');
     Route::get('/user/coupons/add',UserAddCouponsComponent::class)->name('user.addcoupons');
     Route::get('/user/coupons/edit/{coupon_id}',UserEditCouponsComponent::class)->name('user.editcoupons');
     Route::get('/user/orders',AdminOrderComponent::class)->name('user.orders');
     Route::get('/user/orders/{order_id}',AdminOrderDetailsComponent::class)->name('user.orderdetails');
     Route::get('/user/contact-us',AdminContactComponent::class)->name('user.contact');
     Route::get('/user/attribute',AdminAttributeComponent::class)->name('user.attributes');
     Route::get('/user/attribute/add',AdminAddAttributeComponent::class)->name('user.addattribute');
     Route::get('/user/attribute/edit/{attribute_id}',AdminEditAttributeComponent::class)->name('user.editattribute');


   });
           
   //for admin

 Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/orders',UserOrdersComponent::class)->name('admin.orders');
    Route::get('/admin/review/{order_item_id}',UserReviewComponent::class)->name('admin.review');
    Route::get('/admin/profile',UserProfileComponent::class)->name('admin.profile');

    Route::get('/admin/orders/{order_id}',UserOrderDetailsComponent::class)->name('admin.orderdetails');
//     Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.addcategory');
//     Route::get('/admin/category/edit/{category_slug}',AdminEditCategoryComponent::class)->name('admin.editcategory');
//     Route::get('/admin/products}',AdminProductComponent::class)->name('admin.product');
//     Route::get('/admin/product/add',AdminAddProductComponent::class)->name('admin.addproduct');
//     Route::get('/admin/product/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.editproduct');

//     Route::get('/admin/slider',AdminHomeSliderComponent::class)->name('admin.homeslider');
//     Route::get('/admin/slider/add',AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
//     Route::get('/admin/slider/edit/{slide_id}',AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');
 });
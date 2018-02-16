<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\User;
use App\Order;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', function () {

    $product = new \App\Product();
    $product->sku = "SK166";
    $product->item_description = "Item description 66";
    $product->unit_price = 13.00;
    $product->case_price = 23.00;
    $product->save();
    return "Product ID:".$product->id;
});
Route::get("/update-product",function(){
    $product = \App\Product::find(14);
    $product->sku = "SKU 15";
    $product->item_description = "Item description 99";
    $product->save();
});

Route::get('/add-user', function () {
    $user = User::create([
        'name' => 'Arslan',
        'email' => 'marslan.ali@gmail.com',
        'remember_token' => 'abc',
        'first_name' => 'Ali'
    ]);

    return $user->id;
});
Route::get('/add-order', function () {


    $user = User::where('email', 'marslan.ali@gmail.com')->first();
    $order = new Order();
    $order->date_ordered = \Carbon\Carbon::now();
    $order->status_id = App\Order::STATUS_DRAFT;
    $order->user()->associate($user);
    $lineItems = [];

    $product1 = \App\Product::find(1);
    $item1 = new \App\OrderContent();
    $item1->qty = 10;
    $item1->product()->associate($product1);
    $item1->price = $product1->unit_price;
    $item1->total = $product1->unit_price * $item1->qty;
    $lineItems[] = $item1;

    $product2 = \App\Product::find(2);
    $item2 = new \App\OrderContent();
    $item2->qty = 10;
    $item2->product()->associate($product2);
    $item2->price = $product2->unit_price;
    $item2->total = $product2->unit_price * $item2->qty;

    $lineItems[] = $item2;
    $order->save();
    $order->contents()->saveMany($lineItems);
    $order->save();

    return $order->id;

});
Route::get('/orders', function () {
    $order = Order::find(1);
    $orderContent = $order->contents();
    $user = $order->user()->get();

    dd($orderContent);
});
Route::get('/user/orders', function () {
    $user = User::find(1);
    $userOrders = [];
    $Orders = $user->orders()->get();

    foreach($Orders as $order){
        $orderData["order"][]=$order;
        $orderData['orderContents'][]=$order->contents()->get();
        $orderData['orderUser'][]=$user;
        $userOrders[] = $orderData;
    }

   // $userOrderContents = $userOrders->first()->contents()->get()->first();

    dd($userOrders);

});
Route::get("/product/add-category",function(){
    $product = \App\Product::find(10);
    $product->categories()->attach([1,2]);
});
Route::get("/category/add-products",function(){
    $category = \App\Category::find(2);
    $category->products()->attach([1,2]);
});
Route::get("/category-product",function(){

    $product = \App\Product::find(10);

    dd($product->categories()->where('category_name','C2')->orderBy('id', 'desc')->get());
});


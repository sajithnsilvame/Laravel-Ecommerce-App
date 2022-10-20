<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\SuperAdminController;

use App\Http\Controllers\StripePaymentController;


Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// redirect user
Route::get('/redirect', [HomeController::class, 'redirect'])
->middleware('auth', 'verified');

// super admin dashboard 
Route::get('/super-admin-dashboard', [HomeController::class, 'super_admin_dashboard']);

// admin dashboard
Route::get('/admin-dashboard', [HomeController::class, 'admin_dashboard']);

// Admin ================> ================> ================>
        // -- Admin --> category 
Route::get('/view-category', [AdminController::class, 'view_category']);

Route::post('/add-category', [AdminController::class, 'add_category']);

Route::get('/delete-category/{id}', [AdminController::class, 'delete_category']);

        // -- Admin --> Products 
Route::get('/show-products', [AdminController::class, 'show_products']);

        // add product page
Route::get('/add-products', [AdminController::class, 'go_add_products']);

Route::post('/add_product', [AdminController::class, 'add_a_product']);

Route::get('/delete-product/{id}', [AdminController::class, 'delete_product']);

        // edit product page
Route::get('/edit-product/{id}', [AdminController::class, 'edit_product']);

Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);

        // orders
Route::get('/orders', [AdminController::class, 'orders']);  
        // mark as delivered the order
Route::get('/mark-as-delivered/{id}', [AdminController::class, 'mark_as_delivered']);

        // print invoices
Route::get('/print-pdf/{id}', [AdminController::class, 'print_PDF']);        

        // search orders
Route::get('/search-orders', [AdminController::class, 'search_orders']);        


// #super admin =================> ================> ================>
        // go to register admin page
Route::get('/create-admin', [SuperAdminController::class, 'create_admin']);
        // create a admin
Route::post('/register-admin', [SuperAdminController::class, 'register_admin']);
        // show admin list
Route::get('/show-admins', [SuperAdminController::class, 'show_admins']);
        // remove a admin
Route::get('/remove-admin/{id}', [SuperAdminController::class, 'remove_admin']);
        // show all users
Route::get('/show-all-users', [SuperAdminController::class, 'show_all_users']);

// User interface activities ================> ================> ================>

        // product details ===> ===> ===> ===> ===> ===>
Route::get('/product-details/{id}', [HomeController::class, 'product_details']);

        // Add to cart ===> ===> ===> ===> ===> ===>
Route::post('/add-cart/{id}', [HomeController::class, 'add_cart']);

        // show products in cart ===> ===> ===> ===> ===> ===>
Route::get('/products-in-cart', [HomeController::class, 'show_products_in_cart']);

        // remove product from cart ===> ===> ===> ===> ===> ===>
Route::get('/remove-product-from-cart/{id}', 
[HomeController::class, 'remove_product_from_cart']);

        // cash on deliver ===> ===> ===> ===> ===> ===>
Route::get('/cash-on-delivery', [HomeController::class, 'cash_on_delivery']);
        // place the order
Route::post('/confirm-order', [HomeController::class, 'confirm_order']);

        // card payment ===> ===> ===> ===> ===> ===>
Route::get('/card-payment/{total_price}', [HomeController::class, 'card_payment']);
        // place the order
Route::post('stripe/{total_price}', [HomeController::class, 'stripePost'])->name('stripe.post');

        // User's order (my orders) ===> ===> ===> ===> ===> ===>
Route::get('/my-orders', [HomeController::class, 'my_orders']);

        // cancel orders ===> ===> ===> ===> ===> ===>
Route::get('/cancel-order/{id}', [HomeController::class, 'cancel_order']); 

        // search products ===> ===> ===> ===> ===> ===>
Route::get('/search-products', [HomeController::class, 'search_products_by_category']);     
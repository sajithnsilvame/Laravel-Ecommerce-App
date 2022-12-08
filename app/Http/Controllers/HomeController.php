<?php

namespace App\Http\Controllers;

use Stripe;

use Session;

use App\Models\Cart;

use App\Models\User;

use App\Models\Order;

use App\Models\Product;

use App\Models\Hands_on_orders;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller{
    // '/'
    public function index(){
        
        $productList = Product::paginate(9);
        return view('userHome.userIndex', compact('productList'));
    }
    // product page
    public function product_page(){
        $productList = Product::paginate(9);
        return view('userHome.pages.products_page', compact('productList'));
    }
    // admin dashboard
    public function admin_dashboard(){
        if(Auth::id()){

            $products = Product::all()->count();
            $orders = Order::all()->count();
            $customers = DB::table('users')->where('usertype', 0)->count();
            $order = Order::all();
            $total_revenue = 0;

            foreach ($order as $order) {
                $total_revenue = $total_revenue + $order->price;
            }

            $delivered_orders = DB::table('orders')->where('delivery_status', 'Delivered')->count();
            $processing_orders = DB::table('orders')->where('delivery_status', 'processing')->count();
            return view(
                'admin.adminIndex',
                compact(
                    'products',
                    'orders',
                    'customers',
                    'total_revenue',
                    'delivered_orders',
                    'processing_orders'
                )
            );
        }
        else{
            return redirect('login');
        }
            
    }
    // super admin dashboard
    public function super_admin_dashboard(){   
        if(Auth::id()){

            $products = Product::all()->count();
            $orders = Order::all()->count();
            $customers = DB::table('users')->where('usertype', 0)->count();
            $deliver_boys = DB::table('users')->where('usertype', 3)->count();
            $order = Order::all();
            $total_revenue = 0;

            foreach ($order as $order) {
                $total_revenue = $total_revenue + $order->price;
            }
            $delivered_orders = DB::table('orders')->where('delivery_status', 'Delivered')->count();
            $processing_orders = DB::table('orders')->where('delivery_status', 'processing')->count();
            return view(
                'superadmin.superadminIndex',
                compact(
                    'products',
                    'orders',
                    'customers',
                    'total_revenue',
                    'delivered_orders',
                    'processing_orders',
                    'deliver_boys'
                )
            );
            return view('superadmin.superadminIndex');
        }
        else{
            return redirect('login');
        }
        
    }
    // deliver boy dashboard
    public function deliver_boy_dashboard(){
        if (Auth::id()) {
            $ordersToDeliver = DB::table('hands_on_orders')->where('deliver_status', 'processing')->count();
            return view('deliver_boy.index', compact('ordersToDeliver'));
        } else {
            return redirect('login');
        }
    }

    // redirect user
    public function redirect(){
        if(Auth::id()){

            $usertype = Auth::User()->usertype;

            if ($usertype == '2') {
                $products = Product::all()->count();
                $orders = Order::all()->count();
                $customers = DB::table('users')->where('usertype', 0)->count();
                $deliver_boys = DB::table('users')->where('usertype', 3)->count();
                $order = Order::all();
                $total_revenue = 0;

                foreach ($order as $order) {
                    $total_revenue = $total_revenue + $order->price;
                }
                $delivered_orders = DB::table('orders')->where('delivery_status', 'Delivered')->count();
                $processing_orders = DB::table('orders')->where('delivery_status', 'processing')->count();
                return view(
                    'superadmin.superadminIndex',
                    compact(
                        'products',
                        'orders',
                        'customers',
                        'total_revenue',
                        'delivered_orders',
                        'processing_orders',
                        'deliver_boys'
                    )
                );
                return view('superadmin.superadminIndex');
            } 
            elseif ($usertype == '1') {

                $products = Product::all()->count();
                $orders = Order::all()->count();
                $customers = DB::table('users')->where('usertype', 0)->count();
                $order = Order::all();
                $total_revenue = 0;
                
                foreach($order as $order){
                    $total_revenue = $total_revenue + $order->price;
                }
                $delivered_orders = DB::table('orders')->where('delivery_status', 'Delivered')->count();
                $processing_orders = DB::table('orders')->where('delivery_status', 'processing')->count();
                return view('admin.adminIndex', 
                compact('products','orders','customers', 'total_revenue', 
                'delivered_orders', 'processing_orders'));
            } 
            elseif($usertype == '3'){
                $ordersToDeliver = DB::table('hands_on_orders')->where('deliver_status', 'processing')->count();
                return view('deliver_boy.index',compact('ordersToDeliver'));
            }
            else {
                $productList = Product::paginate(9);
                return view('userHome.userIndex', compact('productList'));
            }
        }else{
            return redirect('login');
        }
        
    }

    // product details page
    public function product_details($id){

        $product = Product::find($id);
        $productList = Product::paginate(9);
        
        return view('userhome.components.productDetailPage', compact('product', 'productList'));
    }

    // add to cart
    public function add_cart(Request $request, $id){

        if(Auth::id()){

            $user = Auth::User();
            $userID = $user->id;
            $product = Product::find($id);
            $cart = new Cart;

            $exist_product_id = Cart::where('product_id','=',$id)->where('user_id','=', $userID)->get('id')->first();

            if($exist_product_id){

                $cart = Cart::find($exist_product_id)->first();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;

                if ($product->discount_price != null) {

                    $cart->price = $product->discount_price * $cart->quantity;
                } else {

                    $cart->price = $product->price * $cart->quantity;
                }

                $cart->save();
                return redirect()->back()->with('message', 'Product added to the cart');
            }
            else{

                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;
                $cart->product_title = $product->title;

                /*if there is discont price, it will add to the cart. 
            otherwise price will add to the cart */

                if ($product->discount_price != null) {

                    $cart->price = $product->discount_price * $request->quantity;
                } else {

                    $cart->price = $product->price * $request->quantity;
                }


                $cart->image = $product->image;
                $cart->product_id = $product->id;
                $cart->size = $request->sizes;
                $cart->quantity = $request->quantity;

                $cart->save();

                return redirect()->back()->with('message','Product added to the cart');
            }
            
        }

        else{

            return redirect('login');
        }
    }

    // show products in cart

    public function show_products_in_cart(){

        if(Auth::id())
        {
            $id = Auth::User()->id;
            $cart = cart::where('user_id', '=', $id)->get();

            return view('userhome.pages.cart', compact('cart'));
        }
        else
        {
            return redirect('login');
        }
         
    }

    // remove product from cart

    public function remove_product_from_cart($id){
        $product_id_from_cart = Cart::find($id);

        $product_id_from_cart-> delete();

        return redirect()->back();
    }

    // cash on deliver

    public function cash_on_delivery(){

        $user = Auth::User();
        return view('userhome.components.cashOnDelivery', compact('user'));
    }

    public function confirm_order(Request $request){

        $user = Auth::User();
        $userId = $user->id;
        $data = Cart::where('user_id', '=', $userId)->get();

        foreach($data as $data){

            $order = new Order;

            $order->name = $request->name;
            $order->email = $request->email;
            $order->phone = $request->contactNumber;
            $order->address = $request->deliverAddress;
            $order->additional = $request->additional;
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->size = $data->size;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';

            $order->save();

            // after the order cart will be clear..!!
            $cart_id = $data->id;
            $cart = Cart::find($cart_id);

            $cart->delete();

            
        }
        Alert::class::success('We have Received Your Order. We will connect with you soon');
        return redirect()->back();
    }

    // card payment

    public function card_payment($total_price){

        $user = Auth::User();
        $userId = $user->id;
        $cart = Cart::find($userId);
        return view('userhome.components.cardPayment', compact('user', 'total_price', 'cart'));
    }

    public function stripePost(Request $request, $total_price){


        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $total_price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Payment from customer"
        ]);

        
        $user = Auth::User();
        $userId = $user->id;
        $data = Cart::where('user_id', '=', $userId)->get();

        foreach ($data as $data) {

            $order = new Order;

            $order->name = $request->name;
            $order->email = $request->email;
            $order->phone = $request->contactNumber;
            $order->address = $request->deliverAddress;
            $order->additional = $request->additional;
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->size = $data->size;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'Paid';
            $order->delivery_status = 'processing';

            
            $order->save();

            // after the order cart will be clear..!!
            $cart_id = $data->id;
            $cart = Cart::find($cart_id);

            $cart->delete();
        }
        Alert::class::success('Payment is Successful', 
        'Thank you for purchasing your item will be delivered as soon as possible!');

        return redirect()->back();
    }

    public function my_orders(){
        if(Auth::id()){
            $user = Auth::User();
            $userId = $user->id;
            $orders = Order::where('user_id', '=', $userId)->get();
            return view('userHome.pages.orders', compact('orders'));
        }
        else{
            return redirect('login');
        }
    }

    public function cancel_order($id){
        $order = Order::find($id);
        if($order->delivery_status == 'processing'){

            $order->delete();
            return redirect()->back()->with('message', 'order is canceled successfully');
        }
        else{
            return redirect()->back()->with('message', 'sorry! this order can not be cancel because order has already delivered');
        }
        
    }

    // search products by categories
    public function search_products_by_category(Request $request){
        $data = $request->search;
        $productList = product::where('category', 'LIKE', "%$data%")->
        orwhere('description', 'LIKE', "%$data%")->paginate(9);

        return view('userHome.userIndex', compact('productList'));
    }

    public function search_products_in_product_page(Request $request){
        
        $product = $request->search;
        $productList = product::where('category', 'LIKE', "%$product%")->
        orwhere('description', 'LIKE', "%$product%")->paginate(9);
        return view('userHome.pages.products_page', compact('productList'));
    }
    
}

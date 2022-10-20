<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;

use RealRashid\SweetAlert\Facades\Alert;

use Session;

use Stripe;


class HomeController extends Controller
{
    // '/'
    public function index(){
        
        $productList = Product::paginate(9);
        return view('userHome.userIndex', compact('productList'));
    }
    // admin dashboard
    public function admin_dashboard(){
        if(Auth::id()){
            return view('admin.adminIndex');
        }
        else{
            return redirect('login');
        }
            
    }
    // super admin dashboard
    public function super_admin_dashboard()
    {   
        if(Auth::id()){
            return view('superadmin.superAdminIndex');
        }
        else{
            return redirect('login');
        }
        
    }
    // redirect user
    public function redirect(){
        if(Auth::id()){

            $usertype = Auth::User()->usertype;

            if ($usertype == '2') {

                return view('superadmin.superadminIndex');
            } elseif ($usertype == '1') {

                return view('admin.adminIndex');
            } else {

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
        
        return view('userhome.productDetailPage', compact('product', 'productList'));
    }

    // add to cart
    public function add_cart(Request $request, $id){

        if(Auth::id()){

            $user = Auth::User();
            $product = Product::find($id);
            $cart = new Cart;

            $cart-> name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;

            

            /*if there is discont price, it will add to the cart. 
            otherwise price will add to the cart */ 

            if($product->discount_price != null){

                $cart->price = $product->discount_price * $request->quantity;
            }
            else{

                $cart->price = $product->price * $request->quantity;
            }


            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back();
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

            return view('userhome.cart', compact('cart'));
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
        return view('userhome.cashOnDelivery', compact('user'));
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

    public function card_payment($total_price)
    {

        $user = Auth::User();
        return view('userhome.cardPayment', compact('user', 'total_price'));
    }

    public function stripePost(Request $request, $total_price)
    {


        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $total_price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Payment from customer"
        ]);

        // Session::flash('success', 'Payment successful!');
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
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'paid';
            $order->delivery_status = 'processing';

            $order->save();

            // after the order cart will be clear..!!
            $cart_id = $data->id;
            $cart = Cart::find($cart_id);

            $cart->delete();
        }
        Alert::class::success('Payment is Successful', 
        'Thank you for purchasing your item will be delivered as soon as possible!');

        return back();
    }

    public function my_orders(){
        $user = Auth::User();
        $userId = $user->id;
        $orders = Order::where('user_id', '=', $userId)->get();

        
        return view('userHome.orders', compact('orders'));
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
    
}

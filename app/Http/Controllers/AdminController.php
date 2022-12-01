<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Order;

use App\Models\Product;

use App\Models\Category;

use Illuminate\Http\Request;

use App\Models\Hands_on_orders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class AdminController extends Controller
{   
    
    // category => => => => => => => => => => => => => => => =>
    public function view_category(){
        if(Auth::id()){
            $data = Category::all();
            return view('admin.pages.category', compact('data'));
        }
        else{
            return redirect('login');
        }
    }

    public function add_category(Request $request){
        if(Auth::id()){
            $data = new Category();

            $data->category_name = $request->category;

            $data->save();
            return redirect()->back()->with('message', 'Category Added Successfully');
        }
        else{
            return redirect('login');
        }
    }

    public function delete_category($id){
        if(Auth::id()){
            $data = Category::find($id);

            $data->delete();

            return redirect()->back()->with('message', 'Category was Deleted');
        }
        else{
            return redirect('login');
        }
    }

    // products => => => => => => => => => => => => => => => =>

    public function show_products(){
        
        if(Auth::id()){
            $listItem = Product::all();
            return view('admin.pages.products', compact('listItem'));
        }
        else{
            return redirect('login');
        }
    }
            // products  add view
    public function go_add_products(){
        if(Auth::id()){
            $category = Category::all();
            return view('admin.pages.addProducts', compact('category'));
        }
        else{
            return redirect('login');
        }
        
    }
            // add a specific product
    public function add_a_product(Request $request){
        if(Auth::id()){

            $productData = new Product;

            $productData->title = $request->title;
            $productData->description = $request->description;
            $productData->category = $request->category;
            $productData->quantity = $request->quantity;
            $productData->price = $request->price;
            $productData->discount_price = $request->discount_price;

            $image = $request->image;
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product_img', $image_name);
            $productData->image = $image_name;

            $productData->save();

            return redirect()->back()->with('message', 'Product is added successfully');
        }
        else{
            return redirect('login');
        }
        

    }
            // delete a specific product
    public function delete_product($id){

        if(Auth::id()){
            $product = Product::find($id);

            $product->delete();

            return redirect()->back()->with('message', 'product is deleted successfully');
        }
        else{
            return redirect('login');
        }
    }
            // update a specific product
    public function edit_product($id){

        if(Auth::id()){
            $category = Category::all();

            $product = Product::find($id);

            return view('admin.pages.editProduct', compact('product', 'category'));
        }
        else{
            return redirect('login');
        }
    }

    public function update_product_confirm(Request $request, $id){

        if(Auth::id()){

            $update_product_data = Product::find($id);

            $update_product_data->title = $request->title;
            $update_product_data->description = $request->description;
            $update_product_data->price = $request->price;
            $update_product_data->discount_price = $request->discont_price;
            $update_product_data->quantity = $request->quantity;
            $update_product_data->category = $request->category;

            $image = $request->image;
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product_img', $image_name);
            $update_product_data->image = $image_name;

            $update_product_data->save();

            return redirect()->back()->with('message', 'product is updated successfully');
        }
        else{
            return redirect('login');
        }
    }

    // orders => => => => => => => => => => => => => => => =>
    public function orders(){

        if(Auth::id()){
            $order = Order::all();
            return view('admin.pages.orders', compact('order'));
        }
        else{
            return redirect('login');
        }
    }

    // search orders
    public function search_orders(Request $request){
        if(Auth::id()){
            $data = $request->search;
            $order = Order::where('id', 'LIKE', "%$data%")->get();
            return view('admin.pages.orders', compact('order'));
        }
        else{
            return redirect('login');
        }
    }

    
    // Deliver Boy
    public function deliver_boy(){
        if(Auth::id()){
            return view('admin.pages.deliver-boy');
        }
        else{
            return redirect('login');
        }
    }

    public function add_deliver_boy(Request $req){
        if(Auth::id()){
            $deliverBoy = new User();
            $req->validate([
                'name' => 'required',
                'email' => 'required | email | unique:users',
                'password' => 'required'
            ]);

            $deliverBoy->name = $req->name;
            $deliverBoy->phone = $req->phone;
            $deliverBoy->address = $req->address;
            $deliverBoy->email = $req->email;
            $deliverBoy->password = bcrypt($req->password);
            $deliverBoy->usertype = '3';

            $deliverBoy->save();

            return redirect()->back()->with('message', 'Deliver boy registration is successful');

        }
        else{
            return redirect('login');
        }
    }

    public function show_deliver_boys(){
        if(Auth::id()){
            $deliver_boys = DB::table('users')->where('usertype', 3)->get();
            return view('admin.pages.show_deli_boys', compact('deliver_boys'));
        }
        else{
            return redirect('login');
        }
    }

    public function delete_deliver_boy($id){
        if(Auth::id()){
            $deliverBoy = User::find($id);
            $deliverBoy->delete();
            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }

    // hand over the order
    public function hand_on_order($id){
        if (Auth::id()) {
            $order = Order::find($id);
            $hand_on_order = new Hands_on_orders();

            $hand_on_order->order_id = $order->id;
            $hand_on_order->name = $order->name;
            $hand_on_order->phone = $order->phone;
            $hand_on_order->address = $order->address;
            $hand_on_order->amount = $order->price;
            $hand_on_order->payment_status = $order->payment_status;
            $hand_on_order->deliver_status = $order->delivery_status;

            $order->hands_on = '1';

            $hand_on_order->save();
            $order->save();

            return redirect()->back()->with('message', 'Order is ready to ship & successfully hand over to deliver section!');
        } else {
            return redirect('login');
        }
    }

    // print invoices 
    public function print_PDF($id){
        if (Auth::id()) {
            $order_Details = Order::find($id);
            $pdf = PDF::loadView('admin.invoice_pdf.pdf', compact('order_Details'));
            return $pdf->download('order_details.pdf');
        } else {
            return redirect('login');
        }
    }

}

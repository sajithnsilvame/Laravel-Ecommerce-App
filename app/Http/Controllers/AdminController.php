<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Category;

use App\Models\Product;

use App\Models\Order;

use Barryvdh\DomPDF\Facade\Pdf as PDF;


class AdminController extends Controller
{   
    
    // category => => => => => => => => => => => => => => => =>
    public function view_category(){
        if(Auth::id()){
            $data = Category::all();
            return view('admin.category', compact('data'));
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
            return view('admin.products', compact('listItem'));
        }
        else{
            return redirect('login');
        }
    }
            // products  add view
    public function go_add_products(){
        if(Auth::id()){
            $category = Category::all();
            return view('admin.addProducts', compact('category'));
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

    public function edit_product($id){

        if(Auth::id()){
            $category = Category::all();

            $product = Product::find($id);

            return view('admin.editProduct', compact('product', 'category'));
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
            return view('admin.orders', compact('order'));
        }
        else{
            return redirect('login');
        }
    }

    public function mark_as_delivered($id){

        if(Auth::id()){
            $order = Order::find($id);

            if($order->payment_status == 'cash on delivery'){
                $order->payment_status = 'Payment Received';
            }

            $order->delivery_status = 'Delivered';
            $order->save();

            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }

    // search orders
    public function search_orders(Request $request){
        $data = $request->search;
        $order = Order::where('id', 'LIKE', "%$data%")->get();
        return view('admin.orders', compact('order'));
    }

    // print invoices 
    public function print_PDF($id){
        $order_Details = Order::find($id);
        $pdf = PDF::loadView('admin.pdf', compact('order_Details'));
        return $pdf->download('order_details.pdf');
    }

}

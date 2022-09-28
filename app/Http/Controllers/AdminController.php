<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\Order;

class AdminController extends Controller
{   
    
    // category => => => => => => => => => => => => => => => =>
    public function view_category(){
        $data = Category::all();
        return view('admin.category', compact('data') );
    }

    public function add_category(Request $request){
        $data = new Category();

        $data->category_name = $request->category;

        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function delete_category($id){
        $data = Category::find($id);

        $data->delete();
        
        return redirect()->back()->with('message', 'Category was Deleted');
    }

    // products => => => => => => => => => => => => => => => =>

    public function show_products(){
        $productList = Product::all();
        return view('admin.products', compact('productList'));
    }
            // products  add view
    public function go_add_products(){

        $category = Category::all();
        return view('admin.addProducts', compact('category'));
    }
            // add a specific product
    public function add_a_product(Request $request){

        $productData = new Product;

        $productData-> title = $request->title;
        $productData-> description = $request->description;
        $productData-> category = $request->category;
        $productData-> quantity = $request->quantity;
        $productData-> price = $request->price;
        $productData-> discount_price = $request->discount_price;

        $image = $request->image;
        $image_name = time(). '.'.$image->getClientOriginalExtension();
        $request->image->move('product_img',$image_name);
        $productData->image = $image_name;

        $productData->save();

        return redirect()->back()->with('message', 'Product is added successfully');

    }

    public function delete_product($id){

        $product = Product::find($id);

        $product->delete();

        return redirect()->back()->with('message', 'product is deleted successfully');
    }

    public function edit_product($id){

        $category = Category::all();

        $product = Product::find($id);

        return view('admin.editProduct', compact('product', 'category'));
    }

    public function update_product_confirm(Request $request, $id){

        $update_product_data = Product::find($id);

        $update_product_data-> title = $request->title;
        $update_product_data->description = $request->description;
        $update_product_data->price = $request-> price;
        $update_product_data-> discount_price = $request->discont_price;
        $update_product_data-> quantity = $request->quantity;
        $update_product_data-> category = $request->category;

        $image = $request->image;
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $request->image-> move('product_img', $image_name);
        $update_product_data->image = $image_name;

        $update_product_data->save();

        return redirect()->back()->with('message', 'product is updated successfully');
    }

    // orders => => => => => => => => => => => => => => => =>

    public function orders(){

        $order = Order::all();
        return view('admin.orders', compact('order'));
    }

    public function mark_as_delivered($id){

        $order = Order::find($id);
        $order->delivery_status = 'Delivered';
        $order->save();

        return redirect()->back();
    }


}

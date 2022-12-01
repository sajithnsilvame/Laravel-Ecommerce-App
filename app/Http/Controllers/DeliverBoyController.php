<?php

namespace App\Http\Controllers;

use App\Models\Hands_on_orders;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use RealRashid\SweetAlert\Facades\Alert;

class DeliverBoyController extends Controller
{
    public function orders_to_deliver(){
        if(Auth::id()){
            $handsOnOrder = Hands_on_orders::all();
            return view('deliver_boy.pages.orders', compact('handsOnOrder'));
        }
        else{
            return redirect('login');
        }
    }

    public function mark_as_delivered($id)
    {

        if (Auth::id()) {
            $hands_on_order = Hands_on_orders::find($id);

            $orderId = $hands_on_order->order_id;

            $orderinfo = Order::where('id', '=', $orderId)->get()->first();

            

            if($hands_on_order->payment_status == 'cash on delivery')
            {

                $hands_on_order->payment_status = 'Payment Received';
                $orderinfo->payment_status = 'Payment Received';
            }


            $hands_on_order->deliver_status = 'Delivered';
            $orderinfo->delivery_status = 'Delivered';

                        $hands_on_order->save();
                        $orderinfo->save();
                        return redirect()->back();
        } 
        else {
            return redirect('login');
        }
    }

    
}

<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;
use Stripe;

class StripePayment extends Controller
{

    public function stripePay()
    {


        $line_items = [];
        $total = 0;
        $shipping_total = 0;
        $cart_products = Cart::where('user_id', Auth::id())
            ->whereHas('product', function ($query) {
                $query->where('quantity', '>', 0);
            })
            ->get();
        foreach ($cart_products as $cart_product) {
            $total += $cart_product->quantity * $cart_product->product->price;
            $shipping_total += $cart_product->shipping_cost;
            $line_items[] = [
                'price_data' => [
                    'currency' => 'pkr',
                    'product_data' => [
                        'name' => $cart_product->product->name,
                    ],
                    'unit_amount' => $cart_product->product->price * 100,
                ],
                'quantity' => $cart_product->quantity,
            ];
        }

        foreach ($cart_products as $cart_product) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'pkr',
                    'product_data' => [
                        'name' =>
                        $cart_product->product->name,
                        'description' => "shipping cost",
                    ],
                    'unit_amount' => $cart_product->shipping_cost * 100,
                ],
                'quantity' => 1,
            ];
        }


        $total_price = $total + $shipping_total;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = Stripe\Checkout\Session::create([
            'line_items'  => $line_items,
            'mode'        => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url'  => route('payment.fail'),
        ]);


        return redirect()->away($session->url);
    }

    public function paymentSuccess()
    {

        $cart_products = Cart::where('user_id', Auth::id())
            ->whereHas('product', function ($query) {
                $query->where('quantity', '>', 0);
            })
            ->get();

        foreach ($cart_products as $cart_product) {
            $order = new Order;
            $order->product_name = $cart_product->product->name;
            $order->store_name = $cart_product->product->store->name;
            $order->user_email = session()->get('checkout_email');
            $order->user_name = session()->get('checkout_name');
            $order->user_phone = session()->get('checkout_phone');
            $order->shipping_address = session()->get('checkout_address');
            $order->product_quantity = $cart_product->quantity;
            $order->product_total = $cart_product->subtotal;
            $order->shipping_total = $cart_product->shipping_cost;
            $order->distance = $cart_product->distance;
            $order->shipping_charg_perkm = session()->get('shipping_perkm');
            $order->total_price = $cart_product->total;
            $order->payment_status = 1;
            // $order->transaction_id = 0;

            $order->shipping_status = 0;
            $order->order_status = 0;
            $order->user_id = Auth::user()->id;


            //update start
            $order->store_id = $cart_product->product->store->id;


            //update end 


            $order->save();
            $cart_product->product->decrement('quantity', $cart_product->quantity);



            //update code start 
            /*
            $orderId = $order->id;
            $payment = new Payment();
            $payment->seller_id = $cart_product->product->store->seller_id;
            $payment->order_id = $orderId;

            $payment->save();
             */
            //end update code
        }

        Cart::where('user_id', Auth::id())
            ->whereHas('product', function ($query) {
                $query->where('quantity', '>', 0);
            })->delete();
        //  $transaction = new Transaction;





        return view("frontend.checkout.order-success");
    }
    public function paymentFail()
    {
        return "payment fail";
    }
}

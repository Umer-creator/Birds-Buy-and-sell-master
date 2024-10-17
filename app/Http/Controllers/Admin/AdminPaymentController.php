<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Store;
use App\Models\StoreTransaction;
use Illuminate\Support\Str;
use Stripe;


class AdminPaymentController extends Controller
{
    public function stores_payments()
    {
        $stores = Store::all();
        return view("admin.payment.view-payments", compact("stores"));
    }


    public function storeOrdersPayments($storeId)
    {
        if ($storeId) {
            $store = Store::find($storeId);
            $totalPayment = $store->calculateStoreTotalPayment($storeId);


            $storeProductPayments = $store->getStoreProductsPayments($store->id);


            return view("admin.payment.store-orders-payments", compact("storeProductPayments", "totalPayment", "storeId"));
        } else {
            return redirect()->back();
        }
    }




    public function transferMoney($storeId)
    {

        $line_items = [];
        $storeProductsPayments = Order::where("store_id", $storeId)
            ->where("order_status", 1)
            ->where("store_paid_status", 0)
            ->get();


        foreach ($storeProductsPayments as $storeProductPayment) {

            $line_items[] = [
                'price_data' => [
                    'currency' => 'pkr',
                    'product_data' => [
                        'name' => $storeProductPayment->product_name,
                    ],
                    'unit_amount' => $storeProductPayment->product_total * 100,
                ],
                'quantity' => 1,
            ];
        }

        foreach ($storeProductsPayments as $storeProductPayment) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'pkr',
                    'product_data' => [
                        'name' => $storeProductPayment->product_name,
                        'description' => "shipping cost",
                    ],
                    'unit_amount' => $storeProductPayment->shipping_total * 100,
                ],
                'quantity' => 1,
            ];
        }



        $store = Store::find($storeId);
        Stripe\Stripe::setApiKey($store->stripeSecretKey);
        // Stripe\Stripe::setApiKey("sk_test_51NMnl9J0Zz91VcqmFPzjn92Z5x8eMNPtHBEoPaYQ4GZdv0imCX7cG9f24Hl7S9921DMHkTerCjyJHlYGZArIkxch00eaoFpbmw");
        $session = Stripe\Checkout\Session::create([
            'line_items'  => $line_items,
            'mode'        => 'payment',
            'success_url' => route('store.payment.transfer.success', ['id' => $storeId]),
            'cancel_url'  => route('store.payment.transfer.fail'),
        ]);







        return redirect()->away($session->url);
    }

    public function StoreTransferPaymentSuccess($storeId)
    {
        $storeProductsPayments = Order::where("store_id", $storeId)
            ->where("order_status", 1)
            ->where("store_paid_status", 0)
            ->get();
        // Fetch the transaction details
        $store = Store::find($storeId);
        $totalOrders = $store->countTotalCompleteOrders($storeId);
        $totalPayment = $store->calculateStoreTotalPayment($storeId);
        // Create a new transaction record

        $transaction = new StoreTransaction();
        $transaction->payment_id = (string) Str::uuid();
        $transaction->stripeSecretKey = $store->stripeSecretKey;
        $transaction->store_id = $storeId; // Set the store_id value
        $transaction->total_amount = $totalPayment;
        $transaction->total_orders = $totalOrders;
        $transaction->transaction_date = now();
        $transaction->save();

        // Attach orders to the transaction
        $transaction->orders()->attach($storeProductsPayments->pluck('id')->toArray());
        $storeProductsPayments = Order::where('store_id', $storeId)
            ->where("order_status", 1)
            ->where('store_paid_status', 0)
            ->update(['store_paid_status' => 1]);
    }

    public function StoreTransferPaymentFail()
    {
        return redirect()->route("admin.view.store.payments");
    }


    //testiing

    public function listTransactions()
    {
        //for all stores transcations
        $transactions = StoreTransaction::all();

        // $transactions = StoreTransaction::where('store_id', $storeId)->get();
        return view('admin.payment.store-transactions-list', compact('transactions'));
    }



    public function viewTransaction($storeId, $transactionId)
    {
        $transaction = StoreTransaction::findOrFail($transactionId);

        $ordersTransations = $transaction->orders()->get();


        return view('admin.payment.store-transactions-view', compact('ordersTransations', "transaction"));
    }
}

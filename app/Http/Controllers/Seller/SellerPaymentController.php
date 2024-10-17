<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\StoreTransaction;
use Auth;
use Illuminate\Http\Request;

class SellerPaymentController extends Controller
{
    public function listTransactions()
    {
        //for all stores transcations

        $transactions = StoreTransaction::where('store_id', Auth::user()->store->id)->get();
        return view('seller.payment.store-transactions-list', compact('transactions'));
    }

    public function viewTransaction($transactionId)
    {
        $transaction = StoreTransaction::findOrFail($transactionId);

        $ordersTransations = $transaction->orders()->get();
        return view("seller.payment.store-transactions", compact('ordersTransations', "transaction"));
    }
}

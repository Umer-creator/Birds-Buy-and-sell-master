<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_id',
        'transaction_date',
        'stripeSecretKey'
    ];

    /**
     * The orders associated with the store transaction.
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_store_transaction', 'store_transaction_id', 'order_id');
    }


    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}

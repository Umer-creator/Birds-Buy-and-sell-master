<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStoreTransaction extends Model
{
    use HasFactory;
    protected $table = 'order_store_transaction';
    protected $primaryKey = null;
    public $incrementing = false;
}

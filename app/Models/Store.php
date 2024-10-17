<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

/**
 * App\Models\Store
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string|null $address
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $city
 * @property string|null $image
 * @property string|null $longitude
 * @property string|null $latitude
 * @property int $seller_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\StoreFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Store newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Store newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Store query()
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Store extends Model
{
    use HasFactory;
    protected $table = "stores";
    protected $fillable = [
        'name',
        'seller_id',
        'slug',
    ];


    //relations
    public function user()
    {
        return $this->hasOne(User::class, "id", "seller_id");
    }
    public function product()
    {
        return $this->hasMany(Product::class, "store_id", "id");
    }

    public function storeTransactions()
    {
        return $this->belongsToMany(StoreTransaction::class, 'order_store_transaction', 'order_id', 'store_transaction_id');
    }




    //helpers
    /*
    public function calculateStoreEarning($storeId)
    {
        $totalAmount = Order::where('store_id', $storeId)->sum('total_amount');
        return $totalAmount;
    }

    */

    public function calculateStoreTotalPayment($storeId)
    {
        $totalAmount = Order::where('store_id', $storeId)->where("order_status", 1)->where('store_paid_status', 0)->sum('total_price');
        return $totalAmount;
    }


    public function countStoreTotalOrders($storeId)
    {
        $totalOrders = Order::where('store_id', $storeId)->count('store_id');
        return $totalOrders;
    }
    public function countTotalCompleteOrders($storeId)
    {
        $totalCompleteOrders = Order::where('store_id', $storeId)->where("order_status", 1)->where("store_paid_status", 0)->count("order_status");
        return $totalCompleteOrders;
    }

    public function getStoreProductsPayments($storeId)
    {
        $storeProductsPayments = Order::where("store_id", $storeId)
            ->where("order_status", 1)
            ->where("store_paid_status", 0)
            ->get();
        return $storeProductsPayments;
    }
}

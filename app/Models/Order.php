<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property string $user_name
 * @property string $product_name
 * @property string $store_name
 * @property string $user_email
 * @property string $user_phone
 * @property string $shipping_address
 * @property int $product_quantity
 * @property int $product_total
 * @property int $shipping_total
 * @property string $distance
 * @property string $shipping_charg_perkm
 * @property int $total_price
 * @property int $payment_status
 * @property string|null $transaction_id
 * @property int $shipping_status
 * @property int $order_status
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereProductQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereProductTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingChargPerkm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShippingTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStoreName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserPhone($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //update
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $customer_id
 * @property int $shift_id
 * @property string $order_number
 * @property string $payment_type
 * @property float $discount
 * @property float $amount_paid
 * @property int $user_id
 * @property string|null $notes
 * @property string|null $delivery_date
 * @property string|null $completed_at
 * @property string $delivery_address
 * @property string $special_instructions
 * @property string $status
 * @property string $payment_status
 * @property int $is_delivery
 * @property string|null $delivery_fee
 * @property int $address_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAmountPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCompletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveryAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveryFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIsDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShiftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSpecialInstructions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OrderMeal> $mealOrders
 * @property-read int|null $meal_orders_count
 * @property int $order_confirmed
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderConfirmed($value)
 * @property-read Customer|null $customer
 * @property float $cost
 * @property-read mixed $total_price
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCost($value)
 * @property string $receipt_location
 * @property string|null $delivery_time
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveryTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereReceiptLocation($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Deduct> $deducts
 * @property-read int|null $deducts_count
 * @property int $whatsapp
 * @property float|null $dish_return_price
 * @property int $outside
 * @property string|null $car_palette
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCarPalette($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDishReturnPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOutside($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereWhatsapp($value)
 * @property int $outside_confirmed
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOutsideConfirmed($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    protected $with = ['mealOrders','customer','deducts'];
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;

    public function totalAmount()
    {
        return $this->mealOrders->reduce(function ($pre,$cur){
            return $pre + $cur->meal->price;
        },0);
    }
    public function orderMealsNames()
    {
        return $this->mealOrders->reduce(function ($prev,$curr){
           return $prev .' '.$curr->meal->name . ' x '.$curr->quantity;
        },'');
    }
    protected $appends = ['totalPrice'];
    public function getTotalPriceAttribute()
    {
        return $this->totalPrice();
    }
    public function totalPrice()
    {
        $total = 0;
        /** @var OrderMeal $mealOrder */
        foreach ($this->mealOrders as $mealOrder){
//                return ['$requestedMeal'=>$requestedMeal];
                $total += $mealOrder->totalPrice()  * $mealOrder->quantity; ;
        }
        $total+= $this->delivery_fee;
        return $total;
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function mealOrders()
    {
        return $this->hasMany(OrderMeal::class);
    }

    public function deducts()
    {
        return $this->hasMany(Deduct::class);
    }
}

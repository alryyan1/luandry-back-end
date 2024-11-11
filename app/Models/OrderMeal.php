<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $order_id
 * @property int $meal_id
 * @property string $status
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Meal $meal
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMeal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMeal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMeal query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMeal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMeal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMeal whereMealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMeal whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMeal whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMeal whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMeal whereUpdatedAt($value)
 * @property float $price
 * @property-read \App\Models\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|OrderMeal wherePrice($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RequestedChildMeal> $requestedChildMeals
 * @property-read int|null $requested_child_meals_count
 * @mixin \Eloquent
 */
class OrderMeal extends Model
{
    use HasFactory;
//    protected $table ='meal_orders';
    protected $with = ['meal','requestedChildMeals'];

    protected $appends=['totalPrice'];
    public function getTotalPriceAttribute()
    {
         return $this->totalPrice();
    }
    protected $guarded = ['id'];
    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function requestedChildMeals()
    {
         return $this->hasMany(RequestedChildMeal::class);
    }
    public function totalPrice()
    {
        $total = 0;
            foreach ($this->requestedChildMeals as $requestedMeal){
//                return ['$requestedMeal'=>$requestedMeal];
                $total += $requestedMeal->price ;
            }
        return $total;
    }
}

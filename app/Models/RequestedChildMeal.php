<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $order_meal_id
 * @property int $child_meal_id
 * @property int $quantity
 * @property float $price
 * @property-read \App\Models\ChildMeal $childMeal
 * @property-read \App\Models\OrderMeal $orderMeal
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedChildMeal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedChildMeal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedChildMeal query()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedChildMeal whereChildMealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedChildMeal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedChildMeal whereOrderMealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedChildMeal wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedChildMeal whereQuantity($value)
 * @mixin \Eloquent
 */
class RequestedChildMeal extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $with = ['childMeal'];
    use HasFactory;
    public function orderMeal()
    {
        return $this->belongsTo(OrderMeal::class);
    }

    public function childMeal(){
        return $this->belongsTo(ChildMeal::class);
    }
}

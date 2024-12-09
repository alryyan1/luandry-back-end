<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $child_meal_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $order_id
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereChildMealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Deduct extends Model
{
    protected $table = 'deducted_items';
    use HasFactory;
    protected $guarded = ['id'];
}

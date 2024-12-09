<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $cost_id
 * @property int $item_id
 * @property int $quantity
 * @property float $price
 * @property float $full_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cost $cost
 * @property-read \App\Models\Item $item
 * @method static \Illuminate\Database\Eloquent\Builder|CostItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CostItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CostItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|CostItem whereCostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostItem whereFullPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CostItem extends Model
{
    use HasFactory;

    protected $fillable = ['cost_id', 'item_id', 'price',  'quantity', 'full_price' ];

    public function cost()
    {
        return $this->belongsTo(Cost::class,'cost_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class,'item_id');
    }
}

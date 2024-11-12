<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

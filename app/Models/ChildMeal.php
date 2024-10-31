<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildMeal extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
}

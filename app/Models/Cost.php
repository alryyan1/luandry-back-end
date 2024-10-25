<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{

    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['user','costCategory'];
    public function user(){
        return $this->belongsTo(User::class,'user_cost');
    }
    public function costCategory(){
        return $this->belongsTo(CostCategory::class);
    }
}

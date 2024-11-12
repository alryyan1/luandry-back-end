<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int|null $user_cost
 * @property string|null $description
 * @property string|null $comment
 * @property int $amount
 * @property int|null $cost_category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CostCategory|null $costCategory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Cost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cost query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereCostCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereUserCost($value)
 * @mixin \Eloquent
 */
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

    public function costItem()
    {
        return $this->hasMany(CostItem::class,'cost_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
}

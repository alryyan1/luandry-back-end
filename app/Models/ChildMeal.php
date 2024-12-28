<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $meal_id
 * @property int $quantity
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float $price
 * @property string $people_count
 * @property string $weight
 * @property-read \App\Models\Meal $meal
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMeal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMeal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMeal query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMeal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMeal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMeal whereMealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMeal whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMeal wherePeopleCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMeal wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMeal whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMeal whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMeal whereWeight($value)
 * @property int $service_id
 * @property-read \App\Models\Service $service
 * @method static \Illuminate\Database\Eloquent\Builder|ChildMeal whereServiceId($value)
 * @mixin \Eloquent
 */
class ChildMeal extends Model
{
    protected $guarded = [];
    protected $with =['service'];
    use HasFactory;
    protected static function boot()
    {
        parent::boot();

        // Use the creating event to set the value before the model is saved
        static::creating(function ($model) {
            $model->price = $model->service->price;
        });

        // You could also use the created event (after saving)
        // static::created(function ($model) {
        //     $model->your_column_name = 'your_value';
        //     $model->save();
        // });
    }
    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
    public function service()
    {
         return $this->belongsTo(Service::class);
    }
}

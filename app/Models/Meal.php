<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property int|null $category_id
 * @property string|null $description
 * @property string|null $image
 * @property int $available
 * @property int|null $calories
 * @property int|null $prep_time
 * @property int|null $spice_level
 * @property int $is_vegan
 * @property int $is_gluten_free
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|Meal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Meal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Meal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereCalories($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereIsGlutenFree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereIsVegan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal wherePrepTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereSpiceLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereUpdatedAt($value)
 * @property string $people_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ChildMeal> $childMeals
 * @property-read int|null $child_meals_count
 * @method static \Illuminate\Database\Eloquent\Builder|Meal wherePeopleCount($value)
 * @mixin \Eloquent
 */
class Meal extends Model
{
    use HasFactory;
    protected $guarded =[];
//    protected $with = ['category'];
    protected $with = ['childMeals'];
    public $timestamps = false;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function childMeals()
    {
        return $this->hasMany(ChildMeal::class);
    }
}

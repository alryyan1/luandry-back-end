<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Meal> $meals
 * @property-read int|null $meals_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @property string $image_url
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImageUrl($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasFactory;
    public $timestamps =false;
    protected $with = ['meals'];
    public function meals()
    {
        return $this->hasMany(Meal::class);
    }
    protected $guarded =[];
}

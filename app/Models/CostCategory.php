<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|CostCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CostCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CostCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|CostCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostCategory whereName($value)
 * @mixin \Eloquent
 */
class CostCategory extends Model
{
    public $timestamps = false;
    protected $guarded =[];
    use HasFactory;
}

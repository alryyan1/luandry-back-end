<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereName($value)
 * @mixin \Eloquent
 */
class Service extends Model
{
    protected $guarded = [];
    protected $with = ['deposits','deducts'];
    protected $appends = ['inventory','sold'];
    use HasFactory;
    public $timestamps = false;

    public function deposits(){
        return $this->hasMany(Deposit::class);
    }
    public function deducts(){
        return $this->hasMany(Deduct::class);
    }
    public function inventory(){
        return $this->deposits()->sum('quantity');
    }
    public function sold(){
        return $this->deducts()->sum('quantity');
    }
    public function getInventoryAttribute(){
        return $this->inventory();
    }
    public function getSoldAttribute(){
        return $this->sold();
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property int $address_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereUpdatedAt($value)
 * @property string $address
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereAddress($value)
 * @property string $area
 * @property string $state
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereState($value)
 * @property int $is_store
 * @method static \Illuminate\Database\Eloquent\Builder|Customer whereIsStore($value)
 * @mixin \Eloquent
 */
class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];
}

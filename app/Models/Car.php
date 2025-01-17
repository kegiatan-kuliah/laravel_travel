<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use CrudTrait;
    protected $table = 'cars';

    protected $fillable = [
        'name','license_number','type','capacity','price_per_day','status'
    ];
}

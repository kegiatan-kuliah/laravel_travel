<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use CrudTrait;
    protected $table = 'drivers';

    protected $fillable = [
        'name','phone','license_number'
    ];
}

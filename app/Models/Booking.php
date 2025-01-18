<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use CrudTrait;
    protected $table = 'bookings';

    protected $fillable = [
        'booking_date','start_date','end_date','total_price','status','customer_id','car_id','driver_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function export($crud = false)
    {
        return '<a class="btn btn-primary" target="_blank" href="'.route('booking.export').'">Download PDF</a>';
    }
}

<?php

namespace App\Models;

use App\Models\BookingMdl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserHasBookingMdl extends Model
{
    protected $table = 'users_has_bookings';

    protected $primaryKey = 'id';

    protected $fillable = [
       'user_id','booking_id'
    ];

    protected $data = ['deleted_at'];
}
<?php

namespace App\Models;

use App\Models\User;
use App\Models\BookingMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'bills';

    protected $primaryKey = 'id';

    protected $fillable = [
        'bill_no', 'booking_id', 'user_id', 'total', 'materials', 'discount', 'subtotal', 'paid_amount', 'payment'
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function bookingWBill()
    {
        return $this->belongsTo(BookingMdl::class, 'booking_id');
    }
    /*
    =========================
    =========================
    */
    public function userWBill()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /*
    =========================
    =========================
    */
}

<?php

namespace App\Models;

use App\Models\User;
use App\Models\BillMdl;
use App\Models\ServiceMdl;
use App\Models\CleanerScheduleMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'booking';

    protected $primaryKey = 'id';

    protected $fillable = [
       'user_id','service_id','ref_no','address','cleaners_count','cleaners_assign','hours','days','months','start_date','end_date','start_time','end_time','hours_cost','days_cost','month_cost', 'material_cost','discount','total','status','payment','paid_amount','type'
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function userWBooking(){
        return $this->belongsTo(User::class,'user_id');
    }
    /*
    =========================
    =========================
    */
    public function serviceWBooking(){
        return $this->belongsTo(ServiceMdl::class, 'service_id');
    }
    /*
    =========================
    =========================
    */
    public function  usersHasBookings(){
        return $this->belongsToMany(User::class, 'users_has_bookings', 'booking_id', 'user_id');
    }
    /*
    =========================
    =========================
    */
    public function scheduleCleanerWBooking(){
        return $this->hasMany(CleanerScheduleMdl::class,'booking_id');
    }
    /*
    =========================
    =========================
    */
    public function billWBooking(){
        return $this->hasOne(BillMdl::class, 'booking_id');
    }
    /*
    =========================
    =========================
    */
}

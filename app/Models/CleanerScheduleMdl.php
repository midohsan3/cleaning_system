<?php

namespace App\Models;

use App\Models\User;
use App\Models\BookingMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CleanerScheduleMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'cleaners_schedule';

    protected $primaryKey = 'id';

    protected $fillable = [
       'user_id','start_job','end_job','type','description','leave_id','booking_id'
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function userWCleanerSchedule(){
        return $this->belongsTo(User::class, 'user_id');
    }
    /*
    =========================
    =========================
    */
    public function leaveWCleanersSchedule(){
        return $this->belongsTo(LeaveMdl::class, 'leave_id');
    }
    /*
    =========================
    =========================
    */
    public function bookingWCleanersSchedule(){
        return $this->belongsTo(BookingMdl::class, 'booking_id');
    }
    /*
    =========================
    =========================
    */
}
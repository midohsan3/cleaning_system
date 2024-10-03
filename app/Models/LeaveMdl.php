<?php

namespace App\Models;

use App\Models\User;
use App\Models\CleanerScheduleMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'leaves';

    protected $primaryKey = 'id';

    protected $fillable = [
       'user_id','type','start_at','end_at','details'
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function userWLeave(){
        return $this->belongsTo(User::class, 'user_id');
    }
    /*
    =========================
    =========================
    */
    public function cleanerScheduleWLeave(){
        return $this->hasMany(CleanerScheduleMdl::class, 'leave_id');
    }
    /*
    =========================
    =========================
    */
}

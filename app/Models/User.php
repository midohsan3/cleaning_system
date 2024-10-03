<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\BillMdl;
use App\Models\LeaveMdl;
use App\Models\SkillMdl;
use App\Models\BookingMdl;
use App\Models\CustomerMdl;
use App\Models\EmployeeMdl;
use App\Models\SkillHistoryMdl;
use App\Models\UserActivityMdl;
use App\Models\ServiceHistoryMdl;
use Laravel\Sanctum\HasApiTokens;
use App\Models\CleanerScheduleMdl;
use App\Models\EmployeeHistoryMdl;
use App\Models\NationalityHistoryMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email','phone',
        'password','role_name','photo','passport_copy','em_copy','status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function serviceHistoryWithUser(){
        return $this->hasMany(ServiceHistoryMdl::class, 'user_id');
    }
    /*
    =========================
    =========================
    */
    public function UserActivityWUser(){
        return $this->hasMany(UserActivityMdl::class, 'user_id');
    }
    /*
    =========================
    =========================
    */
   public function skillHistoryWUser(){
    return $this->hasMany(SkillHistoryMdl::class,'user-id');
   }
    /*
    =========================
    =========================
    */
   public function skills(){
    return $this->belongsToMany(SkillMdl::class, 'user_has_skills', 'user_id', 'skill_id');
   }
    /*
    =========================
    =========================
    */
   public function nationalityHistoryWUser(){
    return $this->hasMany(NationalityHistoryMdl::class,'user-id');
   }
    /*
    =========================
    =========================
    */
    public function employeeWUser(){
        return $this->hasOne(EmployeeMdl::class, 'user_id');
    }
    /*
    =========================
    =========================
    */
   public function customerWUser(){
    return $this->hasOne(CustomerMdl::class, 'user_id');
   }
    /*
    =========================
    =========================
    */
   public function employeeHistoryWUser(){
    return $this->hasMany(EmployeeHistoryMdl::class,'user-id');
   }
    /*
    =========================
    =========================
    */
   public function bookingWUser(){
    return $this->hasMany(BookingMdl::class, 'user_id');
   }
    /*
    =========================
    =========================
    */
    public function leaveWUser(){
        return $this->hasMany(LeaveMdl::class,'user_id');
    }
    /*
    =========================
    =========================
    */
    public function cleanerScheduleWUser(){
        return $this->hasMany(CleanerScheduleMdl::class, 'user_id');
    }
    /*
    =========================
    =========================
    */
    public function bookingsHasUsers(){
        return $this->belongsToMany(BookingMdl::class, 'users_has_bookings', 'user_id', 'booking_id');
       }
    /*
    =========================
    =========================
    */
    public function billWUser(){
        return $this->hasMany(BillMdl::class, 'user_id');
    }
    /*
    =========================
    =========================
    */
}

<?php

namespace App\Models;

use App\Models\User;
use App\Models\NationalityMdl;
use App\Models\EmployeeHistoryMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'employees';

    protected $primaryKey = 'id';

    protected $fillable = [
       'user_id','nationality_id','code','position','birth_date','join_date','gender','passport_no','passport_expired_date','em_id','em_id_expired_date','salary_bank_account','salary','overtime','allowance','status',''
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function userWEmployee(){
        return $this->belongsTo(User::class, 'user_id');
    }
    /*
    =========================
    =========================
    */
    public function nationalityWEmployee(){
        return $this->belongsTo(NationalityMdl::class,'nationality_id');
    }
    /*
    =========================
    =========================
    */
    public function employeeHistoryWEmployee(){
        return $this->hasMany(EmployeeHistoryMdl::class, 'employee_id');
    }
    /*
    =========================
    =========================
    */
}
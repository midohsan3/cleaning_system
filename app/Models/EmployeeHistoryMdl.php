<?php

namespace App\Models;

use App\Models\User;
use App\Models\EmployeeMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeHistoryMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'employees_history';

    protected $primaryKey = 'id';

    protected $fillable = [
       'employee_id','user_id','action'
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function employeeWEmployeeHistory(){
        return $this->belongsTo(EmployeeMdl::class, 'employee_id');
    }
    /*
    =========================
    =========================
    */
    public function userWEmployeeHistory(){
        return $this->belongsTo(User::class, 'user_id');
    }
    /*
    =========================
    =========================
    */

}

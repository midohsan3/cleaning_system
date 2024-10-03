<?php

namespace App\Models;


use App\Models\EmployeeMdl;
use App\Models\NationalityHistoryMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NationalityMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'nationalities';

    protected $primaryKey = 'id';

    protected $fillable = [
       'name_en','name_ar','status'
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function nationalityHistoryWNationality(){
        return $this->hasMany(NationalityHistoryMdl::class, 'nationality_id');
    }
    /*
    =========================
    =========================
    */
   public function employeeWNationality(){
    return $this->hasMany(EmployeeMdl::class,'nationality_id');
   }
    /*
    =========================
    =========================
    */
}

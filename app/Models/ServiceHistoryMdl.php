<?php

namespace App\Models;

use App\Models\User;
use App\Models\ServiceMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceHistoryMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'services_history';

    protected $primaryKey = 'id';

    protected $fillable = [
       'service_id','user_id','action'
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function serviceWServiceHistory(){
        return $this->belongsTo(ServiceMdl::class, 'service_id');
    }
    /*
    =========================
    =========================
    */
    public function userWServiceHistory(){
        return $this->belongsTo(User::class, 'user_id');
    }
    /*
    =========================
    =========================
    */

}
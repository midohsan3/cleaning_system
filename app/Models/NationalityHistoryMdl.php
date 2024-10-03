<?php

namespace App\Models;

use App\Models\User;
use App\Models\NationalityMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NationalityHistoryMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'nationalities_history';

    protected $primaryKey = 'id';

    protected $fillable = [
       'nationality_id','user_id','action'
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function nationalityWNationalityHistory(){
        return $this->belongsTo(NationalityMdl::class, 'nationality_id');
    }
    /*
    =========================
    =========================
    */
    public function userWNationalityHistory(){
        return $this->belongsTo(User::class, 'user_id');
    }
    /*
    =========================
    =========================
    */
}
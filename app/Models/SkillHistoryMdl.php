<?php

namespace App\Models;

use App\Models\User;
use App\Models\SkillMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SkillHistoryMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'skills_history';

    protected $primaryKey = 'id';

    protected $fillable = [
       'skill_id','user_id','action'
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function skillWSkillHistory(){
        return $this->belongsTo(SkillMdl::class, 'skill_id');
    }
    /*
    =========================
    =========================
    */
    public function userWSkillHistory(){
        return $this->belongsTo(User::class, 'user_id');
    }
    /*
    =========================
    =========================
    */
}
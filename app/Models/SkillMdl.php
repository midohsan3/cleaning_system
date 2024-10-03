<?php

namespace App\Models;

use App\Models\User;
use App\Models\SkillHistoryMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SkillMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'skills';

    protected $primaryKey = 'id';

    protected $fillable = [
       'name_en','name_ar'
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
   public function skillHistoryWSkill(){
    return $this->hasMany(SkillHistoryMdl::class, 'skill_id');
   }
    /*
    =========================
    =========================
    */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_has_skills', 'skill_id', 'user_id');
    }
    /*
    =========================
    =========================
    */
}

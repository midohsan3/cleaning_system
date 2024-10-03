<?php

namespace App\Models;

use App\Models\User;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'customers';

    protected $primaryKey = 'id';

    protected $fillable = [
       'user_id','added_by','last_booking','address','address_sec','notes'
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function userWCustomer(){
        return $this->belongsTo(User::class, 'user_id');
    }
    /*
    =========================
    =========================
    */
}
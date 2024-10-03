<?php

namespace App\Models;

use App\Models\BookingMdl;
use App\Models\ServiceHistoryMdl;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceMdl extends Model
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'services';

    protected $primaryKey = 'id';

    protected $fillable = [
       'name_en','name_ar','m_price','d_price','h_price','status'
    ];

    protected $data = ['deleted_at'];

    /*
    =========================
    RELATIONS
    =========================
    */
    public function serviceHistoryWithService(){
        return $this->hasMany(ServiceHistoryMdl::class, 'service_id');
    }
    /*
    =========================
    =========================
    */
    public function bookingWService(){
        return $this->hasMany(BookingMdl::class, 'service_id');
    }
    /*
    =========================
    =========================
    */
}
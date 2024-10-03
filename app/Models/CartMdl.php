<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartMdl extends Model
{
    use HasFactory;
    public $cServices = [];
    public $cleaners;
    public $hourCCount;
    public $hourCPrices;
    public $dayCCount;
    public $dayCPrices;
    public $monthCCount;
    public $monthCPrices;
    public $materialsCPrices;
    public $startDate ;
    public $startTime;
    public $totalCPrices;

    public function __construct($cart = null)
    {
        if ($cart) {
            $this->cServices             = $cart->cServices;
            $this->cleaners             = $cart->cleaners;
            $this->hourCCount       = $cart->hourCCount;
            $this->hourCPrices        = $cart->hourCPrices;
            $this->dayCCount         = $cart->dayCCount;
            $this->dayCPrices          = $cart->dayCPrices;
            $this->monthCCount     = $cart->monthCCount;
            $this->monthCPrices     = $cart->monthCPrices;
            $this->materialsCPrices = $cart->materialsCPrices;            
            $this->startDate              =  $cart->startDate;
            $this->startTime              =  $cart->startTime;
            $this->totalCPrices         = $cart->totalCPrices;
        } else {
            $this->cServices       = [];
            $this->cleaners             = 1;
            $this->hourCCount        = 0;
            $this->hourCPrices        = 0;
            $this->dayCCount          = 0;
            $this->dayCPrices          = 0;
            $this->monthCCount     = 0;
            $this->monthCPrices     = 0;
            $this->materialsCPrices = 0;
            $this->startDate = null;
            $this->startTime = null;
            $this->end_date = null;
            $this->totalCPrices         = 0;
        }
    }
    public function add(ServiceMdl $service,$cleaners=0,$hourCCount=0,$dayCCount=0,$monthCCount=0,$materialsCPrices=0,$startDate=null,$startTime=null)
    {
        $service::find($service);

        $cService = [
            'product'       => $service->id,
            'title_ar'        => $service->name_ar,
            'title_en'        => $service->name_en,
            'hour_price'   => $service->h_price,
            'day_price'     => $service->d_price,
            'month_price' => $service->m_price,
            'cleaners'       => $cleaners,
            'hours'          => $hourCCount,
            'days'            => $dayCCount,
            'months'       => $monthCCount,
            'total_hours' => $service->h_price*$hourCCount*$cleaners,
            'total_days'   => $service->d_price*$dayCCount*$cleaners,
            'total_months'  => $service->m_price*$monthCCount*$cleaners,
           // 'material'       => $materialsCPrices,
        ];
        $start_at = date('Y-m-d',strtotime($startDate)).' '.date('H:i:s',strtotime($startTime));
        $this->cServices[$service->id] = $cService;
            $this->cleaners               =$cleaners;
            $this->hourCCount        =$hourCCount;
            $this->hourCPrices        =$hourCCount*$service->h_price;
            $this->dayCCount          =  $dayCCount;
            $this->dayCPrices          =  $dayCCount*$service->d_price;
            $this->monthCCount     = $monthCCount;
            $this->monthCPrices     = $monthCCount*$service->m_price;
            $this->materialsCPrices    = $materialsCPrices;
            $this->startDate                 = Carbon::parse($start_at);
            if($hourCCount>0){
                $this->end_date               = Carbon::parse($start_at)->addHour($hourCCount);
            }elseif($dayCCount==1){
                $this->end_date               = Carbon::parse($start_at)->addHour(8);
            }elseif($dayCCount>1){
                $this->end_date               = Carbon::parse($start_at)->addDay($dayCCount);
            }elseif($monthCCount>0){
                $this->end_date               = Carbon::parse($start_at)->addMonth($monthCCount);
            }
            
            $this->totalCPrices          =$cService['total_hours']+ $cService['total_days']+$cService['total_months']+$materialsCPrices;

            /*
        if (!array_key_exists($service->id, $this->cService)) {
            $this->cServices[$service->id] = $cService;
            $this->hourCPrices        += $cService->hour_price;
            $this->dayCPrices          +=  $cService->day_price;
            $this->monthCPrices     += $cService->month_price;
            $this->materialsCPrices += $materialsCPrices;
            $this->totalCPrices         += 0;
            $this->totalCPrices += $item->price;
        } else {
            $this->totalQty += 1;
            $this->totalCPrices += $item->price;
        }

        $this->cServices[$item->id]['qty'] += 1;
        */
    }
}

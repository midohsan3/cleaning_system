<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\FrontBookingController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', [FrontController::class, 'index'])->name('front');
        Route::get('/service/housecare', [FrontController::class, 'houseCare'])->name('houseCare');
        Route::get('/service/maidtraining', [FrontController::class, 'maidTraining'])->name('maidTraning');
        Route::get('/service/eventhealth', [FrontController::class,'eventHealth'])->name('eventHealth');
        Route::get('/service/deepcleaning', [FrontController::class,'deepCleaning'])->name('deepCleaning');
        Route::get('/service/dogservant', [FrontController::class,'dogServant'])->name('dogservant');
        Route::get('/service/hotelchildcare', [FrontController::class,'hotelChildCare'])->name('hotelchildcare');
        Route::get('/service/officeboy', [FrontController::class,'officeBoy'])->name('officeboy');
        Route::get('/service/officecare', [FrontController::class,'officeCare'])->name('officecare');
        Route::get('/about', [FrontController::class, 'about'])->name('about');
        Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
    }
);


/*
==============================
BOOKING ROUTES
==============================
*/

Route::group(
    [
      'prefix' => LaravelLocalization::setLocale() . '/booking', 'namespace' => 'Admin',
      'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
  
     Route::get('/', [FrontBookingController::class, 'index'])->name('front.booking.index');
     
     Route::post('/get_service', [FrontBookingController::class, 'get_service'])->name('front.booking.get_service');
     
     Route::get('/step_2/srv_{service}_b_{book_method}', [FrontBookingController::class, 'step_tow'])->name('front.booking.step_tow');
     
     Route::post('/step_2/store', [FrontBookingController::class, 'step_tow_store'])->name('front.booking.step_tow_store');
     
     Route::post('/step_3/store', [FrontBookingController::class, 'step_three_store'])->name('front.booking.step_three_store');
     
     Route::get('/step_4', [FrontBookingController::class, 'step_four'])->name('front.booking.step_four');
     
     Route::post('/step_4/store', [FrontBookingController::class, 'step_four_store'])->name('front.booking.step_four_store');
     
     Route::get('/store_{user}', [FrontBookingController::class, 'store'])->name('front.booking.store');
     
     Route::get('/thank_you', [FrontBookingController::class, 'thank_you'])->name('front.booking.thank_you');
      
    }
  );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
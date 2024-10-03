<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\CashController;
use App\Http\Controllers\Admin\HireController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\LeaveController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\profileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserPhotoController;
use App\Http\Controllers\Admin\BookingBillController;
use App\Http\Controllers\Admin\NationalityController;
use App\Http\Controllers\Admin\CleanerScheduleController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

define('pageCount', 20);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get(LaravelLocalization::setLocale() . '/dashboard', function () {
  return view('dashboard');
})->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth', 'verified'])->name('dashboard');
/*
Route::group(
  [
    'prefix' => LaravelLocalization::setLocale() . '/dashboard', 'namespace' => 'Admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth', 'verified']
  ],

  function () {
    Route::get('/',)
    return view('dashboard')->name('dashboard');
    //Route::get('/', [AdminDashController::class, 'index'])->name('admin_dashboard.index');
  }
);

*/

/*
==============================
DASHBOARD ROUTES
==============================
*/

Route::group(
  [
    'prefix' => LaravelLocalization::setLocale() . '/dashboard', 'namespace' => 'Admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
  ],
  function () {

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');
  }
);

/*
==============================
PROFILE ROUTES
==============================
*/

Route::group(
  [
    'prefix' => LaravelLocalization::setLocale() . '/dashboard/profile', 'namespace' => 'Admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
  ],
  function () {

    Route::get('/', [profileController::class, 'index'])->name('admin.profile.index');

    Route::get('/change_password', [profileController::class, 'changePassword'])->name('admin.profile.change_password');

    Route::post('/update', [profileController::class, 'update'])->name('admin.profile.update');

    Route::post('/changePassword', [profileController::class, 'passwordUpdate'])->name('admin.profile.changePassword');
  }
);

/*
==============================
ROLES ROUTES
==============================
*/

Route::group(
  [
    'prefix' => LaravelLocalization::setLocale() . '/dashboard/permissions', 'namespace' => 'Admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
  ],
  function () {

    Route::get('/', [RoleController::class, 'index'])->name('admin.role.index');

    Route::get('/create', [RoleController::class, 'create'])->name('admin.role.create');

    Route::get('/edit_{id}', [RoleController::class, 'edit'])->name('admin.role.edit');

    Route::post('/delete', [RoleController::class, 'destroy'])->name('admin.role.delete');
  }
);
/*
==============================
SKILLS ROUTES
==============================
*/

Route::group(
  [
    'prefix' => LaravelLocalization::setLocale() . '/dashboard/services/skills', 'namespace' => 'Admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
  ],
  function () {

    Route::get('/', [SkillController::class, 'index'])->name('admin.skill.index');

    Route::get('/trashed', [SkillController::class, 'trashed'])->name('admin.skill.trashed');

    Route::get('/activity_{skill}', [SkillController::class, 'activity'])->name('admin.skill.activity');

    Route::get('/create', [SkillController::class, 'create'])->name('admin.skill.create');

    Route::post('/store', [SkillController::class, 'store'])->name('admin.skill.store');

    Route::get('/show_{skill}', [SkillController::class, 'show'])->name('admin.skill.show');

    Route::get('/edit_{skill}', [SkillController::class, 'edit'])->name('admin.skill.edit');

    Route::post('/update', [SkillController::class, 'update'])->name('admin.skill.update');

    Route::post('/destroy', [SkillController::class, 'destroy'])->name('admin.skill.destroy');

    Route::get('/restore_{skill}', [SkillController::class, 'restore'])->name('admin.skill.restore');

    Route::post('/d_destroy', [SkillController::class, 'ddestroy'])->name('admin.skill.ddestroy');
  }
);
/*
==============================
SERVICES ROUTES
==============================
*/

Route::group(
  [
    'prefix' => LaravelLocalization::setLocale() . '/dashboard/services', 'namespace' => 'Admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
  ],
  function () {

    Route::get('/', [ServiceController::class, 'index'])->name('admin.service.index');

    Route::get('/active', [ServiceController::class, 'active'])->name('admin.service.active');

    Route::get('/inactive', [ServiceController::class, 'inactive'])->name('admin.service.inactive');

    Route::get('/trashed', [ServiceController::class, 'trashed'])->name('admin.service.trashed');

    Route::get('/activity_{service}', [ServiceController::class, 'activity'])->name('admin.service.activity');

    Route::get('/create', [ServiceController::class, 'create'])->name('admin.service.create');

    Route::post('/store', [ServiceController::class, 'store'])->name('admin.service.store');

    Route::get('/show_{service}', [ServiceController::class, 'show'])->name('admin.service.show');

    Route::get('/edit_{service}', [ServiceController::class, 'edit'])->name('admin.service.edit');

    Route::post('/update', [ServiceController::class, 'update'])->name('admin.service.update');

    Route::post('/activate', [ServiceController::class, 'activate'])->name('admin.service.activate');

    Route::post('/deactivate', [ServiceController::class, 'deactivate'])->name('admin.service.deactivate');

    Route::post('/destroy', [ServiceController::class, 'destroy'])->name('admin.service.destroy');

    Route::get('/restore_{service}', [ServiceController::class, 'restore'])->name('admin.service.restore');

    Route::post('/d_destroy', [ServiceController::class, 'ddestroy'])->name('admin.service.ddestroy');
  }
);

/*
==============================
NATIONALITIES ROUTES
==============================
*/
Route::group(
  [
    'prefix' => LaravelLocalization::setLocale() . '/dashboard/nationalities',
    'namespace' => 'Admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
  ],
  function () {

    Route::get('/', [NationalityController::class, 'index'])->name('admin.nationality.index');

    Route::get('/active', [NationalityController::class, 'active'])->name('admin.nationality.active');

    Route::get('/inactive', [NationalityController::class, 'inactive'])->name('admin.nationality.inactive');

    Route::get('/trashed', [NationalityController::class, 'trashed'])->name('admin.nationality.trashed');

    Route::get('/activity_{nationality}', [NationalityController::class, 'activity'])->name('admin.nationality.activity');

    Route::get('/create', [NationalityController::class, 'create'])->name('admin.nationality.create');

    Route::post('/store', [NationalityController::class, 'store'])->name('admin.nationality.store');

    Route::get('/show_{nationality}', [NationalityController::class, 'show'])->name('admin.nationality.show');

    Route::get('/edit_{nationality}', [NationalityController::class, 'edit'])->name('admin.nationality.edit');

    Route::post('/update', [NationalityController::class, 'update'])->name('admin.nationality.update');

    Route::post('/activate', [NationalityController::class, 'activate'])->name('admin.nationality.activate');

    Route::post('/deactivate', [NationalityController::class, 'deactivate'])->name('admin.nationality.deactivate');

    Route::post('/destroy', [NationalityController::class, 'destroy'])->name('admin.nationality.destroy');

    Route::get('/restore_{nationality}', [NationalityController::class, 'restore'])->name('admin.nationality.restore');

    Route::post('/ddestroy', [NationalityController::class, 'ddestroy'])->name('admin.nationality.ddestroy');
  }
);

/*
==============================
CUSTOMERS ROUTES
==============================
*/
Route::group(
  [
    'prefix' => LaravelLocalization::setLocale() . '/dashboard/customers',
    'namespace' => 'Admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
  ],
  function () {

    Route::get('/', [CustomerController::class, 'index'])->name('admin.customer.index');

    Route::get('/create', [CustomerController::class, 'create'])->name('admin.customer.create');

    Route::post('/store', [CustomerController::class, 'store'])->name('admin.customer.store');

    Route::get('/show_{customer}', [CustomerController::class, 'show'])->name('admin.customer.show');

    Route::get('/edit_{customer}', [CustomerController::class, 'edit'])->name('admin.customer.edit');

    Route::post('/update', [CustomerController::class, 'update'])->name('admin.customer.update');

    Route::get('/hiring_{customer}', [CustomerController::class, 'hiring'])->name('admin.customer.hiring');
  }
);
/*
==============================
EMPLOYEES ROUTES
==============================
*/
Route::group(
  [
    'prefix' => LaravelLocalization::setLocale() . '/dashboard/employees',
    'namespace' => 'Admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
  ],
  function () {

    Route::get('/', [EmployeeController::class, 'index'])->name('admin.employee.index');

    Route::get('/cleaners', [EmployeeController::class, 'cleaner'])->name('admin.employee.cleaners');

    Route::get('/staff', [EmployeeController::class, 'staff'])->name('admin.employee.staff');

    Route::get('/trashed', [EmployeeController::class, 'trashed'])->name('admin.employee.trashed');

    Route::get('/history_{employee}', [EmployeeController::class, 'history'])->name('admin.employee.history');

    Route::get('/activity_{employee}', [EmployeeController::class, 'activity'])->name('admin.employee.activity');

    Route::get('/create', [EmployeeController::class, 'create'])->name('admin.employee.create');

    Route::post('/store', [EmployeeController::class, 'store'])->name('admin.employee.store');

    Route::get('/show_{employee}', [EmployeeController::class, 'show'])->name('admin.employee.show');

    Route::get('/edit_{employee}', [EmployeeController::class, 'edit'])->name('admin.employee.edit');

    Route::post('/update', [EmployeeController::class, 'update'])->name('admin.employee.update');

    Route::get('/skills_{employee}', [EmployeeController::class, 'skills'])->name('admin.employee.skills');

    Route::post('/skills_update', [EmployeeController::class, 'skills_update'])->name('admin.employee.skills_update');

    Route::post('/activate', [EmployeeController::class, 'activate'])->name('admin.employee.activate');

    Route::post('/deactivate', [EmployeeController::class, 'deactivate'])->name('admin.employee.deactivate');

    Route::post('/destroy', [EmployeeController::class, 'destroy'])->name('admin.employee.destroy');

    Route::get('/restore_{employee}', [EmployeeController::class, 'restore'])->name('admin.employee.restore');

    Route::post('/ddestroy', [EmployeeController::class, 'ddestroy'])->name('admin.employee.ddestroy');
  }
);

/*
==============================
EMPLOYEES UPLOADS ROUTES
==============================
*/
Route::group(
  [
    'prefix' => LaravelLocalization::setLocale() . '/dashboard/employees/upload',
    'namespace' => 'Admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
  ],
  function () {

    Route::get('/photo_{user}', [UserPhotoController::class, 'photo'])->name('admin.employee.photo');

    Route::post('/photo/store', [UserPhotoController::class, 'photoStore'])->name('admin.employee.photo.store');

    Route::get('/passport_{user}', [UserPhotoController::class, 'passport'])->name('admin.employee.passport');

    Route::post('/passport/store', [UserPhotoController::class, 'passportStore'])->name('admin.employee.passport.store');

    Route::get('/emid_{user}', [UserPhotoController::class, 'em'])->name('admin.employee.em');

    Route::post('/emid/store', [UserPhotoController::class, 'emStore'])->name('admin.employee.em.store');
  }
);

/*
==============================
EMPLOYEE LEAVE ROUTES
==============================
*/

Route::group(
  [
    'prefix' => LaravelLocalization::setLocale() . '/dashboard/employee/leave', 'namespace' => 'Admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
  ],
  function () {

    Route::get('/', [LeaveController::class, 'index'])->name('admin.leave.index');

    Route::get('/create', [LeaveController::class, 'create'])->name('admin.leave.create');

    Route::post('/store', [LeaveController::class, 'store'])->name('admin.leave.store');

    Route::get('/edit_{leave}', [LeaveController::class, 'edit'])->name('admin.leave.edit');

    Route::post('/update', [LeaveController::class, 'update'])->name('admin.leave.update');

    Route::post('/destroy', [LeaveController::class, 'destroy'])->name('admin.leave.destroy');
  }
);
/*
==============================
CLEANER SCHEDULE ROUTES
==============================
*/

Route::group(
  [
    'prefix' => LaravelLocalization::setLocale() . '/dashboard/employee/schedule', 'namespace' => 'Admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
  ],
  function () {

    Route::get('/e_{user}', [CleanerScheduleController::class, 'index'])->name('admin.cleaner_schedule.index');
  }
);
/*
==============================
BOOKING ROUTES
==============================
*/

Route::group(
  [
    'prefix' => LaravelLocalization::setLocale() . '/dashboard/booking', 'namespace' => 'Admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
  ],
  function () {

    Route::get('/', [BookingController::class, 'index'])->name('admin.booking.index');

    Route::get('/create_{customer}', [BookingController::class, 'create'])->name('admin.booking.create');

    Route::post('/store', [BookingController::class, 'store'])->name('admin.booking.store');

    Route::get('/edit_{booking}', [BookingController::class, 'edit'])->name('admin.booking.edit');

    Route::get('/show_{booking}', [BookingController::class, 'show'])->name('admin.booking.show');

    Route::post('/update', [BookingController::class, 'update'])->name('admin.booking.update');

    Route::get('/assign_{booking}', [BookingController::class, 'assign'])->name('admin.booking.assign');

    Route::get('/schedule', [BookingController::class, 'schedule'])->name('admin.booking.schedule');

    Route::get('/bill{booking}', [BookingBillController::class, 'get_bill'])->name('admin.booking.bill');

    Route::get('/print{bill}', [BookingBillController::class, 'print_bill'])->name('admin.booking.printBill');
  }
);
/*
==============================
Hiring ROUTES
==============================
*/

Route::group(
  [
    'prefix' => LaravelLocalization::setLocale() . '/dashboard/booking/hiring', 'namespace' => 'Admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
  ],
  function () {

    Route::get('/', [HireController::class, 'index'])->name('admin.hiring.index');

    //Route::get('/create_{customer}', [HireController::class, 'create'])->name('admin.hiring.create');

    Route::post('/store', [HireController::class, 'store'])->name('admin.hiring.store');

    Route::get('/edit_{hiring}', [HireController::class, 'edit'])->name('admin.hiring.edit');

    Route::post('/update', [HireController::class, 'update'])->name('admin.hiring.update');
  }
);

/*
==============================
INVOICES ROUTES
==============================
*/

Route::group(
  [
    'prefix' => LaravelLocalization::setLocale() . '/dashboard/invoices', 'namespace' => 'Admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
  ],
  function () {

    Route::get('/', [BillController::class, 'index'])->name('admin.invoice.index');

    //Route::get('/show{bill}', [BillController::class, 'show'])->name('admin.invoice.show');
  }
);

/*
==============================
CASH ROUTES
==============================
*/

Route::group(
  [
    'prefix' => LaravelLocalization::setLocale() . '/dashboard/cash', 'namespace' => 'Admin',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
  ],
  function () {

    Route::get('/', [CashController::class, 'index'])->name('admin.cash.index');

    Route::post('/deposit', [CashController::class, 'deposit'])->name('admin.cash.deposit');

    Route::get('/edit_{cash}', [CashController::class, 'edit'])->name('admin.cash.edit');

    Route::post('/update', [CashController::class, 'update'])->name('admin.cash.update');

    Route::post('/destroy', [CashController::class, 'destroy'])->name('admin.cash.destroy');
  }
);

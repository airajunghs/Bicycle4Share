<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\ManageBicycleController;
use App\Http\Controllers\ManageComplaintController;
use App\Http\Controllers\ManageUserProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PenaltiesController;
use App\Http\Controllers\ReportController;
use App\Models\Notification;
use App\Models\Report;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/loginStudent', [LoginController::class, 'studentLogin']);
Route::post('/loginStudent', [LoginController::class, 'studentLoginPost']);
Route::post('/loginAdmin', [LoginController::class, 'AdminLoginPost']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('home');
});

Route::get('/manageUserProfile', [ManageUserProfileController::class, 'index']);

Route::prefix('manageUserProfile')
    ->as('manageUserProfile.')
    ->group(function () {
        //manage user profile
        Route::get('/add', [ManageUserProfileController::class, 'add']);
        Route::post('/createStudent', [ManageUserProfileController::class, 'create']);
        Route::get('/{id}/viewStudent', [ManageUserProfileController::class, 'display']);
        Route::get('/{id}/delete', [ManageUserProfileController::class, 'delete']);
        Route::get('/search', [ManageUserProfileController::class, 'search']);
    });


//STUDENT VIEW PUNYA!! type manual kat link
Route::get('/{id}/viewStudentProfile', [ManageUserProfileController::class, 'displaystudent']);
Route::get('/{id}/edit', [ManageUserProfileController::class, 'edit']);
Route::post('/{id}/update', [ManageUserProfileController::class, 'update']);


// Route::get('/ManageUserProfile', [ManageUserProfileController::class, 'index'])->name('users');







////////////////////////////////////////////////////////////////////////////bic


//bicycle
Route::get('/manageBicycle', [ManageBicycleController::class, 'index']);

Route::prefix('manageBicycle')
    ->as('manageBicycle.')
    ->group(function () {
        Route::get('/add', [ManageBicycleController::class, 'add']);

        Route::post('/createBicycle', [ManageBicycleController::class, 'create']);

        Route::get('/{id}/delete', [ManageBicycleController::class, 'delete']);

        Route::get('/{id}/edit', [ManageBicycleController::class, 'edit']);

        Route::post('/{id}/update', [ManageBicycleController::class, 'update']);

        Route::get('/search', [ManageBicycleController::class, 'search']);

    });







//Manage complaint
Route::get('/manageComplaint', [ManageComplaintController::class, 'index']);

Route::prefix('manageComplaint')
    ->as('manageComplaint.')
    ->group(function () {
        Route::get('/add', [ManageComplaintController::class, 'add']);

        Route::post('/createComplaint', [ManageComplaintController::class, 'create']);

        Route::get('/{id}/edit', [ManageComplaintController::class, 'edit']);

        Route::post('/{id}/update', [ManageComplaintController::class, 'update']);

        Route::get('/search', [ManageComplaintController::class, 'search']);
    });







//Manage penalty
Route::get('/managePenalty', [PenaltiesController::class, 'index']);

Route::prefix('managePenalty')
    ->as('managePenalty.')
    ->group(function () {
        Route::get('/{id}/display', [PenaltiesController::class, 'display']);

        Route::post('/add/{id}', [PenaltiesController::class, 'add']);

        Route::get('/{id}/delete', [PenaltiesController::class, 'delete']);

        Route::get('/search', [PenaltiesController::class, 'search']);
    });








//manage notification
Route::get('/manageNotification', [NotificationController::class, 'index']);

Route::prefix('manageNotification')
    ->as('manageNotification.')
    ->group(function () {
        Route::get('/add', [NotificationController::class, 'add']);
        Route::post('/createNotification', [NotificationController::class, 'create']);
        Route::get('/{id}/edit', [NotificationController::class, 'edit']);
        Route::post('/{id}/addMessage', [NotificationController::class, 'addMessage']);
    });


//manage report
Route::get('/manageReport', [ReportController::class, 'index']);
Route::get('/payment',[PaymentController::class, 'index']);
Route::post('/payment',[PaymentController::class, 'processPayment']);
Route::get('/viewPayment/{penaltyId}',[PaymentController::class, 'viewPayment']);

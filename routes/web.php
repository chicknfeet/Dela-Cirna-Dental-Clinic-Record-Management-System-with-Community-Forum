<?php

// landing page for all users
use App\Http\Controllers\LandingPageController;

// log in and registration for admin, patient, and dentistry student
use App\Http\Controllers\AuthController;

// patient list view for admin only
use App\Http\Controllers\users\PatientListController;

// messages for admin and patient
use App\Http\Controllers\users\MessagesController;
// payment info for admin and patient
use App\Http\Controllers\users\PaymentInfoController;

// caldendar for admin and patient
use App\Http\Controllers\users\CalendarController;
// community forum for admin, patient, dentistry student
use App\Http\Controllers\users\CommunityForumController;

// appointment for patient only
use App\Http\Controllers\users\AppointmentController;

// record view of each patient
use App\Http\Controllers\users\RecordController;

use App\Http\Controllers\users\CommentController;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PatientMiddleware;
use App\Http\Middleware\DentistryStudentMiddleware;

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

// landingpage
Route::get('/',[LandingPageController::class,'index'])->name('landingpage');

// log in and registration for admin, patient, and dentistry student
Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.submit');
Route::get('/logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');
Route::get('/signup',[AuthController::class,'registration'])->name('registration');
Route::post('/signup',[AuthController::class,'signup'])->name('signup');

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // paitent list
    Route::get('/patientlist',[PatientListController::class,'index'])->name('patientlist');
    Route::get('/patient/add', [PatientListController::class, 'createPatient'])->name('patient.create');
    Route::post('/patient/store', [PatientListController::class, 'storePatient'])->name('patient.store');
    Route::post('/patientlist/patient/{patientlistId}', [PatientListController::class, 'addPatient'])->name('addPatient');
    Route::get('/patientlist/update/{id}', [PatientListController::class, 'updatePatient'])->name('updatePatient');
    Route::put('/patientlist/updated/{id}', [PatientListController::class, 'updatedPatient'])->name('updatedPatient');
    Route::delete('/patientlist/delete/{id}', [PatientListController::class, 'deletePatient'])->name('deletePatient');
    // record
    Route::get('/patientlist/{patientlistId}/record', [PatientlistController::class, 'showRecord'])->name('showRecord');
    Route::get('/record/add', [RecordController::class, 'createRecord'])->name('record.create');
    Route::post('/records/store', [RecordController::class, 'storeRecord'])->name('record.store');
    Route::get('/patientlist/{patient}/record/{record}/update', [RecordController::class, 'updateRecord'])->name('record.update');
    Route::get('/patientlist/{patient}/record/{record}', [RecordController::class, 'updatedRecord'])->name('record.updated');
    Route::delete('/patientlist/{patient}/record/{record}', [RecordController::class, 'deleteRecord'])->name('record.delete');
    // messages
    Route::get('/messages',[MessagesController::class,'index'])->name('messages');
    Route::post('/messages', [MessagesController::class, 'storeMessage'])->name('messages.store');
    // payment info
    Route::get('/payment-info',[PaymentInfoController::class,'index'])->name('paymentinfo');
    Route::get('/payment/add', [PaymentInfoController::class, 'createPayment'])->name('payment.create');
    Route::post('/payment/store', [PaymentInfoController::class, 'storePayment'])->name('payment.store');
    Route::post('/payment/patient/{patientlistId}', [PaymentInfoController::class, 'addPayment'])->name('addPayment');
    Route::get('/payment/update/{id}', [PaymentInfoController::class, 'updatePayment'])->name('updatePayment');
    Route::put('/payment/updated/{id}', [PaymentInfoController::class, 'updatedPayment'])->name('updatedPayment');
    Route::delete('/payment/delete/{id}', [PaymentInfoController::class, 'deletePayment'])->name('deletePayment');
    // calendar
    Route::get('/calendar',[CalendarController::class,'index'])->name('calendar');
    Route::get('/calendar/appointment/update/{id}', [CalendarController::class, 'updateCalendar'])->name('updateCalendar');
    Route::put('/calendar/appointment/updated/{id}', [CalendarController::class, 'updatedCalendar'])->name('updatedCalendar');
    Route::delete('/calendar/appointment/delete/{id}', [CalendarController::class, 'deleteCalendar'])->name('deleteCalendar');
    // community forum
    Route::get('/communityforum',[CommunityForumController::class,'index'])->name('communityforum');
    Route::get('/communityforum/post', [CommunityForumController::class, 'createCommunityforum'])->name('communityforum.create');
    Route::post('/communityforum/store', [CommunityForumController::class, 'storeCommunityforum'])->name('communityforum.store');
    Route::get('/communityforum/update/{id}', [CommunityForumController::class, 'updateCommunityforum'])->name('updateCommunityforum');
    Route::put('/communityforum/updated/{id}', [CommunityForumController::class, 'updatedCommunityforum'])->name('updatedCommunityforum');
    Route::delete('/communityforum/delete/{id}', [CommunityForumController::class, 'deleteCommunityforum'])->name('deleteCommunityforum');


    Route::get('/communityforum/{communityforumsId}/comment', [CommunityForumController::class, 'showComment'])->name('showComment');
    Route::get('/comment/add', [CommentController::class, 'createComment'])->name('comment.create');
    Route::post('/comments/store', [CommentController::class, 'storeComment'])->name('comment.store');
    Route::get('/communityforums/{communityforum}/comment/{comment}/update', [CommentController::class, 'updateComment'])->name('comment.update');
    Route::get('/communityforums/{communityforum}/comment/{comment}', [CommentController::class, 'updatedComment'])->name('comment.updated');
    Route::delete('/communityforums/{communityforum}/comment/{comment}', [CommentController::class, 'deleteComment'])->name('comment.delete');
});

// Route::middleware(['auth', PatientMiddleware::class])->group(function () {
    Route::get('/appointment',[AppointmentController::class,'index'])->name('appointment');
    Route::get('/appointment/add', [CalendarController::class, 'createCalendar'])->name('calendar.create');
    Route::post('/appointment/store', [CalendarController::class, 'storeCalendar'])->name('calendar.store');

    //messages
    //payment info
    //community forum
// });


Route::middleware(['auth', DentistryStudentMiddleware::class])->group(function () {
    
    // community forum
});
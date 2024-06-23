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


use App\Http\Controllers\users\PatientController;

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

// patient list view for admin only
Route::get('/patientlist',[PatientListController::class,'index'])->name('patientlist');

// patient list functions for admin only
Route::get('/patient/add', [PatientListController::class, 'createPatient'])->name('patient.create');
// store patient
Route::post('/patient/store', [PatientListController::class, 'storePatient'])->name('patient.store');
// add patient
Route::post('/patientlist/patient/{patientlistId}', [PatientListController::class, 'addPatient'])->name('addPatient');
// update patient
Route::get('/patientlist/update/{id}', [PatientListController::class, 'updatePatient'])->name('updatePatient');
// updated patient store in view patient list
Route::put('/patientlist/updated/{id}', [PatientListController::class, 'updatedPatient'])->name('updatedPatient');
// delete patient
Route::delete('/patientlist/delete/{id}', [PatientListController::class, 'deletePatient'])->name('deletePatient');

// messages for admin and patient
Route::get('/messages',[MessagesController::class,'index'])->name('messages');
Route::post('/messages', [MessagesController::class, 'storeMessage'])->name('messages.store');
    
// payment info for admin and patient
Route::get('/payment-info',[PaymentInfoController::class,'index'])->name('paymentinfo');
// patient info functions for admin only
Route::get('/payment/add', [PaymentInfoController::class, 'createPayment'])->name('payment.create');
// store payment
Route::post('/payment/store', [PaymentInfoController::class, 'storePayment'])->name('payment.store');
// add payment
Route::post('/payment/patient/{patientlistId}', [PaymentInfoController::class, 'addPayment'])->name('addPayment');
// update payment
Route::get('/payment/update/{id}', [PaymentInfoController::class, 'updatePayment'])->name('updatePayment');
// updated patient store in view patient list
Route::put('/payment/updated/{id}', [PaymentInfoController::class, 'updatedPayment'])->name('updatedPayment');
// delete payment
Route::delete('/payment/delete/{id}', [PaymentInfoController::class, 'deletePayment'])->name('deletePayment');
    
// community forum for admin, patient, dentistry student
Route::get('/community-forum',[CommunityForumController::class,'index'])->name('communityforum');
Route::get('/community-forum/post', [CommunityForumController::class, 'createCommunityforum'])->name('communityforum.create');
Route::post('/community-forum/store', [CommunityForumController::class, 'storeCommunityforum'])->name('communityforum.store');
Route::get('/community-forum/update/{id}', [CommunityForumController::class, 'updateCommunityforum'])->name('updateCommunityforum');
Route::put('/community-forum/updated/{id}', [CommunityForumController::class, 'updatedCommunityforum'])->name('updatedCommunityforum');
Route::delete('/community-forum/delete/{id}', [CommunityForumController::class, 'deleteCommunityforum'])->name('deleteCommunityforum');
Route::get('/community-forum/comment', [CommunityForumController::class, 'createComment'])->name('createComment');
Route::post('/community-forum/commented', [CommunityForumController::class, 'storeCommunityforum'])->name('storeComment');

// appointment for patient only
Route::get('/appointment',[AppointmentController::class,'index'])->name('appointment');
Route::get('/appointment/add', [CalendarController::class, 'createCalendar'])->name('calendar.create');
Route::post('/appointment/store', [CalendarController::class, 'storeCalendar'])->name('calendar.store');

Route::get('/calendar',[CalendarController::class,'index'])->name('calendar');
Route::get('/calendar/appointment/update/{id}', [CalendarController::class, 'updateCalendar'])->name('updateCalendar');
Route::put('/calendar/appointment/updated/{id}', [CalendarController::class, 'updatedCalendar'])->name('updatedCalendar');
Route::delete('/calendar/appointment/delete/{id}', [CalendarController::class, 'deleteCalendar'])->name('deleteCalendar');

// record view of each patient for admin only
Route::get('/patientlist/{patientlistId}/record', [PatientlistController::class, 'showRecord'])->name('showRecord');
Route::get('/record/add', [RecordController::class, 'createRecord'])->name('record.create');
// add record
Route::post('/records/store', [RecordController::class, 'storeRecord'])->name('record.store');
// update record
Route::get('/patientlist/{patient}/record/{record}/update', [RecordController::class, 'updateRecord'])->name('record.update');
// updated record store in view record
Route::get('/patientlist/{patient}/record/{record}', [RecordController::class, 'updatedRecord'])->name('record.updated');
// delete record
Route::delete('/patientlist/{patient}/record/{record}', [RecordController::class, 'deleteRecord'])->name('record.delete');


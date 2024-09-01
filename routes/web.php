<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Events;
use App\Livewire\Admin\Users;
use App\Livewire\Admin\Reports;
use App\Livewire\Officer\Attendance;
use App\Livewire\Officer\Member;
use App\Livewire\Officer\Position;

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
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //admin
    Route::get('admin/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('admin/events', Events::class)->name('admin.events');
    Route::get('admin/users', Users::class)->name('admin.users');
    Route::get('admin/reports', Reports::class)->name('admin.reports');
    //officers
    Route::get('officer/attendance', Attendance::class)->name('officer.attendance');
    Route::get('officer/positions', Position::class)->name('officer.positions');
    Route::get('officer/members', Member::class)->name('officer.members');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\LandingController;
use App\Livewire\Pages\Home\Index as HomePage;;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::get('/admin', \App\Livewire\Pages\Admin\Index::class)->name('admin.index');
Route::get('/admin/{wl_id}', \App\Livewire\Pages\Admin\EditWL\Index::class)->name('admin.editwl.index');

// Essa rota deve ser a última, pois captura qualquer {slug}.
Route::get('/{slug}', [LandingController::class, 'show'])
    ->name('landing.show');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

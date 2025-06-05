<?php

use App\Http\Controllers\LandingController;
use App\Livewire\Pages\Home\Index as HomePage;
use Illuminate\Support\Facades\Route;

// 1) Redireciona “/” para “/admin”
Route::get('/', \App\Livewire\HomePage::class)->name('home');

// 2) Rotas do Admin
Route::get('/admin', \App\Livewire\Pages\Admin\Index::class)
    ->name('admin.index');

Route::get('/admin/{wl_id}', \App\Livewire\Pages\Admin\EditWL\Index::class)
    ->name('admin.editwl.index');

// 3) Rotas auxiliares (dashboard, profile, etc.)
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

// 4) Rota “catch‐all” para landing pages (sempre por último)
Route::get('/{slug}', [LandingController::class, 'show'])
    ->name('landing.show');

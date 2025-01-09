<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PearlsController;

Route::get('/pearls-of-wisdom', [PearlsController::class, 'index'])->name('pearls.index');

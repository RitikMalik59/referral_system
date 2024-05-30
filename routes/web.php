<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReferralController;

// Route::get('/', function () {
//     return view('layouts.app');
// });

Route::get('/', [ReferralController::class, 'index']);

Route::post('/adduser', [ReferralController::class, 'store']);
// Route::get('/referral', [ReferralController::class, 'index']);

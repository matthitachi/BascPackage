<?php
use Illuminate\Support\Facades\Route;
use Matthitachi\BacsApi\Http\Controllers\BacsApiController;

Route::get('/bacs-response', [BacsApiController::class, 'getResponse']);

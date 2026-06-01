<?php
use Illuminate\Support\Facades\Route;

Route::post('/accept-cookies', function () {
    return response()->json(['success'=>true])
        ->cookie(config('sitepolicy.cookie_name'), '1', config('sitepolicy.cookie_lifetime'));
});

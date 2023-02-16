<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;

Route::get('/cc', function() {
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    \Artisan::call('config:clear');
    \Artisan::call('config:cache');
	return 'DONE';
});
Route::middleware('setlang')->group(function(){
    include(base_path('routes/auth.php'));
    include(base_path('routes/backend.php'));
    include(base_path('routes/frontend.php'));
    include(base_path('routes/payment.php'));
    include(base_path('routes/command.php'));
    Route::fallback(function () {
        abort(404);
    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

// Route::get('url', 'Action');
// Route::post('url', 'Action');
// Route::put('url', 'Action');
// Route::patch('url', 'Action');
// Route::delete('url', 'Action');

// use
// namespace

Route::get('/', [TestController::class, 'index']);

Route::post('/', function() {
    return 'Homepage';
});

Route::put('/', function() {
    return 'Homepage';
});

Route::delete('/', function() {
    return 'Homepage';
});

// Route::get('/welcome', function() {
//     return 'Welcome Page';
// });

// Route::post('/welcome', function() {
//     return 'Welcome Page';
// });

Route::match(['get', 'post', 'put'], '/welcome', function() {
    return 'Welcome Page';
});

Route::any('policy', function() {
    return 'Policy Page';
});

// route::get()

// use
// namespace
// ::
// =>
// .
// ->

Route::get('user/{name}/{age}/{user}', function($name, $age, $user) {
    return "Welcome $name your age is $age, User is $user";
})->whereAlpha('name')->whereNumber('age')->whereAlphaNumeric('user');

// Route::get('/news', function() {
//     return 'News';
// });

Route::get('/news/{id?}', function($id = null) {
    return 'News ' . $id;
});

Route::get('/contact-new', [TestController::class, 'contact'])->name('contactpage');

Route::get('test', function() {
    return 'Test page';
});

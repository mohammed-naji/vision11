<?php

use App\Http\Controllers\ResumeController;
use App\Http\Controllers\Site2Controller;
use App\Http\Controllers\Site3Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
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

Route::get('test2', function() {
    return 'Test page';
});

Route::get('test3', function() {
    return 'Test page';
});

Route::get('new-page', [SiteController::class, 'sum']);

Route::get('home', [Site2Controller::class, 'home'])->name('site2.home');
Route::get('about', [Site2Controller::class, 'about'])->name('site2.about');
Route::get('services', [Site2Controller::class, 'services'])->name('site2.services');
Route::get('contact', [Site2Controller::class, 'contact'])->name('site2.contact');
Route::get('team', [Site2Controller::class, 'team'])->name('site2.team');



Route::get('site3', [Site3Controller::class, 'index'])->name('site3.index');


Route::get('css', [ResumeController::class, 'index'])->name('resume.index');

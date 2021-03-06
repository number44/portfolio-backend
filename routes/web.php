<?php

use App\Models\Image;
use App\Models\Note;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/m2m3', function () {
    return view('landing');
});

Route::get('/xx', function () {

    return view('home', [

        'url' => '$url'
    ]);
});
Route::get('/xxx', function () {
    $notes = Note::with('category')->get();
    return view('notes', [
        "notes" => $notes
    ]);
});



Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});


// Route::get( '/dashboard/{path?}', function(){
//     return view( 'dashboard' );
// } )->where('path', '.*');

Route::get('/', function () {
    return view('dashboard');
});

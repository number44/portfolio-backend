<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PepContreoller;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PlacetypeController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SearchMapController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomtypeController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Don`t forget to turn of csrf in in VerifyCSRFVerifyCsrfToken in production
 */

Route::post("/search", [SearchMapController::class, 'search']);

Route::get("/test", function () {
    return User::all();
});
Route::resource('/notes', NoteController::class);
Route::get("/notes/search/{name}", [NoteController::class, 'search']);
Route::post('/notes', [NoteController::class, 'store']);

Route::get('/images/{id}', [ImageController::class, 'show']);
Route::post('/images', [ImageController::class, 'create']);
Route::post('/images/{id}', [ImageController::class, 'update']);

Route::delete('/images/{id}', [ImageController::class, 'destroy']);
Route::get('/images', [ImageController::class, 'index']);






Route::get('/categories', [CategoryController::class, 'index']);
Route::post("/categories", [CategoryController::class, 'store']);
Route::delete("/categories/{id}", [CategoryController::class, 'destroy']);



Route::resource(('/placetypes'), PlacetypeController::class);
Route::post('/placetypes/{id}', [PlacetypeController::class, 'update']);

Route::resource(('/places'), PlaceController::class);
Route::post('/places/{id}', [PlaceController::class, 'update']);

Route::resource('/locations', LocationController::class);
Route::post('/locations/{id}', [LocationController::class, 'update']);

Route::get('/rooms/search/{name}', [RoomController::class, 'search']);
Route::post('/rooms/{id}', [RoomController::class, 'update']);


Route::get('/pep', [PepContreoller::class, 'index']);

Route::resource('/roomtypes', RoomtypeController::class);
Route::post('/roomtypes/{id}', [RoomtypeController::class, 'update']);
Route::resource('/districts', DistrictController::class);
Route::post('/districts/{id}', [DistrictController::class, 'update']);




Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout']);

Route::get('/files/download/{id}', [FileController::class, 'download']);
Route::resource("/files", FileController::class);

Route::resource('/prices', PriceController::class);
Route::post('/prices/{id}', [PriceController::class, 'update']);

Route::resource('/pictures', PictureController::class);
Route::resource('/rooms', RoomController::class);


Route::resource('/reservations', ReservationController::class);
Route::post('/reservations/{id}', [ReservationController::class, 'update']);


Route::resource('/policies', PolicyController::class);
Route::post('/policies/{id}', [PolicyController::class, 'update']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/auth/users', [AuthController::class, 'index']);
    Route::get('/me', [AuthController::class, 'me']);
});







Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

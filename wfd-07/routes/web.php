<?php

use App\Http\Controllers\DogsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OwnersController;
use App\Http\Controllers\WalksController;
use App\Http\Resources\DogResource;
use App\Models\DogOwners;
use App\Models\Dogs;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('walks', WalksController::class)->middleware('role:admin');
Route::resource('dogs', DogsController::class)->middleware('role:admin');
Route::resource('owners', OwnersController::class)->middleware('role:admin');

// Route::get('dogs/owner/{idOwner}', function(string $idOwner) {
//     return DogResource::collection(Dogs::query()
//     ->leftJoin('dog_owner', 'dogs.id', '=', 'dog_owner.dog_id')
//     ->where('dog_owner.owner_id', $idOwner)->get())->response();
// });

/**
 * List Dogs API without Authentication
 * http://localhost:8000/dogs/owner/1
 */
Route::get('/dogs/owner/{idowner}', function (string $idowner) {
    // Query from code below :
    // select distinct dog_id from `dog_owner` where `owner_id` = $idowner group by `dog_id`;
    // Ambil list distinct dog id dari tabel dog_owner (Tidak ada yang kembar), kemudian query ke table dog untuk ambil data anjing
    $idList = DogOwners::distinct('dog_id')
                        ->where('owner_id', $idowner)
                        ->groupBy('dog_id')
                        ->get('dog_id');
    return DogResource::collection(Dogs::query()->whereIn('id', $idList)->get());
});
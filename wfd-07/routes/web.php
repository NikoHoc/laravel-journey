<?php

use App\Http\Controllers\WalksController;
use App\Http\Resources\DogResource;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('walks', WalksController::class);

Route::get('dogs/owner/{idOwner}', function(string $idOwner) {
    return DogResource::collection(Dogs::query()
    ->leftJoin('dog_owner', 'dogs.id', '=', 'dog_owner.dog_id')
    ->where('dog_owner.owner_id', $idOwner)->get())->response();
});

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesPlaceController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalesmenController;
use App\Http\Controllers\StadeController;
use App\Http\Controllers\Subscription_typeController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TownController;
use App\Http\Controllers\TraderController;
use App\Http\Controllers\ZoneController;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

route::post("/subscription_types", [Subscription_typeController::class, "store"]);

route::get("/subscription_types", [Subscription_typeController::class, "index"]);

route::post("/subscriptions", [SubscriptionController::class, "store"]);

route::get("/subscriptions", [SubscriptionController::class, "index"]);

route::get("/towns", [TownController::class, "index"]);

route::get("/countries", [CountryController::class, "index"]);

route::get("/zones", [ZoneController::class, "index"]);

route::post("/users", [UserController::class, "register"]);

route::get("/users/{id}", [UserController::class, "show"]);

route::get("/users", [UserController::class, "index"]);

route::put("/insertCountry/{user}", [UserController::class, "insertCountry"]);

route::post("/login", [UserController::class, "login"]);




Route::group(['middleware' => ['auth:sanctum']], function () {

    route::post("/admins/{adminId}", [AdminController::class, "store"]);

    route::get("/roles", [RoleController::class, "index"]);

    route::post("/salesmens/{user}", [SalesmenController::class, "store"]);

    route::post("/traders/{user}", [TraderController::class, "store"]);

    route::post("/logout/{user}", [UserController::class, "logout"]);

    route::delete("/users/{user}", [UserController::class, "destroy"]);

    Route::put("/users/{id}", [UserController::class, "update"]);


});


// api poour la gestion des ticket des matches 

// **********************matches le crud corespondant ***********************************//

Route::get('/matchs', [MatchController::class, "index"]);
Route::post('/match', [MatchController::class, "store"]);
Route::get('/match/{id}', [MatchController::class, "show"]);
Route::put('/match/{id}', [MatchController::class, "update"]);
Route::delete('/match/{id}', [MatchController::class, "destroy"]);

// ********************Place le crud corespondant ***************************************//

Route::get('/places', [PlaceController::class, "index"]);
Route::post('/place', [PlaceController::class, "store"]);
Route::get('/place/{id}', [PlaceController::class, "show"]);
Route::put('/place/{id}', [PlaceController::class, "update"]);
Route::delete('/place/{id}', [PlaceController::class, "destroy"]);

// **********************Catégories de place crud corespondant ***************************//

Route::get('/categories-places', [CategoriesPlaceController::class, "index"]);
Route::post('/categories-place', [CategoriesPlaceController::class, "store"]);
Route::get('/categories-place/{id}', [CategoriesPlaceController::class, "show"]);
Route::put('/categories-place/{id}', [CategoriesPlaceController::class, "update"]);
Route::delete('/categories-place/{id}', [CategoriesPlaceController::class, "destroy"]);

// ********************************Stade le crud corespondant ***************************//

Route::get('/stades', [StadeController::class, "index"]);
Route::post('/stade', [StadeController::class, "store"]);
Route::get('/stade/{id}', [StadeController::class, "show"]);
Route::put('/stade/{id}', [StadeController::class, "update"]);
Route::delete('/stade/{id}', [StadeController::class, "destroy"]);

// *************************Ticket le crud corespondant ***************************************//

Route::get('/tickets', [TicketController::class, "index"]);
Route::post('/ticket', [TicketController::class, "store"]);
Route::get('/ticket/{id}', [TicketController::class, "show"]);
Route::put('/ticket/{id}', [TicketController::class, "update"]);
Route::delete('/ticket/{id}', [TicketController::class, "destroy"]);
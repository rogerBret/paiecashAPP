<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\CategoriesPlaceController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FacturationController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\PaiementModeController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalesmenController;
use App\Http\Controllers\ServiceController;
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

route::get("/users", [UserController::class, "index"]);

route::get("/distributors", [DistributorController::class, "index"]);

route::get("/simplyUsers", [UserController::class, "simpleUsers"]);

route::get("/admins", [AdminController::class, "index"]);

route::get("/salesmens", [SalesmenController::class, "index"]);

route::get("/traders", [TraderController::class, "index"]);

route::put("/insertCountry/{user}", [UserController::class, "insertCountry"]);

route::post("/login", [UserController::class, "login"]);




Route::group(['middleware' => ['auth:sanctum']], function () {

    route::get("/users/{id}", [UserController::class, "show"]);

    route::post("/admins/{adminId}", [AdminController::class, "store"]);

    route::post("/distributors/{adminId}", [DistributorController::class, "store"]);

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

/* ***************gestion des souscription au mode de paiement avec paiecash ************* */


Route::get('apps', [AppController::class, "index"]);
Route::post('app', [AppController::class, "store"]);
Route::get('app/{id}', [AppController::class, "show"]);
Route::put('app/{id}', [AppController::class, "update"]);
Route::delete('app/{id}', [AppController::class, "destroy"]);

Route::get('services', [ServiceController::class, "index"]);
Route::post('service', [ServiceController::class, "store"]);
Route::get('service/{id}', [ServiceController::class, "show"]);
Route::put('service/{id}', [ServiceController::class, "update"]);
Route::delete('service/{id}', [ServiceController::class, "destroy"]);


Route::get('mode-paiements', [PaiementModeController::class, "index"]);
Route::post('mode-paiement', [PaiementModeController::class, "store"]);
Route::get('mode-paiement/{id}', [PaiementModeController::class, "show"]);
Route::put('mode-paiement/{id}', [PaiementModeController::class, "update"]);
Route::delete('mode-paiement/{id}', [PaiementModeController::class, "destroy"]);


Route::get('parametre-apps', [ParametreController::class, "index"]);
Route::post('parametre-app', [ParametreController::class, "store"]);
Route::get('parametre-app/{id}', [ParametreController::class, "show"]);
Route::put('parametre-app/{id}', [ParametreController::class, "update"]);
Route::delete('parametre-app/{id}', [ParametreController::class, "destroy"]);


Route::get('facturations', [FacturationController::class, "index"]);
Route::post('facturation', [FacturationController::class, "store"]);
Route::get('facturation/{id}', [FacturationController::class, "show"]);
Route::put('facturation/{id}', [FacturationController::class, "update"]);
Route::delete('facturation/{id}', [FacturationController::class, "destroy"]);
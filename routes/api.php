<?php

use App\Http\Controllers\OzonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Libraries\Pyrus;
use App\Libraries\Parser;
use App\Process\Test;
use App\Http\Controllers\PyrusController;
use App\Http\Controllers\WebhookController;
use Illuminate\Routing\Route as RoutingRoute;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





Route::get('/tre/{task_id}', [WebhookController::class, 'tre']);


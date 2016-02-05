<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('layout');
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::resource("arenas","ArenaController");
    Route::resource("championships","ChampionshipController");
    Route::resource("coatch_licences","CoatchLicenceController");
    Route::resource("judge_licences","JudgeLicenceController");
    Route::resource("player_positions","PlayerPositionController");
    Route::resource("players","PlayerController");
    Route::resource("teams","TeamController");
    Route::resource("coatches","CoatchController");
    Route::resource("judges","JudgeController");
    Route::resource("games","GameController");
});

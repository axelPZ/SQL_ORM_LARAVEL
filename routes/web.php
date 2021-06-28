<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WhereController;
use App\Http\Controllers\AsController;
use App\Http\Controllers\GroupByController;
use App\Http\Controllers\OrderByController;
use App\Http\Controllers\SumController;
use App\Http\Controllers\DistincController;
use App\Http\Controllers\JoinController;
use App\Http\controllers\SubConsultaController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/where', [ WhereController::class, 'querys']);
Route::get('/as', [ AsController::class, 'querys']);
Route::get('/orderBy', [ OrderByController::class, 'querys']);

// SUM, COUNT, MAX, MIN, AVG( promedio ), HAVING
Route::get('/sum', [ SumController::class, 'sum']);
Route::get('/count', [ SumController::class, 'count']);
Route::get('/max', [ SumController::class, 'max']);
Route::get('/min', [ SumController::class, 'min']);
Route::get('/promedio', [ SumController::class, 'promedio']);
Route::get('/having', [ SumController::class, 'having']);


// GROUP BY
Route::get('/group_by', [ GroupByController::class, 'querys']);

//DISTINCT , BETWEEN, LIKE, CONCAT
Route::get('/distinct', [ DistincController::class, 'distinct' ]);
Route::get('/between', [ DistincController::class, 'between' ]);
Route::get('/like', [ DistincController::class, 'like' ]);

// JOIN
Route::get('/join', [ JoinController::class, 'join' ]);




// PENDIENTES
// JOIN RIGTH, JOIN LEFTH, JOIN UNIO

// CONCTAT
Route::get('/concat', [ DistincController::class, 'concat' ]);


// SUB CONSULTA
Route::get('/sub_consulta', [ SubconsultaController::class, 'querys']);

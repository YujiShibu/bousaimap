<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\NeedController;
use App\Http\Controllers\TalentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// トップページ
Route::get('/', [MapController::class, 'index'])->name('map.index');

// 施設情報

Route::get('/shelters/create', [MapController::class, 'shelters_create'])->name('shelters.create');
Route::post('/shelters/store', [MapController::class, 'shelters_store'])->name('shelters.store');
Route::get('/shelters', [MapController::class, 'shelters_index'])->name('shelters.index');
Route::get('/shelters/{shelter}/edit', [MapController::class, 'shelters_edit'])->name('shelters.edit');
Route::put('/shelters/{shelter}', [MapController::class, 'shelters_update'])->name('shelters.update');
Route::delete('/shelters/{shelter}', [MapController::class, 'shelters_destroy'])->name('shelters.destroy');

// 危険・注意箇所
Route::get('/hazards/create', [MapController::class, 'hazards_create'])->name('hazards.create');
Route::get('/hazards/{hazard}/edit', [MapController::class, 'hazards_edit'])->name('hazards.edit');
Route::get('/hazards', [MapController::class, 'hazards_index'])->name('hazards.index');
Route::post('/hazards/store', [MapController::class, 'hazards_store'])->name('hazards.store');
Route::delete('/hazards/{hazard}', [MapController::class, 'hazards_destroy'])->name('hazards.destroy');
Route::put('/hazards/{hazard}', [MapController::class, 'hazards_update'])->name('hazards.update');

// 要支援者
Route::get('/helps/create', [MapController::class, 'helps_create'])->name('helps.create');
Route::get('/helps/{help}/edit', [MapController::class, 'helps_edit'])->name('helps.edit');
Route::get('/helps', [MapController::class, 'helps_index'])->name('helps.index');
Route::post('/helps/store', [MapController::class, 'helps_store'])->name('helps.store');
Route::delete('/helps/{help}', [MapController::class, 'helps_destroy'])->name('helps.destroy');
Route::put('/helps/{help}', [MapController::class, 'helps_update'])->name('helps.update');

// 緊急情報
Route::get('/informations/create', [InformationController::class, 'informations_create'])->name('informations.create');
Route::post('/informations/store', [InformationController::class, 'informations_store'])->name('informations.store');
Route::get('/informations', [InformationController::class, 'informations_index'])->name('informations.index');
Route::get('/informations/{information}/edit', [InformationController::class, 'informations_edit'])->name('informations.edit');
Route::put('/informations/{information}', [InformationController::class, 'informations_update'])->name('informations.update');
Route::delete('/informations/{information}', [InformationController::class, 'informations_destroy'])->name('informations.destroy');

// 困り事や心配事
Route::get('/needs', [NeedController::class, 'needs_index'])->name('needs.index');
Route::get('/needs/create', [NeedController::class, 'needs_create'])->name('needs.create');
Route::post('/needs', [NeedController::class, 'needs_store'])->name('needs.store');
Route::get('/needs/{need}/edit', [NeedController::class, 'needs_edit'])->name('needs.edit');
Route::put('/needs/{need}', [NeedController::class, 'needs_update'])->name('needs.update');
Route::delete('/needs/{need}', [NeedController::class, 'needs_destroy'])->name('needs.destroy');

// 人材バンク
Route::get('/talents', [TalentController::class, 'talents_index'])->name('talents.index');
Route::get('/talents/create', [TalentController::class, 'talents_create'])->name('talents.create');
Route::post('/talents', [TalentController::class, 'talents_store'])->name('talents.store');
Route::get('/talents/{talent}/edit', [TalentController::class, 'talents_edit'])->name('talents.edit');
Route::put('/talents/{talent}', [TalentController::class, 'talents_update'])->name('talents.update');
Route::delete('/talents/{talent}', [TalentController::class, 'talents_destroy'])->name('talents.destroy');

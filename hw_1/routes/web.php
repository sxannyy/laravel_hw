<?php

use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ResponsesController;

Route::get('/', function () {
    return view('survey');
});

Route::get('/survey', [SurveyController::class, 'showSurvey']);
Route::post('/survey', [SurveyController::class, 'submitSurvey']);

Route::get('/responses', [ResponsesController::class, 'showResponses']);


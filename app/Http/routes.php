<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/beds', 'BedsController@index');

$app->get('/clinics', ['uses' => 'ClinicsController@index']);

$app->get('/clinics/show/{clinic_id}', ['uses' => 'ClinicsController@show']);

$app->get('/clinics/beds_by_clinic/{clinic_id}',['uses' => 'ClinicsController@get_beds_by_clinic']);

$app->get('/patients/patient_by_id/{patient_id}', ['uses' => 'PatientsController@get_patient_by_id']);
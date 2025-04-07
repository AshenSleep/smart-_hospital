<?php

use Illuminate\Support\Facades\Route;

// страница для измерений пациента
Route::view('/patient-measurements', 'patient_measurements');

// страница для подсчёта объёма крови
Route::view('/blood-donations', 'blood_donations');

// страница для работы с товарами
Route::view('/products', 'products');


Route::get('/', function () {
    return view('welcome');
});

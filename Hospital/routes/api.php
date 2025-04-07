<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\BloodDonationController;
use App\Http\Controllers\ProductController;


Route::middleware('api')->group(function () {

    // Маршрут для получения повешенного давления
    Route::get('/patients/measurements/after-noon', [PatientController::class, 'getMeasurementsAfterNoon']);

    // Маршрут для подсчёта общего объёма сданной крови в заданный период
    Route::get('/blood-donations/total', [BloodDonationController::class, 'totalVolume']);

    // Маршруты для работы с продуктами:
    // Выборка товаров с ценой больше 100
    Route::get('/products/expensive', [ProductController::class, 'getExpensiveProducts']);

    // Обновление цен товаров в зависимости от цвета
    Route::post('/products/update-prices', [ProductController::class, 'updatePrices']);
});

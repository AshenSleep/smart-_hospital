<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Measurement;
use Carbon\Carbon;

class PatientController extends Controller
{
    public function getMeasurementsAfterNoon()
    {
        $normPulse = 100; // Пороговое значение пульса
        $normPressureSystolic = 140; // Пороговое значение систолического давления
        $normPressureDiastolic = 90; // Пороговое значение диастолического давления

        // Получаем все измерения после 12:00, где пульс или давление превышают нормы
        $measurements = Measurement::where('measured_at', '>=', Carbon::today()->addHours(12)) 
            ->where(function($query) use ($normPulse, $normPressureSystolic, $normPressureDiastolic) {
                $query->where('pulse', '>', $normPulse)
                      ->orWhere(function($query) use ($normPressureSystolic, $normPressureDiastolic) {
                          $query->where('pressure_systolic', '>', $normPressureSystolic)
                                ->orWhere('pressure_diastolic', '>', $normPressureDiastolic);
                      });
            })
            ->get();

        // Форматируем дату на сервере
        $measurements->transform(function($measurement) {
            $measurement->formatted_date = Carbon::parse($measurement->measured_at)->format('d.m.Y H:i');
            return $measurement;
        });

        return response()->json($measurements);
    }
}

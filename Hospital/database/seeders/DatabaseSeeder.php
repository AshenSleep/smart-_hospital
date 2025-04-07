<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\Measurement;
use App\Models\BloodDonation;
use App\Models\Product;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
   
    public function run(): void
    {
        // Создаём 10 пациентов
        $patients = [];
        for ($i = 1; $i <= 10; $i++) {
            $patients[] = Patient::create([
                'first_name' => 'Имя' . $i,
                'last_name'  => 'Фамилия' . $i,
                'birth_date' => Carbon::now()->subYears(rand(20, 60))->toDateString(),
                'gender'     => (rand(0, 1) ? 'male' : 'female'),
                'phone'      => '1234567890',
                'email'      => "patient{$i}@example.com",
            ]);
        }

        
        // Для каждого пациента создаём 5 измерений за последние 3 дня
        foreach ($patients as $patient) {
         for ($j = 0; $j < 5; $j++) {
            Measurement::create([
                'patient_id'        => $patient->id,
                'pulse'             => rand(60, 100),
                'pressure_systolic' => rand(110, 180),  
                'pressure_diastolic'=> rand(70, 120),  
                // Генерируем время измерения в пределах последних 3 дней
                'measured_at'      => Carbon::now()->subMinutes(rand(0, 4320)),
             ]);
         }
     } 

        // Создаём 10 записей о донорстве крови
        for ($i = 1; $i <= 10; $i++) {
            BloodDonation::create([
                'donation_date' => Carbon::now()->subDays(rand(0, 30))->toDateString(),
                'volume'        => rand(450, 550), // объем крови в мл
            ]);
        }

        
        $productsData = [
            ['name' => 'Товар 1', 'price' => 100, 'color' => 'green'],
            ['name' => 'Товар 2', 'price' => 150, 'color' => 'green'],
            ['name' => 'Товар 3', 'price' => 90,  'color' => 'red'],
            ['name' => 'Товар 4', 'price' => 200, 'color' => 'green'],
            ['name' => 'Товар 5', 'price' => 120, 'color' => 'green'],
            ['name' => 'Товар 6', 'price' => 80,  'color' => 'red'],
            ['name' => 'Товар 7', 'price' => 300, 'color' => 'green'],
        ];

        foreach ($productsData as $data) {
            Product::create($data);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodDonation;

class BloodDonationController extends Controller
{
    public function totalVolume(Request $request)
    {
        $dateFrom = $request->query('date_from');
        $dateTo   = $request->query('date_to');

        $totalVolume = BloodDonation::whereBetween('donation_date', [$dateFrom, $dateTo])
            ->sum('volume');

        return response()->json([
            'date_from'    => $dateFrom,
            'date_to'      => $dateTo,
            'total_volume' => $totalVolume,
        ]);
    }
}

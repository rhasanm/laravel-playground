<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function submitForm(Request $request)
    {
        $dateRange = $request->input('datefilter');

        [$startDate, $endDate] = explode(' - ', $dateRange);

        return view('welcome', [
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
    }
}

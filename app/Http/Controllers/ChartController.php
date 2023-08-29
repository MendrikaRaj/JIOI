<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    //
    public function index()
    {
        $sectorsData = [
            'data' => [30, 40, 20, 10],
            'labels' => ['A', 'B', 'C', 'D'],
        ];

        $barData = [
            'data' => [10, 20, 15, 25],
            'labels' => ['X', 'Y', 'Z', 'W'],
        ];

        return view('Chart.chart', compact('sectorsData', 'barData'));
    }
}

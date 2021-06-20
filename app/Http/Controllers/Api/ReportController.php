<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $price = $request->price;
        $report = new Report;
        return response()->json($report->Report($price));

    }
}

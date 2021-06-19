<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use App\Models\Report;
use Illuminate\Http\Request; // needed?
use Illuminate\Http\JsonResponse;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $price = $request->price;
        // return $price;
        $report = new Report;
        return response()->json($report->Report($price));
        // return response()->$report->Report($price);

        // return 'hi';
    }

    // public function store(Request $request)
    // {
    //     Report::create([
    //         'name'          => $request->input('name'),
    //         'category_id'   => $request->input('category_id'),
    //         'location_id'   => $request->input('location_id'),
    //         'price'         => $request->input('price')
    //     ]);
    // }

    // public function destroy(Report $report)
    // {
    //     $report->delete();
    // }
}

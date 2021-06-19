<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        return view('report');
    }
}

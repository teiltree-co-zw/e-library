<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReadingRecord;

class ReportsController extends Controller
{
    //

    public function index()
    {
        $records = ReadingRecord::all();
        return view('reports.index', compact('records'));
    }
}

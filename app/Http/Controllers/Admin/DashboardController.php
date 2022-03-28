<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Log;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $logs = Log::orderBy('id', 'DESC')->take(5)->get();
        return view('admin.administrator.dashboard', compact('logs'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogController extends Controller
{
    public function insert_log($admin_id, $content)
    {
        Log::create([
            'admin_id'  => $admin_id,
            'content'   => $content
        ]);
    }
}

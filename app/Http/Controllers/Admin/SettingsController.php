<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('admin.settings.index', compact('categories'));
    }
}

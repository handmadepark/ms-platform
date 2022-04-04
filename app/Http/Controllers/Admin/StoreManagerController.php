<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Stores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StoreManagerController extends Controller
{
    public function index($id)
    {
        Session::put('store_id', $id);
        return view('admin.store_manager.listings.index');
    }
}

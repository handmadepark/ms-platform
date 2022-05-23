<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingServices;
use App\Models\Country;
use App\Models\Mainlands;

class ShippingInformationsController extends Controller
{
    public function index()
    {
        $services = ShippingServices::all();
        $count_deleted = ShippingServices::onlyTrashed()->count();
        return view('admin.shipping_informations.index', compact('services', 'count_deleted'));
    }

    public function create()
    {
        $mainlands = Mainlands::where('status',1)->get();
        $countries = Country::where('status', 1)->get();
        return view('admin.shipping_informations.create', compact('mainlands','countries'));
    }
}

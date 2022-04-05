<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StoreManagerController extends Controller
{
    public function index($id)
    {
        Session::put('store_id', $id);
        return view('admin.store_manager.index');
    }

    public function listings()
    {
        if(!Session::get('listing_status'))
        {
            $listings =  Products::where('id', getStoreData(Session::get('store_id'), 'id'))->get();
        }
        else
        {
            $listing_status = Session::put('listing_status', 1);
            $listings = $this->getListings($listing_status);
        }
        $categories = Categories::where('status', 1)->get();
        return view('admin.store_manager.listings.index', compact('listings', 'categories'));
    }


    public function getListings($listing_status)
    {
        Session::put('listing_status', $listing_status);
        $listings =  Products::where('id', getStoreData(Session::get('store_id'), 'id'))->where('status', Session::get('listing_status'))->get();
        return $listings;

    }

    public function back()
    {
        Session::forget('listing_store');
        Session::forget('store_id');
        return redirect()->route('admin.stores');
    }
}

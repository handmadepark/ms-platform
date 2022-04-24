<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Listings;
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
        if(Session::get('listing_status'))
        {
            if(Session::get('listing_status')=='active')
            {
                $listings = Listings::where('store_id', Session::get('store_id'))->where('status', 1)->get();
            }
            elseif(Session::get('listing_status')=='deactive')
            {
                $listings = Listings::where('store_id', Session::get('store_id'))->where('status', 0)->get();
            }
            else
            {
                $listings = Listings::where('store_id', Session::get('store_id'))->withTrashed();
            }
        }
        else
        {
            $listings = Listings::where('store_id', Session::get('store_id'))->get();
        }

        $categories = Categories::where('status', 1)->get();
        return view('admin.store_manager.listings.index', compact('listings', 'categories'));
    }

    public function active()
    {
        Session::forget('listing_status');
        Session::put('listing_status', 'active');
        return redirect()->route('admin.stores.store_manager.listings');
    }
    public function deactive()
    {
        Session::forget('listing_status');
        Session::put('listing_status', 'deactive');
        return redirect()->route('admin.stores.store_manager.listings');
    }
    public function deleted()
    {
        Session::forget('listing_status');
        Session::put('listing_status', 'deleted');
        return redirect()->route('admin.stores.store_manager.listings');
    }

    public function listing_details($id)
    {
        $item_selected = Listings::find($id);
        return view('admin.store_manager.listings.listing_details', compact('item_selected'));
    }

    public function create()
    {
        $categories = Categories::where('status', 1)->get();
        return view('admin.store_manager.listings.create', compact('categories'));
    }

    public function getVariations($id)
    {
        return $id;
    }

    public function back()
    {
        Session::forget('listing_store');
        Session::forget('store_id');
        return redirect()->route('admin.stores');
    }
}

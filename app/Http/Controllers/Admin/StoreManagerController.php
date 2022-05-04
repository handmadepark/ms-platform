<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\CategoryVariations;
use App\Models\VariationOptions;
use App\Models\Listings;
use App\Models\Variations;
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
        if (Session::get('listing_status'))
        {
            if (Session::get('listing_status') == 'active')
            {
                $listings = Listings::where('store_id', Session::get('store_id'))->where('status', 1)
                    ->get();
            }
            elseif (Session::get('listing_status') == 'deactive')
            {
                $listings = Listings::where('store_id', Session::get('store_id'))->where('status', 0)
                    ->get();
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
        return redirect()
            ->route('admin.stores.store_manager.listings');
    }
    public function deactive()
    {
        Session::forget('listing_status');
        Session::put('listing_status', 'deactive');
        return redirect()
            ->route('admin.stores.store_manager.listings');
    }
    public function deleted()
    {
        Session::forget('listing_status');
        Session::put('listing_status', 'deleted');
        return redirect()
            ->route('admin.stores.store_manager.listings');
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

    public function gv($id)
    {

        function check_select($par)
        {
            $options = VariationOptions::where('variation_id', $par)->get();
            $html_option = '';
            foreach($options as $option)
            {
                $html_option .= '<option value='.$option['id'].'>'.$option['option_name'].'</option>';
            }
            return $html_option;
        }


        $data = CategoryVariations::select('variations_id')->where('categories_id', $id)->get()
            ->toArray();
        $id_variations = [];
        foreach ($data as $item)
        {
            $id_variations[] = $item['variations_id'];
        }
        $integerVariationsIds = array_map('intval', $id_variations);
        $variations = Variations::whereIn('id', $integerVariationsIds)->get();


        $response_data = [
            "variations" => (!empty($variations)) ? $variations : '', 
        ];
        
        $html = '';
        for ($i=0; $i < count($response_data['variations']); $i++) { 
            
            if ($response_data['variations'][$i]['input_type'] == 'text')
            {
	            $html .= '<div class="row mb-3">
                            <div class="col-sm-3">
                                 <label for="title" class="col-sm-12 col-form-label"><strong>'.$response_data['variations'][$i]['variation_name'].'</strong></label>
                                 <p class="col-sm-12">Include keywords that buyers would use to search for your item.</p>
                             </div>
                             <div class="col-sm-2">
                                 <input type="text" placeholder="Enter value" class="form-control" id="title">
                             </div>
                          </div>'; 
            }

            elseif ($response_data['variations'][$i]['input_type'] == 'select')
            {
	            $html .= '<div class="row mb-3">
                            <div class="col-sm-3">
                                 <label for="title" class="col-sm-12 col-form-label"><strong>'.$response_data['variations'][$i]['variation_name'].'</strong></label>
                                 <p class="col-sm-12">Include keywords that buyers would use to search for your item.</p>
                             </div>
                             <div class="col-sm-6">
                             <select name="" class="form-control form-control" data-bs-placeholder="Select category">
                             '.check_select($response_data['variations'][$i]['id']).'
                             </select>
                             </div>
                          </div>'; 
            }

            elseif ($response_data['variations'][$i]['input_type'] == 'multiple-select')
            {
	            $html .= '<div class="row mb-3">
                            <div class="col-sm-3">
                                 <label for="title" class="col-sm-12 col-form-label"><strong>'.$response_data['variations'][$i]['variation_name'].'</strong></label>
                                 <p class="col-sm-12">Include keywords that buyers would use to search for your item.</p>
                             </div>
                             <div class="col-sm-6">
                             <select multiple="multiple" class="testselect2">
                             '.check_select($response_data['variations'][$i]['id']).'
                             </select>
                             </div>
                          </div>'; 
            }

            elseif ($response_data['variations'][$i]['input_type'] == 'color')
            {
	            $html .= '<div class="row mb-3">
                            <div class="col-sm-3">
                                 <label for="title" class="col-sm-12 col-form-label"><strong>'.$response_data['variations'][$i]['variation_name'].'</strong></label>
                                 <p class="col-sm-12">Include keywords that buyers would use to search for your item.</p>
                             </div>
                             <div class="col-sm-6">
                             <div>
							 	<div class="theme-container"></div>
							 	<div class="pickr-container"></div>
							 </div>
                             </div>
                          </div>'; 
            }

        }
        
        $response_html["html"] = $html;
        return $response_html;
    }

    

    public function back()
    {
        Session::forget('listing_store');
        Session::forget('store_id');
        return redirect()->route('admin.stores');
    }
}


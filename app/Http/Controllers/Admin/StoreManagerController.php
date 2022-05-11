<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\CategoryVariations;
use App\Models\CategoryPVariations;
use App\Models\VariationOptions;
use App\Models\PriceVariations;
use App\Models\PriceVariationOptions;
use App\Models\Listings;
use App\Models\Variations;
use App\Models\Sizes;
use App\Models\Scale;
use App\Models\VariationSizes;
use App\Models\SizeOptions;
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
        $pvariations = PriceVariations::where('status', 1)->get();
        return view('admin.store_manager.listings.create', compact('categories', 'pvariations'));
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

        function get_size_options($par)
        {
            $variation = VariationSizes::where('variation_id', $par)->first();
            $options = SizeOptions::where('size_id', $variation->size_id)->get();

            $check_null = false;
            foreach($options as $option)
            {
                if(is_null($option['scale_id']))
                {
                    $check_null = true;
                }
                else 
                {
                    $check_null = false;
                }
            }
            $html_option = '';

            if($check_null == true)
            {
                $html_option .= '<select name="size_option" class="form-control form-control" data-bs-placeholder="Select category">';
                foreach($options as $option)
                {
                    $html_option .= '<option value='.$option['id'].'>'.$option['size_option_name'].'</option>';
                }
                $html_option .= '</select>';
            }
            else 
            {
                $scale_name = Scale::all();
                $html_option .= '<div class="col-md-6">';
                $html_option .= '<select name="scale_id" id="scale_id" class="form-control form-control" data-bs-placeholder="Select category">';
                $html_option .= '<option disabled selected>Select scale</option>';
                foreach($scale_name as $scale)
                {
                    $html_option .= '<option value='.$scale['id'].'>'.$scale['scale_name'].'</option>';
                }
                $html_option .= '</select>';
                $html_option .= '</div>';

                $html_option .= '<div class="col-md-6">';
                $html_option .= '<select name="size" id="size" class="form-control form-control" data-bs-placeholder="Select category">';
                    $html_option .= '<option disabled selected>Please select scale</option>';
                $html_option .= '</select>';
                $html_option .= '</div>';
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
                                 <input type="text" id="variation_id" hidden value="'.$response_data['variations'][$i]['id'].'">
                             </div>
                             <div class="col-sm-2">
                                 <input type="text" placeholder="Enter value" class="form-control" id="title">
                             </div>
                             <div class="col-sm-2">                             
                                 '.get_size_options($response_data['variations'][$i]['id']).'
                             </div>
                          </div>'; 
            }

            elseif ($response_data['variations'][$i]['input_type'] == 'select')
            {
	            $html .= '<div class="row mb-3">
                            <div class="col-sm-3">
                                 <label for="title" class="col-sm-12 col-form-label"><strong>'.$response_data['variations'][$i]['variation_name'].'</strong></label>
                                 <p class="col-sm-12">Include keywords that buyers would use to search for your item.</p>
                                 <input type="text" id="variation_id" hidden value="'.$response_data['variations'][$i]['id'].'">
                             </div>
                             <div class="col-sm-3">
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
                                 <input type="text" id="variation_id" hidden value="'.$response_data['variations'][$i]['id'].'">
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
                                 <input type="text" id="variation_id" hidden value="'.$response_data['variations'][$i]['id'].'">
                             </div>
                             <div class="col-sm-6">
                             <div>
							 	<div class="theme-container"></div>
							 	<div class="pickr-container"></div>
							 </div>
                             </div>
                          </div>'; 
            }

            elseif ($response_data['variations'][$i]['input_type'] == 'no-type')
            {
	            $html .= '<div class="row mb-3">
                            <div class="col-sm-3">
                                 <label for="title" class="col-sm-12 col-form-label"><strong>'.$response_data['variations'][$i]['variation_name'].'</strong></label>
                                 <p class="col-sm-12">Include keywords that buyers would use to search for your item.</p>
                                 <input type="hidden" id="variation_hidden_id" value="'.$response_data['variations'][$i]['id'].'">
                             </div>
                             <div class="col-sm-6">                             
                                 <div class="row">
                                 '.get_size_options($response_data['variations'][$i]['id']).'
                                 </div>
                             </div>
                          </div>'; 
            }

        }
        $response_html["html"] = $html;
        return $response_html;
    }

    public function gso($id='', $variation_id='')
    {   
        $data = VariationSizes::where('variation_id', $variation_id)->first();
        if($data)
        {
            $size_options = SizeOptions::where('size_id', $data['size_id'])->where('scale_id', $id)->get();
        }
        else
        {
            $size_options = [];
        }
        
        return $size_options;
    }

    public function gpv($id)
    {
        $pv_id = CategoryPVariations::where('categories_id', $id)->get();
        $id_variations = [];
        foreach ($pv_id as $item)
        {
            $id_variations[] = $item['variations_id'];
        }
        $integerVariationsIds = array_map('intval', $id_variations);
        $pv = PriceVariations::whereIn('id', $integerVariationsIds)->get();

        return $pv;
    }

    public function gpvo($id)
    {
        $pv_options = PriceVariationOptions::where('variation_id', $id)->get();
        $pv_name = PriceVariations::where('id', $id)->first();
        $html_variations = '';
        $html_variations .= '<div class="row" id="selected_variation" data-id="'.$pv_name['id'].'">
        <div class="col-md-6">
                    <div class="variation_name_div">
                        <span id="variation_name_p">'.$pv_name['price_variation_name'].'</span> 
                        <button class="float-end btn btn-sm btn-dark" onclick="delete_variation_div('.$pv_name['id'].')">Delete</button>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="price">
                        <input class="form-check-input" type="checkbox" name="pvariation" value="" id="price">
                            Prices vary for each <span id="variation_name_p">'.$pv_name['price_variation_name'].'</span>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="quantity">
                        <input class="form-check-input" type="checkbox" name="qvariation" value="" id="quantity">
                            Quantities vary for each <span id="variation_name_p">'.$pv_name['price_variation_name'].'</span>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="sku">
                        <input class="form-check-input" type="checkbox" name="svariation" value="" id="sku">
                            SKUs vary for each <span id="variation_name_p">'.$pv_name['price_variation_name'].'</span>
                        </label>
                    </div>
                    </div>
                    <div class="col-md-6 float-end">
                    <select name="pv_options" class="form-control" id="pv_options">
                    <option disabled selected>Please select one item</option>';
        
                    foreach($pv_options as $pv_option)
                    {
                        $html_variations .= '<option value="'.$pv_option['id'].'">'.$pv_option['option_name'].'</option>';
                    }
        $html_variations .= '</select>';
        $html_variations .='</div></div>';
                    
        return $html_variations;
    }

    

    public function back()
    {
        Session::forget('listing_store');
        Session::forget('store_id');
        return redirect()->route('admin.stores');
    }
}


<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Stores;
use Illuminate\Http\Request;
use App\Models\Log;
use Auth;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Hash;


class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Stores::all();
        $count_deleted = Stores::onlyTrashed()->count();
        return view('admin.stores.index', compact('stores', 'count_deleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::where('status', 1)->get();
        return view('admin.stores.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{


            $new_store = $request->all();
            if($request->who_manage == "on")
            {
            $new_store['who_manage'] = 1;
            }
            else
            {
            $new_store['who_manage'] = 0;
            }
            $new_store['email'] = json_encode($request->email);
            $new_store['social'] = json_encode($request->social);
            Stores::create($new_store);
            $content = Auth::guard('admin')->user()->name.' inserted new store - '.$request->name;
            $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            toast('Store inserted successfully.', 'success');
            return redirect()->route('admin.stores');
        }catch(\Exception $e)
        {
            toast('An error occured...', 'warning');
            return redirect()->route('admin.stores.create');

        }
    }

    public function restore($id)
    {
        try{
            $item_restore = Stores::onlyTrashed()->find($id);
            $item_restore->restore();
            $content = Auth::guard('admin')->user()->name.' restored store - '.$item_restore->name;
            $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            toast('Store restores successfully.', 'success');
            return redirect()->route('admin.stores');
        }catch(\Exception $e)
        {
            toast('An error occured...', 'warning');
            return redirect()->route('admin.stores.deleted');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::where('status', 1)->get();
        $item_selected = Stores::find($id);
        if($item_selected)
        {
            return view('admin.stores.edit', compact('item_selected', 'countries'));
        }
        else
        {
            toast('Country not found...', 'warning');
            return redirect()->route('admin.stores');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{

            $updated_item = Stores::find($id);
            $updated_item['email'] = json_encode($request->email);
            $updated_item['social'] = json_encode($request->social);
            if($request->who_manage == "on")
            {
                $updated_item['who_manage'] = 1;
            }
            else
            {
                $updated_item['who_manage'] = 0;
            }
            $updated_item->update($request->all());
            $content = Auth::guard('admin')->user()->name.' updated store - '.$request->name;
            $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            toast('Store updated successfully.', 'success');
            return redirect()->route('admin.stores');
        }catch(\Exception $e)
        {
            toast('An error occured...', 'warning');
            return redirect()->route('admin.stores');
        }
    }

    public function deleted()
    {
        $countries = Stores::onlyTrashed()->get();
        return view('admin.stores.deleted', compact('stores'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $delete_item = Stores::find($id);
            $content = Auth::guard('admin')->user()->name.' deleted store - '.$delete_item->name;
            $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            $delete_item->delete();
            toast('Store deleted successfully.', 'success');
            return redirect()->route('admin.stores');
        }catch (\Exception $e)
        {
            toast('An error occured...', 'warning');
            return redirect()->route('admin.stores');
        }
    }
}

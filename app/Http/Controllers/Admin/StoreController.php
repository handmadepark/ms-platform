<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogController;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Country;
use App\Models\Log;
use Auth;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all_stores()
    {
        $stores = Store::all();
        $count_active = Store::where('status', 1)->count();
        $count_deactive = Store::where('status', 0)->count();
        $count_deleted = Store::onlyTrashed()->count();
        return view('admin.stores.all-stores', compact('stores', 'count_active', 'count_deactive', 'count_deleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_stores()
    {
        $countries = Country::where('status', 1)->get(); 
        return view('admin.stores.create-stores', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Store;
        $store->country_id = $request->country_id;
        $store->name = $request->name;
        $store->email = $request->email;
        $store->password = \Hash::make($request->password);
        $store->save();

        $content = Auth::guard('admin')->user()->name.' inserted new store.';
        $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        toast('Store inserted successfully','success');
        return redirect()->route('admin.stores.all-stores');

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
        //
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
        //
    }

    public function delete($id)
    {
        $content = Auth::guard('admin')->user()->name.' deleted the store.';
        $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        toast('Store deleted successfully','success');
        Store::find($id)->delete();
        return redirect()->route('admin.stores.all-stores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

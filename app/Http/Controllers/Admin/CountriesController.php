<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Log;
use Auth;
use App\Http\Controllers\LogController;



class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        $count_deleted = Country::onlyTrashed()->count();
        return view('admin.countries.index', compact('countries', 'count_deleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create');
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
            Country::create([
                'name'      => $request->name,
                'status'    => $request->status
            ]);
            $content = Auth::guard('admin')->user()->name.' inserted new country - '.$request->name;
            $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            toast('Country inserted successfully.', 'success');
            return redirect()->route('admin.countries');
        }catch(\Exception $e)
        {
            toast('An error occured...', 'warning');
            return redirect()->route('admin.countries.create');
        }
    }

    public function restore($id)
    {
        try{
            $item_restore = Country::onlyTrashed()->find($id);
            $item_restore->restore();
            $content = Auth::guard('admin')->user()->name.' restored country - '.$item_restore->name;
            $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            toast('Country restores successfully.', 'success');
            return redirect()->route('admin.countries');
        }catch(\Exception $e)
        {
            toast('An error occured...', 'warning');
            return redirect()->route('admin.countries.deleted');
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
        $item_selected = Country::find($id);
        if($item_selected)
        {
            return view('admin.countries.edit', compact('item_selected'));
        }
        else
        {
            toast('Country not found...', 'warning');
            return redirect()->route('admin.countries');
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
            $updated_item = Country::find($id);
            $updated_item->update($request->all());
            $content = Auth::guard('admin')->user()->name.' updated country - '.$request->name;
            $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            toast('Country updated successfully.', 'success');
            return redirect()->route('admin.countries');
        }catch(\Exception $e)
        {
            toast('An error occured...', 'warning');
            return redirect()->route('admin.countries');
        }
    }

    public function deleted()
    {
        $countries = Country::onlyTrashed()->get();
        return view('admin.countries.deleted', compact('countries'));
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
            $delete_item = Country::find($id);
            $content = Auth::guard('admin')->user()->name.' deleted country - '.$delete_item->name;
            $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            $delete_item->delete();
            toast('Country deleted successfully.', 'success');
            return redirect()->route('admin.countries');
        }catch (\Exception $e)
        {
            toast('An error occured...', 'warning');
            return redirect()->route('admin.countries');
        }
    }
}

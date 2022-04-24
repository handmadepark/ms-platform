<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogController;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'name'      => 'required|min:3|max:255',
                'status'    => 'required|integer'
            ]);

            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            Country::create($request->all());
            $content = Auth::guard('admin')->user()->name.' inserted new country - '.$request->name;
            (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            toast('Country inserted successfully.', 'success');
            return redirect()->route('admin.countries');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item_selected = Country::find($id);
        return view('admin.countries.show', compact('item_selected'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item_selected = Country::find($id);
        return view('admin.countries.edit', compact('item_selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
            $validator = Validator::make($request->all(), [
                'name'      => 'required|min:3|max:255',
                'status'    => 'required|integer'
            ]);

            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = Country::find($id);
            $data->update($request->all());
            $content = Auth::guard('admin')->user()->name.' updated country - '.$validator->name;
            (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            toast('Country updated successfully.', 'success');
            return redirect()->route('admin.countries');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Country::find($id);
        $content = Auth::guard('admin')->user()->name.' deleted country - '.$item->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->delete();
        toast('Country deleted successfully.', 'success');
        return redirect()->route('admin.countries');

    }

    public function check_status(Request $request)
    {
        $update_status = Country::find($request->dataId);
        $update_status->status = $request->check;
        $update_status->save();
        if($request->check == 1)
        {
            $old_status = "active";
        }else{
            $old_status = "deactive";
        }
        $content = Auth::guard('admin')->user()->name.' updated country status to - '.$old_status;
        $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $data = [
            'icon'             => 'success',
            'status'           => 200,
            'message'          => 'Store status successfully updated'
        ];
        return $data;
    }

    public function deleted()
    {
        $countries = Country::onlyTrashed()->get();
        return view('admin.countries.deleted', compact('countries'));
    }

    public function restore($id)
    {
        $item = Country::onlyTrashed()->where('id', $id)->first();
        $content = Auth::guard('admin')->user()->name.' restored deleted country - '.$item->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->restore();
        toast('Country restored successfully.', 'success');
        return redirect()->route('admin.countries');
    }
}

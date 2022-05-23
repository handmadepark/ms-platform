<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogController;
use App\Models\Mainlands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class MainlandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainlands = Mainlands::all();
        $count_deleted = Mainlands::onlyTrashed()->count();
        return view('admin.mainlands.index', compact('mainlands', 'count_deleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mainlands.create');
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
                'name'          => 'required|min:3|max:255',
                'status'        => 'required|integer'
            ]);

            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            Mainlands::create($request->all());
            $content = Auth::guard('admin')->user()->name.' inserted new mainland - '.$request->name;
            (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            toast('Mainland inserted successfully.', 'success');
            return redirect()->route('admin.mainlands');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mainlands  $mainland
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item_selected = Mainlands::find($id);
        return view('admin.mainlands.show', compact('item_selected'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item_selected = Mainlands::find($id);
        return view('admin.mainlands.edit', compact('item_selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mainlands  $mainlands
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
            $data = Mainlands::find($id);
            $data->update($request->all());
            $content = Auth::guard('admin')->user()->name.' updated mainland - '.$request->name;
            (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            toast('Mainland updated successfully.', 'success');
            return redirect()->route('admin.mainlands');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Mainlands::find($id);
        $content = Auth::guard('admin')->user()->name.' deleted mainland - '.$item->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->delete();
        toast('Mainland deleted successfully.', 'success');
        return redirect()->route('admin.mainlands');

    }

    public function check_status(Request $request)
    {
        $update_status = Mainlands::find($request->dataId);
        $update_status->status = $request->check;
        $update_status->save();
        if($request->check == 1)
        {
            $old_status = "active";
        }else{
            $old_status = "deactive";
        }
        $content = Auth::guard('admin')->user()->name.' updated mainland status to - '.$old_status;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $data = [
            'icon'             => 'success',
            'status'           => 200,
            'message'          => 'Mainland status successfully updated'
        ];
        return $data;
    }

    public function deleted()
    {
        $mainlands = Mainlands::onlyTrashed()->get();
        return view('admin.mainlands.deleted', compact('mainlands'));
    }

    public function restore($id)
    {
        $item = Mainlands::onlyTrashed()->where('id', $id)->first();
        $content = Auth::guard('admin')->user()->name.' restored deleted mainland - '.$item->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->restore();
        toast('Mainland restored successfully.', 'success');
        return redirect()->route('admin.mainlands');
    }
}

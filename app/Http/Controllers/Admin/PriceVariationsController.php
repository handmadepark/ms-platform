<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogController;
use App\Models\PriceVariations;
use Illuminate\Http\Request;
use Validator, Auth;

class PriceVariationsController extends Controller
{
    public function index()
    {
        $pv = PriceVariations::all();
        $count_deleted = PriceVariations::onlyTrashed()->count();
        return view('admin.pv.index',compact('pv', 'count_deleted'));
    }

    public function create()
    {
        return view('admin.pv.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'variation_name'=>'required|max:25',
            'status'=>'required|integer'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = PriceVariations::create($request->all());

        $content = Auth::guard('admin')->user()->name.' inserted new price variation - '.$request->variation_name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        toast('Price variation inserted successfully.', 'success');
        return redirect()->route('admin.pv');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PriceVariations::find($id);
        if (is_null($data)) {
            return response()->json('Item not found...', 404);
        }
        return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item_selected = PriceVariations::find($id);
        return view('admin.pv.edit', compact('item_selected'));
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
        $validator = Validator::make($request->all(),[
            'variation_name'=>'required|max:25',
            'status'=>'required|integer'
        ]);

        $data = PriceVariations::find($id);
        $data->update($request->all());

        $content = Auth::guard('admin')->user()->name.' updated price variation - '.$request->variation_name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        toast('Price variation updated successfully.', 'success');
        return redirect()->route('admin.pv');
    }

    public function check_status(Request $request)
    {
        $update_status = PriceVariations::find($request->dataId);
        $update_status->status = $request->check;
        $update_status->save();
        if($request->check == 1)
        {
            $old_status = "active";
        }else{
            $old_status = "deactive";
        }
        $content = Auth::guard('admin')->user()->name.' updated price variation status to - '.$old_status;
        $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $data = [
            'icon'             => 'success',
            'status'           => 200,
            'message'          => 'Price variation status successfully updated'
        ];
        return $data;
    }

    public function deleted()
    {
        $data = PriceVariations::onlyTrashed()->get();
        return view('admin.pv.deleted', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = PriceVariations::find($id);
        $content = Auth::guard('admin')->user()->name.' deleted price variation - '.$item->variation_name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->delete();
        toast('Price variation deleted successfully.', 'success');
        return redirect()->route('admin.pv');
    }

    public function restore($id)
    {
        $item = PriceVariations::onlyTrashed()->where('id', $id)->first();
        $content = Auth::guard('admin')->user()->name.' restored deleted price variation - '.$item->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->restore();
        toast('Price variation restored successfully.', 'success');
        return redirect()->route('admin.pv');
    }
}

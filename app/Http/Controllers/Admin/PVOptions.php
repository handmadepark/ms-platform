<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogController;
use App\Models\PriceVariationOptions;
use Illuminate\Http\Request;
use App\Models\PriceVariations;
use Illuminate\Support\Facades\Auth;
use Validator;

class PVOptions extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = PriceVariationOptions::all();
        $count_deleted = PriceVariationOptions::onlyTrashed()->count();
        return view('admin.pvoptions.index', compact('options', 'count_deleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $variations = PriceVariations::where('status', 1)->get();
        return view('admin.pvoptions.create', compact('variations'));
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
            'pvariation_id'   =>'required|integer',
            'option_name'    =>'required',
            'status'         =>'required|integer'
        ]);


        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        foreach($request->option_name as $option)
        {
            PriceVariationOptions::create([
                'pvariation_id'    => $request->pvariation_id,
                'option_name'     => $option,
                'status'          => $request->status
            ]);
        }

        $content = Auth::guard('admin')->user()->name.' inserted new price variation options';
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        toast('Price variation Options inserted successfully.', 'success');
        return redirect()->route('admin.pvoptions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PriceVariationOptions::find($id);
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
        $variations = PriceVariations::where('status', 1)->get();
        $item = PriceVariationOptions::find($id);
        return view('admin.pvoptions.edit', compact('item', 'variations'));
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
            'pvariation_id'   =>'required|max:25',
            'option_name'    =>'required',
            'status'         =>'required|integer'
        ]);

        $data = PriceVariationOptions::find($id);
        $data->update($request->all());

        $content = Auth::guard('admin')->user()->name.' updated price variation option - '.$request->option_name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        toast('Price variation Option updated successfully.', 'success');
        return redirect()->route('admin.pvoptions');
    }

    public function check_status(Request $request)
    {
        $update_status = PriceVariationOptions::find($request->dataId);
        $update_status->status = $request->check;
        $update_status->save();
        if($request->check == 1)
        {
            $old_status = "active";
        }else{
            $old_status = "deactive";
        }
        $content = Auth::guard('admin')->user()->name.' updated price variation option status to - '.$old_status;
        $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $data = [
            'icon'             => 'success',
            'status'           => 200,
            'message'          => 'Price variation option status successfully updated'
        ];
        return $data;
    }

    public function deleted()
    {
        $data = PriceVariationOptions::onlyTrashed()->get();
        return view('admin.pvoptions.deleted', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $item = PriceVariationOptions::find($id);
        $content = Auth::guard('admin')->user()->name.' deleted price variation option - '.$item->option_name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->delete();
        toast('Price variation option deleted successfully.', 'success');
        return redirect()->route('admin.pvoptions');
    }

    public function restore($id)
    {
        $item = PriceVariationOptions::onlyTrashed()->where('id', $id)->first();
        $content = Auth::guard('admin')->user()->name.' restored deleted price variation option - '.$item->option_name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->restore();
        toast('Variation option restored successfully.', 'success');
        return redirect()->route('admin.pvoptions');
    }
}

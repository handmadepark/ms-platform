<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogController;
use App\Models\CategoryVariations;
use App\Models\VariationOptions;
use Illuminate\Http\Request;
use App\Models\Variations;
use Illuminate\Support\Facades\Auth;
use Validator;

class VariationOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = VariationOptions::all();
        $count_deleted = VariationOptions::onlyTrashed()->count();
        return view('admin.options.index', compact('options', 'count_deleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $variations = Variations::where('status', 1)->get();
        return view('admin.options.create', compact('variations'));
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
            'variation_id'   =>'required|integer',
            'option_name'    =>'required',
            'status'         =>'required|integer'
        ]);


        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        foreach($request->option_name as $option)
        {
            VariationOptions::create([
                'variation_id'    => $request->variation_id,
                'option_name'     => $option,
                'status'          => $request->status
            ]);
        }

        $content = Auth::guard('admin')->user()->name.' inserted new variation options';
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        toast('Variation Options inserted successfully.', 'success');
        return redirect()->route('admin.options');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = VariationOptions::find($id);
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
        $variations = Variations::where('status', 1)->get();
        $item = VariationOptions::find($id);
        return view('admin.options.edit', compact('item', 'variations'));
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
            'variation_id'   =>'required|max:25',
            'option_name'    =>'required',
            'status'         =>'required|integer'
        ]);

        $data = VariationOptions::find($id);
        $data->update($request->all());

        $content = Auth::guard('admin')->user()->name.' updated variation option - '.$request->option_name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        toast('Variation Option updated successfully.', 'success');
        return redirect()->route('admin.options');
    }

    public function check_status(Request $request)
    {
        $update_status = VariationOptions::find($request->dataId);
        $update_status->status = $request->check;
        $update_status->save();
        if($request->check == 1)
        {
            $old_status = "active";
        }else{
            $old_status = "deactive";
        }
        $content = Auth::guard('admin')->user()->name.' updated variation option status to - '.$old_status;
        $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $data = [
            'icon'             => 'success',
            'status'           => 200,
            'message'          => 'Variation option status successfully updated'
        ];
        return $data;
    }

    public function deleted()
    {
        $data = VariationOptions::onlyTrashed()->get();
        return view('admin.options.deleted', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $item = VariationOptions::find($id);
        $content = Auth::guard('admin')->user()->name.' deleted variation option - '.$item->option_name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->delete();
        toast('Variation option deleted successfully.', 'success');
        return redirect()->route('admin.options');
    }

    public function restore($id)
    {
        $item = VariationOptions::onlyTrashed()->where('id', $id)->first();
        $content = Auth::guard('admin')->user()->name.' restored deleted variation option - '.$item->option_name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->restore();
        toast('Variation option restored successfully.', 'success');
        return redirect()->route('admin.options');
    }
}

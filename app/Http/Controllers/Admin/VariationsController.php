<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogController;
use App\Models\VariationOptions;
use Illuminate\Http\Request;
use App\Models\Variations;
use Illuminate\Support\Facades\Auth;
use Validator;

class VariationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variations = Variations::all();
        $count_deleted = Variations::onlyTrashed()->count();
        return view('admin.variations.index', compact('variations', 'count_deleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.variations.create');
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
        $data = Variations::create($request->all());
//        if(count($request->option_name)>0) {
//            foreach ($request->option_name as $option){
//                VariationOptions::create([
//                    'variation_id'  => $data->id,
//                    'option_name'   => $option,
//                    'status'        => $data->status
//                ]);
//            }
//        }
        dd(count($request->option_name));
        $content = Auth::guard('admin')->user()->name.' inserted new variation - '.$request->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        toast('Variation inserted successfully.', 'success');
        return redirect()->route('admin.variations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Variations::find($id);
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
        $request->validate([
            'variation_name'=>'required|max:25',
            'status'=>'required|integer',
        ]);

        $data = Variations::find($id);
        if (is_null($data)) {
            return response()->json('Item not found', 404);
        }
        $data->update($request->all());
        return response()->json($data,200);
    }

    public function check_status(Request $request)
    {
        $update_status = Variations::find($request->dataId);
        $update_status->status = $request->check;
        $update_status->save();
        if($request->check == 1)
        {
            $old_status = "active";
        }else{
            $old_status = "deactive";
        }
        $content = Auth::guard('admin')->user()->name.' updated variation status to - '.$old_status;
        $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $data = [
            'icon'             => 'success',
            'status'           => 200,
            'message'          => 'Variation status successfully updated'
        ];
        return $data;
    }

    public function deleted()
    {
        $data = Variations::onlyTrashed()->get();
        return view('admin.variations.deleted', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $item = Variations::find($id);
        $content = Auth::guard('admin')->user()->name.' deleted variation - '.$item->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->delete();
        toast('Variation deleted successfully.', 'success');
        return redirect()->route('admin.variations');
    }

    public function restore($id)
    {
        $item = Variations::onlyTrashed()->where('id', $id)->first();
        $content = Auth::guard('admin')->user()->name.' restored deleted variation - '.$item->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->restore();
        toast('Variation restored successfully.', 'success');
        return redirect()->route('admin.variation');
    }
}

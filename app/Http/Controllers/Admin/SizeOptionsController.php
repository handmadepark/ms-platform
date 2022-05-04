<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogController;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class SizeOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = SizeOptions::all();
        $count_deleted = SizeOptions::onlyTrashed()->count();
        return view('admin.size_options.index', compact('options', 'count_deleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes = Size::where('status', 1)->get();
        $country = Country::where('status', 1)->get();
        return view('admin.size_options.create', compact('sizes', 'country'));
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
            'size_id'   =>'required|integer',
            'country_id'   =>'required|integer',
            'size_option_name'    =>'required',
            'status'         =>'required|integer'
        ]);


        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        foreach($request->option_name as $option)
        {
            SizeOptions::create([
                'size_id'    => $request->size_id,
                'country_id'    => $request->country_id,
                'size_option_name'     => $option,
                'status'          => $request->status
            ]);
        }

        $content = Auth::guard('admin')->user()->name.' inserted new size options';
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        toast('Size Options inserted successfully.', 'success');
        return redirect()->route('admin.size_options');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = SizeOptions::find($id);
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
        $sizes = Size::where('status', 1)->get();
        $country = Country::where('status', 1)->get();
        $item = SizeOptions::find($id);
        return view('admin.size_options.edit', compact('item', 'sizes,', 'country'));
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
            'size_id'   =>'required|integer',
            'country_id'    =>'required|integer',
            'size_option_name'    =>'required',
            'status'         =>'required|integer'
        ]);

        $data = Size::find($id);
        $data->update($request->all());

        $content = Auth::guard('admin')->user()->name.' updated size option - '.$request->size_option_name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        toast('Size option updated successfully.', 'success');
        return redirect()->route('admin.size_options');
    }

    public function check_status(Request $request)
    {
        $update_status = SizeOptions::find($request->dataId);
        $update_status->status = $request->check;
        $update_status->save();
        if($request->check == 1)
        {
            $old_status = "active";
        }else{
            $old_status = "deactive";
        }
        $content = Auth::guard('admin')->user()->name.' updated size option status to - '.$old_status;
        $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $data = [
            'icon'             => 'success',
            'status'           => 200,
            'message'          => 'Size option status successfully updated'
        ];
        return $data;
    }

    public function deleted()
    {
        $data = SizeOptions::onlyTrashed()->get();
        return view('admin.size_options.deleted', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $item = SizeOptions::find($id);
        $content = Auth::guard('admin')->user()->name.' deleted size option - '.$item->size_option_name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->delete();
        toast('Size option deleted successfully.', 'success');
        return redirect()->route('admin.options');
    }

    public function restore($id)
    {
        $item = SizeOptions::onlyTrashed()->where('id', $id)->first();
        $content = Auth::guard('admin')->user()->name.' restored deleted size option - '.$item->size_option_name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->restore();
        toast('Size option restored successfully.', 'success');
        return redirect()->route('admin.size_options');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogController;
use Illuminate\Http\Request;
use App\Models\Size;
use Illuminate\Support\Facades\Auth;
use Validator;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::all();
        $count_deleted = Size::onlyTrashed()->count();
        return view('admin.sizes.index', compact('sizes', 'count_deleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sizes.create');
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
            'size_name'=>'required|max:25',
            'status'=>'required|integer'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = Size::create($request->all());

        $content = Auth::guard('admin')->user()->name.' inserted new size group - '.$request->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        toast('Size group inserted successfully.', 'success');
        return redirect()->route('admin.sizes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Size::find($id);
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
        $item = Size::find($id);
        return view('admin.sizes.edit', compact('item'));
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
            'size_name'=>'required|max:25',
            'status'=>'required|integer'
        ]);

        $data = Size::find($id);
        $data->update($request->all());

        $content = Auth::guard('admin')->user()->name.' updated size group - '.$request->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        toast('Size name updated successfully.', 'success');
        return redirect()->route('admin.sizes');
    }

    public function check_status(Request $request)
    {
        $update_status = Size::find($request->dataId);
        $update_status->status = $request->check;
        $update_status->save();
        if($request->check == 1)
        {
            $old_status = "active";
        }else{
            $old_status = "deactive";
        }
        $content = Auth::guard('admin')->user()->name.' updated size group status to - '.$old_status;
        $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $data = [
            'icon'             => 'success',
            'status'           => 200,
            'message'          => 'Size group status successfully updated'
        ];
        return $data;
    }

    public function deleted()
    {
        $data = Size::onlyTrashed()->get();
        return view('admin.sizes.deleted', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $item = Size::find($id);
        $content = Auth::guard('admin')->user()->name.' deleted size group - '.$item->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->delete();
        toast('Size group deleted successfully.', 'success');
        return redirect()->route('admin.sizes');
    }

    public function restore($id)
    {
        $item = Size::onlyTrashed()->where('id', $id)->first();
        $content = Auth::guard('admin')->user()->name.' restored deleted size group - '.$item->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->restore();
        toast('Size group restored successfully.', 'success');
        return redirect()->route('admin.sizes');
    }
}

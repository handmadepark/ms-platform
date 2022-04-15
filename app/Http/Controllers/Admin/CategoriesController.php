<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\LogController;
use App\Http\Controllers\Controller;
use App\Models\Variations;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Categories;
use Validator, Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $categories = Categories::all();
        $count_deleted = Categories::onlyTrashed()->count();
        return view('admin.categories.index', compact('categories', 'count_deleted'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::where('status', 1)->get();
        $variations = Variations::where('status', 1)->get();
        return view('admin.categories.create', compact('categories', 'variations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $item = $request->validate([
            'name'              =>'required|string|max:25',
            'title'             =>'required|string|max:225',
            'description'       =>'required|string|max:225',
            'keywords'          =>'required',
            'status'            =>'required|integer',
        ]);

        $keywords = json_encode($request->keywords);
        $data = Categories::create([
            'parent_id'             => $request->parent_id,
            'name'                  => $request->name,
            'title'                 => $request->title,
            'description'           => $request->description,
            'keywords'              => $keywords,
            'slug'                  => Str::slug($request->title),
            'status'                => $request->status
        ]);

        $content = \Illuminate\Support\Facades\Auth::guard('admin')->user()->name.' inserted new category - '.$request->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        toast('Category inserted successfully.', 'success');
        return redirect()->route('admin.categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        $data = Categories::find($category);
        if (is_null($data)) {
            return response()->json('Item not found', 404);
        }
        return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $data = Categories::find($category);
        if(is_null($data))
        {
            return response()->json('Item not found', 404);
        }
        $categories = Categories::where('status', 1)->get();
        $variations = Variations::where('status', 1)->get();
        return view('admin.categories.edit', compact('data', 'categories', 'variations'));
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
        $validator = Validator::make($request->all(), [
            'name'          => 'required|min:3|max:255',
            'title'         => 'required|min:3|max:255',
            'description'   => 'required|min:20|max:500',
            'status'        => 'required|integer'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = Categories::find($id);
        $data->update($request->all());
        $content = Auth::guard('admin')->user()->name.' updated category - '.$request->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        toast('Category updated successfully.', 'success');
        return redirect()->route('admin.categories');
    }

    public function destroy($id)
    {
        $item = Categories::find($id);
        $content = Auth::guard('admin')->user()->name.' deleted category - '.$item->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->delete();
        toast('Category deleted successfully.', 'success');
        return redirect()->route('admin.categories');

    }

    public function check_status(Request $request)
    {
        $update_status = Categories::find($request->dataId);
        $update_status->status = $request->check;
        $update_status->save();
        if($request->check == 1)
        {
            $old_status = "active";
        }else{
            $old_status = "deactive";
        }
        $content = Auth::guard('admin')->user()->name.' updated category status to - '.$old_status;
        $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $data = [
            'icon'             => 'success',
            'status'           => 200,
            'message'          => 'Category status successfully updated'
        ];
        return $data;
    }

    public function deleted()
    {
        $categories = Categories::onlyTrashed()->get();
        return view('admin.categories.deleted', compact('categories'));
    }

    public function restore($id)
    {
        $item = Categories::onlyTrashed()->where('id', $id)->first();
        $content = Auth::guard('admin')->user()->name.' restored deleted category - '.$item->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->restore();
        toast('Category restored successfully.', 'success');
        return redirect()->route('admin.categories');
    }
}

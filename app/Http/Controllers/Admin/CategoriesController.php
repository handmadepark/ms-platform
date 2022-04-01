<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogController;
use App\Models\Categories;
use App\Models\Country;
use Illuminate\Http\Request;
use Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
        return view('admin.categories.create');
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
            Categories::create([
                'name'      => $request->name,
                'status'    => $request->status
            ]);
            $content = Auth::guard('admin')->user()->name.' inserted new category - '.$request->name;
            $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            toast('Category inserted successfully.', 'success');
            return redirect()->route('admin.categories');
        }catch(\Exception $e)
        {
            toast('An error occured...', 'warning');
            return redirect()->route('admin.categories.create');
        }
    }

    public function restore($id)
    {
        try{
            $item_restore = Categories::onlyTrashed()->find($id);
            $item_restore->restore();
            $content = Auth::guard('admin')->user()->name.' restored country - '.$item_restore->name;
            $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            toast('Category restores successfully.', 'success');
            return redirect()->route('admin.categories');
        }catch(\Exception $e)
        {
            toast('An error occured...', 'warning');
            return redirect()->route('admin.categories.deleted');
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
        $item_selected = Categories::find($id);
        if($item_selected)
        {
            return view('admin.categories.edit', compact('item_selected'));
        }
        else
        {
            toast('Country not found...', 'warning');
            return redirect()->route('admin.categories');
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
            $updated_item = Categories::find($id);
            $updated_item->update($request->all());
            $content = Auth::guard('admin')->user()->name.' updated category - '.$request->name;
            $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            toast('Category updated successfully.', 'success');
            return redirect()->route('admin.categories');
        }catch(\Exception $e)
        {
            toast('An error occured...', 'warning');
            return redirect()->route('admin.categories');
        }
    }

    public function deleted()
    {
        $categories = Categories::onlyTrashed()->get();
        return view('admin.categories.deleted', compact('categories'));
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
            $delete_item = Categories::find($id);
            $content = Auth::guard('admin')->user()->name.' deleted category - '.$delete_item->name;
            $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            $delete_item->delete();
            toast('Categories deleted successfully.', 'success');
            return redirect()->route('admin.categories');
        }catch (\Exception $e)
        {
            toast('An error occured...', 'warning');
            return redirect()->route('admin.categories');
        }
    }
}

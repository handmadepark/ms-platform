<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Stores;
use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Hash;
use Validator;


class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Stores::all();
        $count_deleted = Stores::onlyTrashed()->count();
        return view('admin.stores.index', compact('stores', 'count_deleted'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::where('status', 1)->get();
        return view('admin.stores.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $new_store = $request->validate([
                'country_id'        => 'required|integer',
                'name'              => 'required|string|min:3|max:50|unique:stores',
                'phone'             => 'required|string|unique:stores',
                'related_person'    => 'required|string|min:3|max:50',
                'login'             => 'required|string|min:3|max:50|unique:stores',
                'password'          => 'required|string|min:8',
                'address'           => 'required|string|min:20'
            ]);

            if($request->who_manage == "on")
            {
            $new_store['who_manage'] = 1;
            }
            else
            {
            $new_store['who_manage'] = 0;
            }
            $new_store['email'] = json_encode($request->email);
            $new_store['social'] = json_encode($request->social);
            Stores::create($new_store);
            $content = Auth::guard('admin')->user()->name.' inserted new store - '.$request->name;
            (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            toast('Store inserted successfully.', 'success');
            return redirect()->route('admin.stores');

    }

    public function restore($id)
    {
            $item_restore = Stores::onlyTrashed()->find($id);
            $item_restore->restore();
            $content = Auth::guard('admin')->user()->name.' restored store - '.$item_restore->name;
            $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            toast('Store restores successfully.', 'success');
            return redirect()->route('admin.stores');

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
        $countries = Country::where('status', 1)->get();
        $item_selected = Stores::find($id);
        if($item_selected)
        {
            return view('admin.stores.edit', compact('item_selected', 'countries'));
        }
        else
        {
            toast('Country not found...', 'warning');
            return redirect()->route('admin.stores');
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
            $update_item = Validator::make($request->all(),[
                'country_id'        => 'required|integer',
                'name'              => 'required|string|min:3|max:50',
                'phone'             => 'required|string',
                'related_person'    => 'required|string|min:3|max:50',
                'login'             => 'required|string|min:3|max:50',
                'address'           => 'required|string|min:20',
                'email'             => 'required',
                'social'            => 'required'
            ]);

            if ($update_item->fails())
            {
                return back()->withErrors($update_item)->withInput();
            }

            $updated_item = Stores::find($id);
            $updated_item['email'] = json_encode($request->email);
            $updated_item['social'] = json_encode($request->social);
            if($request->who_manage == "on")
            {
                $updated_item['who_manage'] = 1;
            }
            else
            {
                $updated_item['who_manage'] = 0;
            }
            $updated_item->update($request->all());
            $content = Auth::guard('admin')->user()->name.' updated store - '.$request->name;
            $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            toast('Store updated successfully.', 'success');
            return redirect()->route('admin.stores');

    }

    public function checkStatus(Request $request)
    {
        $update_status = Stores::find($request->dataId);
        $update_status->status = $request->check;
        $update_status->save();
        if($request->check == 1)
        {
            $old_status = "active";
        }else{
            $old_status = "deactive";
        }
        $content = Auth::guard('admin')->user()->name.' updated store status to - '.$old_status;
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
        $stores = Stores::onlyTrashed()->get();
        return view('admin.stores.deleted', compact('stores'));
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
            $delete_item = Stores::find($id);
            $content = Auth::guard('admin')->user()->name.' deleted store - '.$delete_item->name;
            $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
            $delete_item->delete();
            toast('Store deleted successfully.', 'success');
            return redirect()->route('admin.stores');
        }catch (\Exception $e)
        {
            toast('An error occured...', 'warning');
            return redirect()->route('admin.stores');
        }
    }
}

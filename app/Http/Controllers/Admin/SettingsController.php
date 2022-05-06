<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogController;
use App\Models\InputTypes;
use App\Models\Scale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index()
    {
        $scales = Scale::all();
        $types = InputTypes::all();
        return view('admin.settings.index', compact('types', 'scales'));
    }

    public function create_input(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'input_type'      => 'required|min:3|max:255',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        InputTypes::create($request->all());
        $content = Auth::guard('admin')->user()->name.' inserted new input type - '.$request->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        toast('Input type inserted successfully.', 'success');
        return redirect()->route('admin.settings');
    }

    public function create_scale(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'scale_name'      => 'required|min:2|max:10',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Scale::create($request->all());
        $content = Auth::guard('admin')->user()->name.' inserted new scale - '.$request->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        toast('Scale inserted successfully.', 'success');
        return redirect()->route('admin.settings');
    }

    public function destroy_input($id)
    {
        $item = InputTypes::find($id);
        $content = Auth::guard('admin')->user()->name.' deleted input type - '.$item->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->delete();
        toast('Input type deleted successfully.', 'success');
        return redirect()->route('admin.settings');
    }

    public function destroy_scale($id)
    {
        $item = Scale::find($id);
        $content = Auth::guard('admin')->user()->name.' deleted scale - '.$item->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        $item->delete();
        toast('Scale deleted successfully.', 'success');
        return redirect()->route('admin.settings');
    }


}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogController;
use App\Models\InputTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index()
    {
        $types = InputTypes::all();
        return view('admin.settings.index', compact('types'));
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
        $content = Auth::guard('admin')->user()->name.' inserted new input_type - '.$request->name;
        (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        toast('Input type inserted successfully.', 'success');
        return redirect()->route('admin.settings');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentCards;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class PaymentCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_payment_card = new PaymentCards;
        $new_payment_card->store_id = $request->store_id;
        $new_payment_card->name_on_card = $request->name_on_card;
        $new_payment_card->card_number = Crypt::encryptString($request->card_number);
        $new_payment_card->expiration_month = $request->expiration_month;
        $new_payment_card->expiration_year = $request->expiration_year;
        $new_payment_card->cvc = Crypt::encryptString($request->card_number);
        if($request->main == "on")
        {
            $new_payment_card['main'] = 1;
        }
        else
        {
            $new_payment_card['main'] = 0;
        }
        $new_payment_card->save();
        $content = Auth::guard('admin')->user()->name.' inserted new payment card - (card on name -'.$request->card_on_name.')';
        $result = (new LogController)->insert_log(Auth::guard('admin')->user()->id, $content);
        toast('Payment card inserted successfully.', 'success');
        return redirect()->route('admin.stores.edit', $request->store_id);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php
use App\Models\Stores;

function getStoreData($store_id, $parameter)
{
    $store = Stores::where('id', $store_id)->first();
    return $store[$parameter];
}


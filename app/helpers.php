<?php
use App\Models\
{
    Stores, Listings
};
use App\Models\Country;

function getStoreData($store_id, $parameter)
{
    $store = Stores::where('id', $store_id)->first();
    return $store[$parameter];
}

function getCountryName($store_id)
{
    $store = Stores::where('id', $store_id)->first();
    return $store->getCountry['name'];
}

function getListingsCount($store_id)
{
    $listings_count = Listings::where('store_id', $store_id)->count();
    return $listings_count;
}

function getListingActiveCount($store_id)
{
    $listings_active_count = Listings::where('status', 1)->count();
    return $listings_active_count;
}

function getListingDeactiveCount($store_id)
{
    $listings_deactive_count = Listings::where('status', 0)->count();
    return $listings_deactive_count;
}

function getListingDeletedCount($store_id)
{
    $listings_deleted_count = Listings::onlyTrashed()->count();
    return $listings_deleted_count;
}

function getDatedmy($time)
{
    return $time->format("d.m.Y");
}

function getTimehis($time)
{
    return $time->format("H:i");
}

<?php

namespace App\Http\Controllers;

use App\TravelPackage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ListTravelController extends Controller
{
    public function index()
    {
        $items = TravelPackage::with(['galleries'])->get();
        // $slug = TravelPackage::with(['galleries'])->where('slug', $slug)->firstOrFail();

        // return dd($item);
        return view('pages.list-travel', ['items' => $items]);
    }
}

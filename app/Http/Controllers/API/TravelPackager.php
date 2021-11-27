<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\TravelPackage;
use Illuminate\Http\Request;

class TravelPackager extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $title = $request->input('title');
        $slug = $request->input('slug');

        if ($id) {
            $travel_package = TravelPackage::with('galleries')->find($id);

            if ($travel_package)
                return ResponseFormatter::success($travel_package, 'Data travel berhasil diambil');
            else
                return ResponseFormatter::error(null, 'Data travel tidak ada', 404);
        }

        $travel_package = TravelPackage::with('galleries');

        return ResponseFormatter::success(
            $travel_package->paginate($limit),
            'Data list produk berhasil diambil'
        );
    }
}

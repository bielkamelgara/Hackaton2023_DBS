<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entrance;
use App\Models\Product;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntranceController extends Controller
{
    public function index()
    {
        $entrances = Entrance::where('id_user', Auth::user()->id)->get();

        return view('entrances.index', compact('entrances'))
            ->with('i', (request()->input('page',1) - 1) *10);
    }

    public function entrancesid($id)
    {
        $entrance = Entrance::find($id);
        return response()->json([
            'entrance' => $entrance,
        ]);
    }

    public function showproduct($id)
    {
        $entrance = Entrance::find($id);
        $product = Product::find($entrance->identifer);
        $sector = Sector::find($product->id_sector);
        return response()->json([
            'product' => $product,
            'sector' => $sector,
        ]);
    }
}

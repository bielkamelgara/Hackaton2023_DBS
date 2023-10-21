<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Currency;
use App\Models\Product;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $products = Product::all();

        return view('home', compact('products', 'user'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        $user = User::find($product->id_user);
        $sector = Sector::find($product->id_sector);

        return view('post/show-post', compact('post', 'user', 'profile', 'category', 'currency', 'measure_unit'));
    }
}

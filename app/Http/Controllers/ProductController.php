<?php

namespace App\Http\Controllers;

use App\Models\Entrance;
use App\Models\Product;
use App\Models\Sector;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $sectors = Sector::all();
        return view('inv-product/index', compact('products', 'sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('product/create', compact('product'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $sector = Sector::find($product->id_sector);
        return response()->json([
            'product' => $product,
            'sector' => $sector,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return response()->json([
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input("pro-id");
        $quanty = $request->input("quanty");
        $product = Product::find($id);

        if ($quanty < $request->input("amount-product1")) {
            $product->name = $request->input("name-product1");
            $product->description = $request->input("des-product1");
            $product->price = $request->input("price-product1");
            $product->size = $request->input("tall-product1");
            $product->color = $request->input("color-product1");
            $product->avilable = $request->input("avilable-product1");
            $product->ammount = $request->input("amount-product1");
            $product->status = $request->input("status-product1");
            $product->id_sector = $request->input("sector-product1");

            $product->save();

            $entrance = Entrance::create([
                'input' => $product->name,
                'description' => 'Entrada de Producto',
                'date_create' => Carbon::parse($product['created_at'])->format('Y-m-d'),
                'identifer' => $product->id,
                'id_user' => Auth::user()->id,
            ]);
            return redirect()->back()->with('success', 'El registro se ha actualizado con exito, se agrego nueva ENTRADA y REGISTRO GENERAL');
        } else {
            $product->name = $request->input("name-product1");
            $product->description = $request->input("des-product1");
            $product->price = $request->input("price-product1");
            $product->size = $request->input("tall-product1");
            $product->color = $request->input("color-product1");
            $product->avilable = $request->input("avilable-product1");
            $product->ammount = $request->input("amount-product1");
            $product->photo = $request->input("photo-product1");
            $product->status = $request->input("status-product1");
            $product->id_sector = $request->input("sector-product1");

            $product->save();

            return redirect()->back()->with('success', 'El registro se ha actualizado con exito');
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return redirect()->route('product.index')
            ->with('success', 'Producto eliminado');
    }
}

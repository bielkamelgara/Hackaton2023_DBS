<?php

namespace App\Livewire\Product;

use App\Models\Entrance;
use App\Models\Product;
use App\Models\Sector;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $price;
    public $tall;
    public $color;
    public $selectedAvilable;
    public $amount;
    public $photo;
    public $newphoto;
    public $selectedStatus;
    public $selectedSector;

    public function save()
    {
        $name = Auth::user()->id . date("Y-m-d") . '-' . date("h-i-sa") . '.' . $this->photo->extension();
        $this->newphoto = $name;
        $this->photo->storeAs('product', $name);

        $product = Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'size' => $this->tall,
            'color' => $this->color,
            'avilable' => $this->selectedAvilable,
            'ammount' => $this->amount,
            'photo' => $this->newphoto,
            'photoname' => $this->newphoto,
            'status' => $this->selectedStatus,
            'id_user' => Auth()->user()->id,
            'id_sector' => $this->selectedSector,
        ]);

        $entrance = Entrance::create([
            'input' => $this->name,
            'description' => 'Entrada de Producto',
            'date_create' => Carbon::parse($product['created_at'])->format('Y-m-d'),
            'identifer' => $product->id,
            'id_user' => Auth::user()->id,
        ]);

        return redirect()->route('product.index')
            ->with('success', 'Registro Completado con exito, se agrego nueva ENTRADA');
    }

    public function render()
    {
        return view('livewire.product.create-product')->with([
            'sectors' => Sector::all(),
        ]);
    }
}

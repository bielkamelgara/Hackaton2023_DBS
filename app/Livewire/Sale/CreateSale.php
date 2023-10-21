<?php

namespace App\Livewire\Sale;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateSale extends Component
{
    public $selectedCategory = null;
    public $selectedOutput;
    public $quantity;
    public $priceval;
    public $val;
    public $quantityOrigin;
    public $date;
    public $output;
    public $selectedMoney;
    public $identifer;

    public function updatedSelectedOutput($value)
    {
        if(!is_null($value)){
            $product = Product::where('name',$value)->first();

            if(!is_null($product)){
                $this->priceval = $product->price;
                $this->val = $product->price;
                $this->quantity = 1;
                $this->quantityOrigin = $product->ammount;
                $this->identifer = $product->id;
            }
        }
    }

    public function updatedQuantity($value)
    {
        if (!is_null($value)) {
            if ($value === '') {
                $this->selectedMoney = 1;
                $this->priceval = 0;
            }

            elseif (!is_null($this->val)) {
                $this->selectedMoney = 1;
                $this->priceval = intval($value) * intval($this->val);
            }
        }
    }

    public function updatedSelectedMoney($value)
    {
        if(!is_null($value)){
            if($value == 1){
                $this->priceval = $this->priceval / 36.67;
            }

            elseif($value == 2){
                $this->priceval = $this->priceval * 36.67;
            }
        }
    }

    public function save()
    {
        if($this->quantity > $this->quantityOrigin){
            return redirect()->route('salecreate')
                ->with('error', 'La cantidad no es admitida');
        }

        if($this->selectedCategory == 'Animal'){
            $product = Product::where('name', $this->selectedOutput)->first();
            if($product){
                $product->ammount = $product->ammount - $this->quantity;
                $product->save();
            }
        }

        $sale = Sale::create([
            'category' => $this->selectedCategory,
            'output' => $this->selectedOutput,
            'quantity' => $this->quantity,
            'price' => $this->priceval,
            'date' => $this->date,
            'id_user' => Auth::user()->id,
        ]);

        return redirect()->route('saleshow')
        ->with('success','Se ha realizado el registro de salida con EXITO');
    }

    public function render()
    {
        return view('livewire.sale.create-sale')->with([
            'products' => Product::where('id_user', Auth()->user()->id)->get(),
        ]);
    }
}

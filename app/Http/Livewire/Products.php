<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $orderProducts = [];
    public $allProducts = [];

    public function mount()
    {
        $this->allProducts = Product::all();
        $this->orderProducts = [
            ['product_id' => '', 'quantity' => 1]
        ];
    }

    public function addProduct()
    {
        $this->orderProducts[] = ['product_id' => '', 'quantity' => 1];
    }

    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }

    public function render()
    {
        info($this->orderProducts);
        return view('livewire.products');
    }
}

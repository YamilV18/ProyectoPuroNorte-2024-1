<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductLivewire extends Component
{
    public $carta;
    public function render()
    {
        $products=Product::all();
        return view('livewire.product-livewire',compact('products'));
    }
}

<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class IndexLivewire extends Component
{
    public function render()
    {
        $cartas=Product::paginate(6);
        return view('livewire.index-livewire',compact('cartas'));
    }
}

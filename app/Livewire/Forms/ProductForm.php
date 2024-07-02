<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductForm extends Form
{
    #[Rule('required')]
    public $tipo_producto,$nombre,$descripcion,$precio;
        // public function mount($id){//para el caso del fk
    //     $this->position_id=$id;
    // }

}

<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MesasForm extends Form
{
    #[Rule('required')]
    public $numero,$aforo;


}

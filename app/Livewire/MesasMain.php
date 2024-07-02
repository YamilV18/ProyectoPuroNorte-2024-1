<?php

namespace App\Livewire;

use App\Livewire\Forms\MesasForm;
use App\Models\Table;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\WireUiActions;

class MesasMain extends Component
{
    public function render()
    {
        $mesas=Table::all();
        return view('livewire.mesas-main',compact('mesas'));
    }

    use WithPagination;
    use WireUiActions;
    public $isOpen=false;
    //public $position_id;
    public ?Table $table;
    public MesasForm $form;
    public $search;

    // public function mount($id){
    //     $this->position_id=$id;
    //     $this->form->mount($id);
    // }
    public function create(){
        $this->isOpen=true;
        $this->form->reset();
        $this->reset(['table']);
        $this->resetValidation();
        //$this->form->mount($this->supplier_id);
    }

    public function edit(Table $table){
        //dd($vehicle);
        $this->table=$table;
        $this->form->fill($table);
        $this->isOpen=true;
        $this->resetValidation();
    }

    public function store(){
        $this->validate();
        if(!isset($this->table->id)){
            Table::create($this->form->all());
            $this->dialog()->success(
                $title = 'Mensaje del sistema',
                $description = 'Registro creado'
            );
        }else{
            $this->table->update($this->form->all());
            $this->dialog()->success(
                $title = 'Mensaje del sistema',
                $description = 'Registro actualizado'
            );
        }
        $this->reset(['isOpen']);
    }

    public function destroy(Table $player){
        $player->delete();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
}

<?php

namespace App\Livewire;

use App\Livewire\Forms\OrderForm;
use App\Models\Order;
use App\Models\Table;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class OrderMain extends Component
{
    public function render()
    {
        $orders=Order::where('estado','LIKE','%'.$this->search.'%')->latest('id')->paginate(10);
        $tables=Table::all();
        return view('livewire.order-main',compact('orders','tables'));

    }

    use WithPagination;
    use Actions;
    public $isOpen=false;
    public $position_id;
    public ?Order $order;
    public OrderForm $form;
    public $search;

    // public function mount($id){
    //     $this->position_id=$id;
    //     $this->form->mount($id);
    // }
    public function create(){
        $this->isOpen=true;
        $this->form->reset();
        $this->reset(['order']);
        $this->resetValidation();
        //$this->form->mount($this->supplier_id);
    }

    public function edit(Order $order){
        //dd($vehicle);
        $this->order=$order;
        $this->form->fill($order);
        $this->isOpen=true;
        $this->resetValidation();
    }

    public function store(){
        $this->validate();
        if(!isset($this->order->id)){
            Order::create($this->form->all());
            $this->dialog()->success(
                $title = 'Mensaje del sistema',
                $description = 'Registro creado'
            );
        }else{
            $this->order->update($this->form->all());
            $this->dialog()->success(
                $title = 'Mensaje del sistema',
                $description = 'Registro actualizado'
            );
        }
        $this->reset(['isOpen']);
    }

    public function destroy(Order $order){
        $order->delete();
    }

    public function updatingSearch(){
        $this->resetPage();
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }
}

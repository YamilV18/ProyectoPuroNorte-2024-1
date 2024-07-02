<x-modal.card title="Registro Producto" blur wire:model.defer="isOpen">
    <div class="my-2 md:mr-2 md:mb-0 w-full">
        <div class="col-span-3">
            <x-input wire:model="form.tipo_producto" label="Tipo de Producto"/>
        </div>
    </div>
    <div class="my-2 md:mr-2 md:mb-0 w-full">
        <x-input  wire:model="form.nombre" label="Nombre del Producto"/>
    </div>
    <div class="my-2 md:mr-2 md:mb-0 w-full">
        <x-input wire:model="form.descripcion" label="Descripción del Producto"/>
    </div>
    <div class="my-2 md:mr-2 md:mb-0 w-full">
        <x-input wire:model="form.precio" label="Precio del Producto"/>
    </div>
    <x-slot name="footer">
        <div class="flex justify-end gap-x-2">
            <x-button flat label="Cancelar" x-on:click="close()" />
            <x-button primary label="Registrar" wire:click="store()" />
        </div>
    </x-slot>
</x-modal.card>

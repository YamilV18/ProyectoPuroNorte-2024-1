<!-- resources/views/livewire/modal-form.blade.php -->

<div>
    <button wire:click="openModal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Abrir Formulario
    </button>

    <!-- Modal -->
    @if($isOpen)
    <div class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg w-1/2 p-8">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold">REGISTRAR MESA</h3>
                <button wire:click="closeModal" class="text-gray-500 hover:text-gray-700">&times;</button>
            </div>
            <div class="my-2 md:mr-2 md:mb-0 w-full">
                <x-input wire:model="form.numero" label="Número"/>
            </div>

            <div class="my-2 md:mr-2 md:mb-0 w-full">
                <x-input wire:model="form.aforo" label="Afóro"/>
            </div>




                <div class="flex justify-end gap-x-2 py-2">
                    <x-button primary label="Registrar" wire:click="store()" />
                </div>

        </div>
    </div>
    @endif
</div>

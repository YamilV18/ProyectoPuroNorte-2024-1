<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mesas') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex items-center justify-between dark:text-gray-400 gap-4 mb-2">
                <input icon="search" placeholder="Buscar registro" wire:model.live="search"/>
                <x-button wire:click="create()" spinner="create" icon="plus" primary label="Nuevo"/>
                    @if($isOpen)
                        @include('livewire.mesas-create')
                    @endif
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 py-5 px-4">

                    @foreach($mesas as $mesa)
                    <!-- Card 1 -->
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex flex-col items-center">
                        <div class="toggle-button bg-green-700 hover:bg-red-500 text-white font-semibold py-3 px-6 border border-green-700 hover:border-transparent rounded w-full h-full">
                            <h1 class="font-bold my-7 mt-0">N° de Mesa: {{ $mesa->numero }}</h1>
                            <h2>Aforo: {{ $mesa->aforo }}</h2>
                        </div>
                        <div class="grid grid-cols-2 gap-4 py-1">
                            <button class="bg-red-500 text-white font-semibold py-1 px-3 rounded" wire:click="destroy({{$mesa}})">
                                Borrar
                            </button>
                            <button class="bg-blue-500 text-white font-semibold py-1 px-3 rounded" wire:click="edit({{$mesa}})">
                                Editar
                            </button>
                        </div>
                    </div>





                    <!-- Repeat for other cards -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.toggle-button').forEach(button => {
            button.onclick = function() {
                this.classList.toggle('bg-green-700');
                this.classList.toggle('bg-red-500');
                this.classList.toggle('border-green-700');
                this.classList.toggle('border-red-500');
            };
        });
    </script>
</div>

<div class="py-5">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-600 leading-tight">
            Pedido
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center justify-between dark:text-gray-400 gap-4 mb-2">

            <x-button wire:click="create()" spinner="create" icon="plus" primary label="Nuevo"/>
                @if($isOpen)
                    @include('livewire.order-create')
                @endif
        </div>

        <!--Tabla lista de items   -->
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="w-full divide-y divide-gray-200 table-auto">
              <thead class="bg-indigo-500 text-white">
                <tr class="text-left text-xs font-bold  uppercase">
                  <td scope="col" class="px-6 py-3">ID</td>
                  <td scope="col" class="px-6 py-3">Estado/Info del pedido </td>
                  <td scope="col" class="px-6 py-3">Mesa </td>

                  <td scope="col" class="px-6 py-3 text-center">Opciones</td>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 dark:text-gray-400">
                @foreach($orders as $item)
                <tr class="text-sm font-medium text-gray-900">
                  <td class="px-6 py-4">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-500 text-white">
                      {{$item->id}}
                    </span>
                  </td>
                  <td class="px-6 py-4 dark:text-gray-200">{{$item->estado}}</td>
                  <td class="px-6 py-4 dark:text-gray-200">{{$item->table->numero}}</td>

                  <td class="px-6 py-4 text-right">
                    <button class="bg-red-500 text-white font-semibold py-1 px-3 rounded" wire:click="destroy({{$item}})">
                        Borrar
                    </button>
                    <button class="bg-blue-500 text-white font-semibold py-1 px-3 rounded" wire:click="edit({{$item}})">
                        Editar
                    </button>


                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        @if(!$orders->count())
            <p class="dark:text-gray-200">No existe ningun registro</p>
        @endif
        @if($orders->hasPages())
        <div class="px-6 py-3">
            {{$orders->links()}}
        </div>
        @endif

        </div>
      </div>
</div>


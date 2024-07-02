<div class="py-5">
    <x-slot name="header" class="">
        <h2 class="font-semibold text-xl text-black dark:text-gray-200 leading-tight ">
            PRODUCTOS
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gradient-to-r from-black via-orange-900 to-black ..." >
        <div class="flex items-center justify-between dark:text-gray-400 gap-4 mb-2">
            <x-input icon="search" placeholder="Buscar registro" wire:model.live="search" class="w-full border border-orange-500"/>
            <x-button wire:click="create()" spinner="create" icon="plus" primary label="Nuevo" class="bg-orange-500 hover:bg-orange-600 text-black"/>
            @if($isOpen)
                @include('livewire.product-create')
            @endif
        </div>
        <!--Tabla lista de items-->
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="w-full divide-y divide-gray-200 table-auto">
                <thead class=" bg-gradient-to-r from-black via-orange-900 to-black ... text-orange-700">
                    <tr class="text-left text-xs font-bold uppercase">
                        <td scope="col" class="px-6 py-3">ID</td>
                        <td scope="col" class="px-6 py-3">Tipo de Producto</td>
                        <td scope="col" class="px-6 py-3">Nombre del Producto</td>
                        <td scope="col" class="px-6 py-3">Descripción del Producto</td>
                        <td scope="col" class="px-6 py-3">Precio del Producto</td>
                        <td scope="col" class="px-6 py-3 text-center">Opciones</td>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:text-gray-100">
                    @foreach($productos as $product)
                        <tr class="text-sm font-medium text-gray-900">
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-700 text-black">
                                    {{$product->id}}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-white">{{$product->tipo_producto}}</td>
                            <td class="px-6 py-4 text-white">{{$product->nombre}}</td>
                            <td class="px-6 py-4 text-white">{{$product->descripcion}}</td>
                            <td class="px-6 py-4 text-white">{{$product->precio}}</td>
                            <td class="px-6 py-4 text-right">
                                <x-button.circle wire:click="edit({{$product}})" primary icon="pencil" class="bg-orange-500 hover:bg-orange-600 text-white"/>
                                <x-button.circle
                                negative
                                icon="x"
                                wire:click="destroy({{$product}})"
                            />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if(!$productos->count())
            <div class="py-4 text-center text-white">No existe ningún registro coincidente</div>
        @endif
        @if($productos->hasPages())
            <div class="px-6 py-3">
                {{$productos->links()}}
            </div>
        @endif
    </div>
</div>

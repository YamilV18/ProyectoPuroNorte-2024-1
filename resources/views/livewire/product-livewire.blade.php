
<div>
    <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-4">
        @foreach ($products as $product)
            <div class="bg-slate-400 w-full p-2 rounded-lg">
                <div class="bg-blue-950 grid grid-cols-6 p-2">
                    <div class="flex justify-center items-center">
                        <h2 class="text-yellow-600 text-3xl">{{$product->tipo_producto}}</h2>
                    </div>
                    <div class="col-span-5 text-gray-100">
                        <h3 class="text-sm text-yellow-600">{{$product->nombre}}</h3>
                        <h4>{{$product->descripcion}}</h4>
                        <h5 class="text-xs text-yellow-600">{{$product->precio}}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


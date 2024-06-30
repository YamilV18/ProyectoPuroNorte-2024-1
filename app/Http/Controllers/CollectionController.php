<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CollectionController extends Controller
{
    use ApiResponser;

    public function index()
    {
        $collections = Collection::with('orders')->get();
        return $this->successResponse($collections);
    }
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'monto_total' => 'required|string',
            'orders' => 'required|array|min:1', // Al menos una orden debe ser proporcionado
            'orders.*.order_id' => 'required|exists:orders,id',
        ]);

        // Crear una nueva orden
        $collection = new Collection();
        $collection->monto_total = $request->monto_total;
        $collection->save();

        // Adjuntar orderos a la orden a través de la relación many-to-many
        foreach ($request->orders as $order) {
            $collection->orders()->attach($order['order_id']);
        }

        // Recargar la orden con los orderos asociados
        $collection->load('orders');

        return $this->successResponse($collection, Response::HTTP_CREATED);
    }

    /**
     * Display the specified collection.
     */
    public function show(Collection $collection)
    {
        $collection->load('orders');
        return $this->successResponse($collection);
    }

    /**
     * Update the specified collection.
     */
    public function update(Request $request, Collection $collection)
    {
        // Validar los datos de entrada
        $request->validate([
            'monto_total' => 'sometimes|string',
            'orders' => 'sometimes|array', // La lista de pedidos es opcional
            'orders.*.order_id' => 'required|exists:orders,id',
        ]);

        // Actualizar la orden
        if ($request->has('monto_total')) {
            $collection->monto_total = $request->monto_total;
        }
        $collection->save();

        // Sincronizar los orderos asociados a la orden a través de la relación many-to-many
        if ($request->has('orders')) {
            $orderIds = collect($request->orders)->pluck('order_id');
            $collection->orders()->sync($orderIds);
        }

        // Recargar la orden con los orderos actualizados
        $collection->load('orders');

        return $this->successResponse($collection);
    }

    /**
     * Remove the specified collection.
     */
    public function destroy(Collection $collection)
    {
        $collection->orders()->detach();
        $collection->delete();

        return $this->successResponse($collection);
    }
}

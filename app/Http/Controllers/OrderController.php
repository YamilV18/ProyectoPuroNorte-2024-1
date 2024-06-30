<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    use ApiResponser;

    /**
     * Display a listing of the orders with their products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('products')->get();
        return $this->successResponse($orders);
    }

    /**
     * Display the specified order with its products.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order->load('products');
        return $this->successResponse($order);
    }

    /**
     * Store a newly created order with products.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'estado' => 'required|string',
            'table_id' => 'required|exists:tables,id', // Validar table_id
            'products' => 'required|array|min:1', // Al menos un producto debe ser proporcionado
            'products.*.product_id' => 'required|exists:products,id',
        ]);

        // Crear una nueva orden
        $order = new Order();
        $order->estado = $request->estado;
        $order->table_id = $request->table_id; // Asignar table_id
        $order->save();

        // Adjuntar productos a la orden a través de la relación many-to-many
        foreach ($request->products as $product) {
            $order->products()->attach($product['product_id']);
        }

        // Recargar la orden con los productos asociados
        $order->load('products');

        return $this->successResponse($order, Response::HTTP_CREATED);
    }

    /**
     * Update the specified order with products.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        // Validar los datos de entrada
        $request->validate([
            'estado' => 'sometimes|string',
            'table_id' => 'sometimes|required|exists:tables,id', // Validar table_id si está presente
            'products' => 'sometimes|array', // La lista de productos es opcional
            'products.*.product_id' => 'required|exists:products,id',
        ]);

        // Actualizar la orden
        if ($request->has('estado')) {
            $order->estado = $request->estado;
        }
        if ($request->has('table_id')) {
            $order->table_id = $request->table_id; // Asignar table_id si está presente
        }
        $order->save();

        // Sincronizar los productos asociados a la orden a través de la relación many-to-many
        if ($request->has('products')) {
            $productIds = collect($request->products)->pluck('product_id');
            $order->products()->sync($productIds);
        }

        // Recargar la orden con los productos actualizados
        $order->load('products');

        return $this->successResponse($order);
    }

    /**
     * Remove the specified order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        // Eliminar la orden y los registros asociados en la tabla pivot 'product_order'
        $order->products()->detach();
        $order->delete();

        return $this->successResponse($order);
    }
}

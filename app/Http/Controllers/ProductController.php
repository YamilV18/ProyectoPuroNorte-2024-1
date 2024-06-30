<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    use ApiResponser;

    public function index(){
        $products=Product::all();
        return $this->successResponse($products);
    }

    public function store(Request $request){
        $rules=[
            'tipo_producto'=>'required|max:255',
            'nombre'=>'required|max:255',
            'descripcion'=>'required|max:255',
            'precio'=>'required|max:255',
        ];
        $this->validate($request,$rules);
        $product=Product::create($request->all());
        return $this->successResponse($product,Response::HTTP_CREATED);
    }

    public function update(Request $request,$product){
        $rules=[
            'tipo_producto'=>'required|max:255',
            'nombre'=>'required|max:255',
            'descripcion'=>'required|max:255',
            'precio'=>'required|max:255',
        ];
        $this->validate($request,$rules);
        $product=Product::findOrFail($product);
        $product->fill($request->all());
        if($product->isClean()){
            return $this->errorResponse('Al menos un campo debe cambiar',Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $product->save();
        return $this->successResponse($product,Response::HTTP_CREATED);
    }

    public function show($product){
        $product=Product::findOrFail($product);
        return $this->successResponse($product);

    }
    public function destroy($product){
        $product=Product::findOrFail($product);
        $product->delete();
        return $this->successResponse($product);
    }
}

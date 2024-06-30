<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TableController extends Controller
{
    use ApiResponser;

    public function index(){
        $tables=Table::all();
        return $this->successResponse($tables);
    }

    public function store(Request $request){
        $rules=[
            'numero'=>'required|max:255',
            'aforo'=>'required|max:255'
        ];
        $this->validate($request,$rules);
        $table=Table::create($request->all());
        return $this->successResponse($table,Response::HTTP_CREATED);
    }

    public function update(Request $request,$table){
        $rules=[
            'numero'=>'required|max:255',
            'aforo'=>'required|max:255'
        ];
        $this->validate($request,$rules);
        $table=Table::findOrFail($table);
        $table->fill($request->all());
        if($table->isClean()){
            return $this->errorResponse('Al menos un campo debe cambiar',Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $table->save();
        return $this->successResponse($table,Response::HTTP_CREATED);
    }

    public function show($table){
        $table=Table::findOrFail($table);
        return $this->successResponse($table);

    }
    public function destroy($table){
        $table=Table::findOrFail($table);
        $table->delete();
        return $this->successResponse($table);
    }
}

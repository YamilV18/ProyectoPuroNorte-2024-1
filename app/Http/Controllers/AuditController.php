<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    /**
     * Display a listing of the audits.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audits = Audit::all();
        return response()->json($audits);
    }

    /**
     * Store a newly created audit in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'collection_id' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'accion' => 'required',
        ]);

        $audit = Audit::create($request->all());
        return response()->json($audit, 201);
    }

    /**
     * Display the specified audit.
     *
     * @param  \App\Models\Audit  $audit
     * @return \Illuminate\Http\Response
     */
    public function show(Audit $audit)
    {
        return response()->json($audit);
    }

    /**
     * Update the specified audit in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Audit  $audit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Audit $audit)
    {
        $request->validate([
            'collection_id' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'accion' => 'required',
        ]);

        $audit->update($request->all());
        return response()->json($audit, 200);
    }

    /**
     * Remove the specified audit from storage.
     *
     * @param  \App\Models\Audit  $audit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audit $audit)
    {
        $audit->delete();
        return response()->json(null, 204);
    }
}

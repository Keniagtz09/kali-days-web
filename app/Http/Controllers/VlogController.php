<?php

namespace App\Http\Controllers;
use App\Models\Vlog;

use Illuminate\Http\Request;

class VlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function index()
    {
        $vlogs = Vlog::all(); // Trae todos los vlogs de la base de datos
        return view('welcome', compact('vlogs')); // Se los envía a tu diseño
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Vlog::create($request->all()); // Guarda los datos que vienen del formulario
        return redirect()->route('vlogs.index'); // Te regresa a la página principal
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vlog $vlog)
    {
        // Retorna una vista de edición enviando el vlog específico
        return view('edit', compact('vlog'));
    }

    public function update(Request $request, Vlog $vlog)
    {
        // Actualiza los datos con lo que viene del formulario
        $vlog->update($request->all());
        return redirect()->route('vlogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vlog $vlog)
    {
        $vlog->delete(); // Borra el registro de la base de datos
        return redirect()->route('vlogs.index'); // Recarga la página
    }
}

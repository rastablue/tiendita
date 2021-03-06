<?php

namespace App\Http\Controllers;

use App\Compra;
use App\Producto;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function calificar($compra)
    {
        $compras = Compra::where('id', $compra)->first();
        $show_ventas = '';
        $show_compras = ' show';
        $show_configuracion = '';

        return view('compras.calificar', compact('compras', 'show_ventas', 'show_compras', 'show_configuracion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra, $id)
    {
        $compras = Compra::where('user_id', $id)->get();
        $show_ventas = '';
        $show_compras = ' show';
        $show_configuracion = '';
        $selected1 = 'black';

        return view('compras.show', compact('compras', 'show_ventas', 'show_compras', 'show_configuracion', 'selected1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        //
    }
}

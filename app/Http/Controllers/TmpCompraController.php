<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\TmpCompra;
use Illuminate\Http\Request;

class TmpCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function tmp_compras(Request $request)
    {
        $producto = Producto::where('codigo',$request->codigo)->first();
        $session_id = session()->getId();

        if($producto){

            $tmpCompra_existe = TmpCompra::where('producto_id',$producto->id)
                                         ->where('session_id',$session_id)->first();

            if($tmpCompra_existe){
                $tmpCompra_existe->cantidad += $request->cantidad;
                $tmpCompra_existe->save();
                return response()->json(['success'=>true,'message'=>'El producto fue encontrado']);
            }else{
                $tmpCompra = new TmpCompra();

                $tmpCompra->cantidad = $request->cantidad;
                $tmpCompra->producto_id = $producto->id;
                $tmpCompra->session_id = $session_id;
                $tmpCompra->save();
                return response()->json(['success'=>true,'message'=>'El producto fue encontrado']);
            }
           
        }else{
            return response()->json(['success'=>false,'message'=>'producto no encontrado']);
        }
    }
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TmpCompra $tmpCompra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TmpCompra $tmpCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TmpCompra $tmpCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        TmpCompra::destroy($id);
        return response()->json(['success'=>true]);
    }
}

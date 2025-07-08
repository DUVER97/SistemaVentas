<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::with('categoria')->get();
        return view('admin.productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.productos.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $datos = $request->all();
        // return response()->json($datos);

         $request->validate([
                'codigo'=>'required|unique:productos,codigo',
                'nombre'=>'required',
                'stock'=>'required',
                'stock_minimo'=>'required',
                'stock_maximo'=>'required',
                'precio_compra'=>'required',
                'precio_venta'=>'required',
                'fecha_ingreso'=>'required',
        ]);

        $producto = new Producto();

        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->stock = $request->stock;
        $producto->stock_minimo = $request->stock_minimo;
        $producto->stock_maximo = $request->stock_maximo;
        $producto->precio_compra = $request->precio_compra;
        $producto->precio_venta = $request->precio_venta;
        $producto->fecha_ingreso = $request->fecha_ingreso;
        $producto->categoria_id = $request->categoria_id;
        $producto->empresa_id = Auth::user()->empresa_id;

        if($request->hasFile('imagen')){
                $producto->imagen = $request->file('imagen')->store('productos','public');
            }
        
        $producto->save();

        return redirect()->route('admin.productos.index')
            ->with('mensaje','Se registro el producto correctamente')
            ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}

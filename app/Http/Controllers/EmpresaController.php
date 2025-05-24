<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paises = DB::table('countries')->get();
        $estados = DB::table('states')->get();
        $ciudades = DB::table('cities')->get();
        $monedas = DB::table('currencies')->get();
        return view('admin.empresas.create',compact('paises','estados','ciudades','monedas'));
    }

    public function buscar_estado($id_pais){
        // echo $id_pais;
        try{
            $estados = DB::table('states')->where('country_id',$id_pais)->get();
            return view('admin.empresas.cargar_estados',compact('estados'));
        }catch(\Exception $exception){
            return response()->json(['mensaje'=>'error']); 
        }
    }
    public function buscar_ciudad($id_estado){
        try{
            $ciudades = DB::table('cities')->where('state_id',$id_estado)->get();
            return view('admin.empresas.cargar_ciudades',compact('ciudades'));
        }catch(\Exception $exception){
            return response()->json(['mensaje'=>'error']); 
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();
        return response()->json($datos);
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index(){
        $total_roles = Role::count();
        $total_usuarios = User::count();
        $total_categorias = Categoria::count();

        $empresa_id = Auth::user()->empresa_id;
        $empresa = Empresa::where('id',$empresa_id)->first();
        return view('admin.index', compact('empresa','total_roles','total_usuarios','total_categorias'));
    }
}

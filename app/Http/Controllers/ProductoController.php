<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\ProductoSeeder;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::paginate(12);

        return view('productos.index', compact('productos'));
    }
    public function create(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'imagen' => 'required|file|mimes:jpeg,jpg,png,gif|max:20480',
            'url' => 'required|url',
            'precio' => 'required|numeric',
        ]);

        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'imagen' => 'required|file|mimes:jpeg,jpg,png,gif|max:20480',
            'url' => 'required|url',
            'precio' => 'required|numeric',
        ]);

        $imagenPath = $request->file('imagen')->store('public/productos');
        $producto = new Producto([
            'nombre' => $request->input('nombre'),
            'imagen' => $imagenPath,
            'url' => $request->input('url'),
            'precio' => $request->input('precio'),
            'user_id' => Auth::id()
        ]);
        $producto->save();
        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }


    public function delete($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto borrado correctamente');
    }
}

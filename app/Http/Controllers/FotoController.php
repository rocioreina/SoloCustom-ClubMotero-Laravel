<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Voto;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class FotoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $fotos = Foto::withCount('votos')
            ->orderBy('votos_count', 'desc')
            ->paginate(12);


        return view("fotos.index", compact('fotos', 'user'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'fecha' => 'required|date|date_format:Y-m-d',
            'imagen' => 'required|file|mimes:jpeg,jpg,png,gif|max:20480',
        ]);
        $imagenPath = $request->file('imagen')->store('public/fotos');
        $foto = new Foto();
        $foto->nombre = $request->input('nombre');
        $foto->fecha = $request->input('fecha');
        $foto->imagen = $imagenPath;
        $foto->user_id = Auth::id();
        $foto->save();
        
        return redirect()->route('fotos.index')->with('success', 'Foto creada correctamente');
    }
    public function getEdit($id)
    {
        $foto = Foto::find($id);
        if (!$foto) {
            return redirect()->route('fotos.index')->with('error', 'Foto no encontrada');
        }

        return view('fotos.edit', compact('foto'));
    }

    public function putEdit(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'fecha' => 'required|date|date_format:Y-m-d',
            'imagen' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:20480',
        ]);


        $foto = Foto::find($id);
        if (!$foto) {
            return redirect()->route('fotos.index')->with('error', 'foto no encontrada');
        }

        $foto->nombre = $request->input('nombre');
        $foto->fecha = $request->input('fecha');

        if ($request->hasFile('imagen')) {
            Storage::delete($foto->imagen);
            $fotoPath = $request->file('imagen')->store('public/fotos');
            $foto->imagen = $fotoPath;
        }


        $foto->save();

        return redirect()->route('fotos.index')->with('success', 'Foto editada correctamente');

        
    }

    public function delete($id)
    {
        $foto = Foto::find($id);
        if (!$foto) {
            return redirect()->route('fotos.index')->with('error', 'Foto no encontrada');
        }

        Storage::delete($foto->imagen);
        $foto->delete();

        return redirect()->route('fotos.index')->with('success', 'Foto borrada correctamente');
        
    }

    public function voto($id)
    {
        $foto = Foto::find($id);

        if (!$foto) {
            return redirect()->route('fotos.index')->with('error', 'Foto no encontrada');
        }
        $user = Auth::user();
        if ($user->hasVotedFor($foto)) {
            return redirect()->route('fotos.index')->with('error', 'Ya has votado por esta foto');
        }

        $voto = new Voto();
        $voto->user_id = $user->id;
        $voto->foto_id = $foto->id;
        $voto->save();

        return redirect()->route('fotos.index')->with('success', 'Has votado por esta foto');
    }

    public function eliminarVoto(Foto $foto)
    {
        $user = Auth::user();
        $voto = Voto::where('user_id', $user->id)->where('foto_id', $foto->id)->first();
        if ($voto) {
            $voto->delete();
        }
        return redirect()->route('fotos.index')->with('success', 'Has eliminado tu voto');
    }
}

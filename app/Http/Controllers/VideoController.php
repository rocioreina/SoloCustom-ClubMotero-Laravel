<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $query = Video::orderBy('created_at', 'desc');
        if ($request->has('descripcion')) {
            $descripcion = $request->input('descripcion');
            $query->where('descripcion', 'LIKE', "%$descripcion%");
        }
        $videos = $query->get();
        return view('videos.index', compact('videos'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'fecha' => 'required|date|date_format:Y-m-d',
            'video' => 'required|file|mimes:mp4,mov,avi,flv|max:20480',
        ]);

        $videoPath = $request->file('video')->store('public/videos');
        $video = new Video();
        $video->nombre = $request->input('nombre');
        $video->descripcion = $request->input('descripcion');
        $video->fecha = $request->input('fecha');
        $video->video = $videoPath;
        $video->user_id = Auth::id();
        $video->save();

        return redirect()->route('videos.index')->with('success', 'Video creado correctamente');
    }

    public function getEdit($id)
    {
        $video = Video::find($id);
        if (!$video) {
            return redirect()->route('videos.index')->with('error', 'Video no encontrado');
        }

        return view('videos.edit', compact('video'));
    }

    public function putEdit(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'fecha' => 'required|date|date_format:Y-m-d',
            'video' => 'nullable|file|mimes:mp4,mov,avi,flv|max:20480',
        ]);

        $video = Video::find($id);
        if (!$video) {
            return redirect()->route('videos.index')->with('error', 'Video no encontrado');
        }

        $video->nombre = $request->input('nombre');
        $video->descripcion = $request->input('descripcion');
        $video->fecha = $request->input('fecha');

        if ($request->hasFile('video')) {
            // Eliminar el video actual
            Storage::delete($video->video);
            // Subir el nuevo video
            $videoPath = $request->file('video')->store('public/videos');
            $video->video = $videoPath;
        }

        $video->save();

        return redirect()->route('videos.index')->with('success', 'Video editado correctamente');
    }


    public function delete($id)
    {
        $video = Video::find($id);
        if (!$video) {
            return redirect()->route('videos.index')->with('error', 'Video no encontrado');
        }

        Storage::delete($video->video);
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Video borrado correctamente');
    }
}

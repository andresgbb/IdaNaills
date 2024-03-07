<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Servicio;


class AdminController extends Controller
{
    public function edit(Request $request): View
    {
        return view('/admin', [
            'user' => $request->user(),
        ]);
    }
    public function crearServicio(Request $request){

        $datosFormulario = $request->all();
        $tiempo=$datosFormulario['duracion'];

        // Formatear los minutos en un formato de tiempo compatible con la base de datos
        $duracion = sprintf('%02d:%02d:00', floor($tiempo / 60), $tiempo % 60);

        $servicio= new Servicio();
        $servicio->nombre = $datosFormulario['nombre'];
        $servicio->precio = $datosFormulario['precio'];
        $servicio->duracion= $duracion;
        $servicio->save();
        return view('home');
     }
     public function eliminar($id){
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();
        return redirect()->back()->with('success', 'Servicio Eliminado correctamente');
     }

}

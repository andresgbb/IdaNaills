<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Reserva;

class ReservaController extends Controller
{
    public function edit(Request $request): View
    {
        return view('/reservas', [
            'user' => $request->user(),
        ]);
    }

    public function confirmar(Request $request)
    {
        // Validación de datos...

        $datosFormulario = $request->all();

        // Redirigir a la vista reservaconfirmar y pasar los datos del formulario
        return view('confirmar', compact('datosFormulario'));

        // Si no existe una reserva para esa hora, continuar con la confirmación de la reserva...
    }

    public function crearReserva(Request $request)
    {
        $userId = auth()->id();
        // Crear la reserva
        $reserva = new Reserva();
        $reserva->user_id = $userId;
        $reserva->fecha = $request->input('fecha_reserva');
        $reserva->hora = $request->hora_reserva;
        $reserva->save();
        return view('home');
    }
    public function eliminar($id, $fecha, $hora)
    {
        // Encuentra y elimina la reserva utilizando la ID, fecha y día proporcionados
        $reserva = Reserva::where('id', $id)
                            ->where('fecha', $fecha)
                            ->where('hora', $hora)
                            ->firstOrFail();
        $reserva->delete();

        return redirect()->back()->with('success', 'Reserva eliminada correctamente');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComisionController extends Controller
{
    public function index()
    {
        return view('comision');
    }

    public function calcular(Request $request)
    {
        $precioInicial = $request->input('precio_inicial');
        $precioPublico = $request->input('precio_publico');
        $precioVenta = $request->input('precio_venta');
        $cantidad = $request->input('cantidad');

        // Calcular el margen natural
        $margenNatural = $precioPublico - $precioInicial;

        if ($precioVenta == $precioPublico) {
            $comision = $margenNatural * $cantidad;
        } else {
            $margenExtra = ($precioVenta - $precioPublico) / 2;
            $comision = ($margenExtra + $margenNatural) * $cantidad;
        }

        return redirect()->back()->with('comision', "Comisión: $" . number_format($comision, 2));
    }
}


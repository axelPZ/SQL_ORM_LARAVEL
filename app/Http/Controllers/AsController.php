<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ventas;

class AsController extends Controller
{
    public function querys(){

        // SELECT Ventas_Id AS id, Ventas_Fecha AS fecha, Ventas_CliId AS idCliente, Ventas_NroFactura AS NoFactura, Ventas_Total AS total FROM ventas
        // WHERE Ventas_fecha >= '2018-01-01'
        // AND Ventas_fecha <= '2018-01-05'
        //     AND (Ventas_CliId = 1
        //             OR (Ventas_CliId <> 1 AND Ventas_Total > 1000)
        //         )

        $result = ventas::select('Ventas_Id AS id', 'Ventas_Fecha AS fecha', 'Ventas_CliId AS idCliente', 'Ventas_NroFactura AS NoFactura', 'Ventas_Total AS total' )
        ->where( 'ventas_fecha', '>=', '2018-01-01')
        ->where( 'ventas_fecha', '<=', '2018-01-05')
        ->where( function( $query ) {
            $query->where( 'ventas_cliId', '=', 1)
                   ->orWhere( function( $query ) {
                       $query->where( 'ventas_cliId', '<>', 1 )
                             ->where( 'ventas_total', '>', 1000);
                   });
        })->get();

        $total = sizeof( $result );
        return response()->json(
        [
        'message' => 'aqui',
        'total' => $total,
        'result' => $result
        ], 200);
    }
}

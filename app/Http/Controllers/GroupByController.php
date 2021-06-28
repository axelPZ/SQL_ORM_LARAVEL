<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ventas;

class GroupByController extends Controller
{
    public function querys(){


        //SELECT ventas_fecha, SUM(ventas_total) AS total FROM ventas GROUP BY ventas_fecha

        // $result = ventas::orderBy( 'ventas_fecha', 'asc')
        //                     ->groupBy( 'ventas_fecha' )
        //                     ->selectRaw( "ventas_fecha, SUM(ventas_total) AS total" )
        //                     ->get();




        // SELECT YEAR(ventas_fecha) AS anio, MONTH(ventas_Fecha) AS mes, DAY(ventas_fecha) AS dia, SUM(ventas_total) AS total FROM ventas GROUP BY anio, mes, dia

        // $result = ventas::selectRaw( "YEAR(ventas_fecha) AS anio, MONTH(ventas_Fecha) AS mes, DAY(ventas_fecha) AS dia, SUM(ventas_total) as total")
        //                     ->groupBy('anio', 'mes', 'dia')
        //                     ->orderBY( 'dia', 'ASC')
        //                     ->get();



        // SELECT YEAR(ventas_fecha) AS anio,
            // MONTH(ventas_Fecha) AS mes,
            // SUM(ventas_total) AS 'Total de venta',
            // MIN(ventas_total) AS 'cantidad Minima',
            // MAX(ventas_total) AS 'cantidad Maxima',
            // AVG(ventas_total) AS 'promeido ventas',
            // COUNT(*) AS 'Total de ventas'
            //     FROM ventas WHERE ventas_cliID=1
            //     GROUP BY anio, mes


            $result = ventas::selectRaw( "YEAR(ventas_fecha) AS anio,
                                          MONTH(ventas_Fecha) AS mes,
                                          SUM(ventas_total) AS 'Total de venta',
                                          MIN(ventas_total) AS 'cantidad Minima',
                                          MAX(ventas_total) AS 'cantidad Maxima',
                                          AVG(ventas_total) AS 'promeido ventas',
                                          COUNT(*) AS 'Total de ventas' " )
                                ->where( 'ventas_cliID', '=', 1)
                                ->groupBy( 'anio', 'mes')
                                ->get();

       $total = sizeof( $result );
        return response()->json(
        [
        'message' => 'aqui',
       'total' => $total,
        'result' => $result
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ventas;

class SumController extends Controller
{
    // SUM
    public function sum(){

        // SELECT SUM(ventas_total) AS 'Total ventas' FROM ventas;

        //$result = ventas::sum("ventas_total");




        // SELECT SUM(ventas_total) AS 'Total ventas' FROM ventas WHERE MONTH(ventas_fecha)=1

        //$result = ventas::whereMonth( 'ventas_fecha', '=', 1)
        //                    ->sum( 'ventas_total' );




        // SELECT SUM(ventas_total) AS 'Total ventas' FROM ventas WHERE MONTH(ventas_fecha)=1 AND YEAR(ventas_Fecha)=2018

        // $result = ventas::whereMonth( 'ventas_fecha', '=', 1)
        //                     ->whereYear( 'ventas_fecha', '=', 2018)
        //                     ->sum( 'ventas_total' );





        // SELECT SUM(ventas_total) AS 'Total ventas' FROM ventas WHERE MONTH(ventas_fecha)=1 AND YEAR(ventas_fecha)=2018 AND DAY(ventas_fecha)=2

        $result = ventas::whereMonth( 'ventas_fecha', '=', 1)
                            ->whereYear( 'ventas_fecha', '=', 2018)
                            ->whereDay( 'ventas_fecha', '=', 2)
                            ->sum( 'ventas_total');


        return response()->json([
            'result' => $result
        ], 200);
    }




    // COUNT
    public function count(){

         // SELECT COUNT(*) AS 'Total ventas' FROM ventas WHERE MONTH(ventas_fecha)=1 AND YEAR(ventas_fecha)=2018 AND DAY(ventas_fecha)=2

         $result = ventas::whereMonth( 'ventas_fecha', '=', 1)
         ->whereYear( 'ventas_fecha', '=', 2018)
         ->whereDay( 'ventas_fecha', '=', 2)
         ->count();


            return response()->json([
            'result' => $result
            ], 200);
    }





    // MAX
    public function max(){

         // SELECT MAX( ventas_total) AS 'Total ventas' FROM ventas WHERE MONTH(ventas_fecha)=1 AND YEAR(ventas_fecha)=2018 AND DAY(ventas_fecha)=2

         $result = ventas::whereMonth( 'ventas_fecha', '=', 1)
         ->whereYear( 'ventas_fecha', '=', 2018)
         ->whereDay( 'ventas_fecha', '=', 2)
         ->max( 'ventas_total' );


            return response()->json([
            'result' => $result
            ], 200);
    }


     // MIN
     public function min(){

        // SELECT MAX( ventas_total) AS 'Total ventas' FROM ventas WHERE MONTH(ventas_fecha)=1 AND YEAR(ventas_fecha)=2018 AND DAY(ventas_fecha)=2

        $result = ventas::whereMonth( 'ventas_fecha', '=', 1)
        ->whereYear( 'ventas_fecha', '=', 2018)
        ->whereDay( 'ventas_fecha', '=', 2)
        ->min( 'ventas_total' );


           return response()->json([
           'result' => $result
           ], 200);
   }



    // AVG( promedio )
    public function promedio(){

        // SELECT MAX( ventas_total) AS 'Total ventas' FROM ventas WHERE MONTH(ventas_fecha)=1 AND YEAR(ventas_fecha)=2018 AND DAY(ventas_fecha)=2

        $result = ventas::whereMonth( 'ventas_fecha', '=', 1)
        ->whereYear( 'ventas_fecha', '=', 2018)
        ->whereDay( 'ventas_fecha', '=', 2)
        ->avg( 'ventas_total' );


           return response()->json([
           'result' => $result
           ], 200);
   }


   public function having(){

    // SELECT YEAR(ventas_fecha) AS anio, MONTH(ventas_fecha) AS mes, SUM(ventas_total) AS total
    //     FROM ventas
    //         GROUP BY anio, mes
    //             HAVING total >1000000


    $result = ventas::selectRaw( "YEAR(ventas_fecha) AS anio, MONTH(ventas_fecha) AS mes, SUM(ventas_total) AS total" )
                        ->groupBy('anio', 'mes')
                        ->having( 'total', '>', '1000000')
                        ->get();


    return response()->json([
        'result' => $result,
        'aqui' => 'aqui'
        ], 200);
   }


}

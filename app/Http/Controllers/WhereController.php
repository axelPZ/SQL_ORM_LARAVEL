<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ventas;

class WhereController extends Controller
{
    public function querys(){

        // SELECT * FROM ventas
        //$result = ventas::get();


        // SELECT ventas_id, ventas_fecha, Ventas_Neto, Ventas_Iva, Ventas_Total FROM ventas;

        // $result = ventas::select( 'ventas_id', 'ventas_fecha', 'Ventas_Neto', 'Ventas_Iva', 'Ventas_Total' )->get();



        // SELECT ventas_id, ventas_fecha, Ventas_Neto, Ventas_Iva, Ventas_Total FROM ventas WHERE ventas_id = 123574

        // $result = ventas::select( 'ventas_id', 'ventas_fecha', 'Ventas_Neto', 'Ventas_Iva', 'Ventas_Total' )
        //                  ->where( 'ventas_id', 123574)
        //                  ->get();



        // SELECT ventas_id, Ventas_Neto, Ventas_Iva, Ventas_Total FROM ventas WHERE ventas_total > 1000 AND ventas_total <1500

        // $result = ventas::select( 'ventas_id', 'ventas_fecha', 'Ventas_Neto', 'Ventas_Iva', 'Ventas_Total' )
        //                  ->where( 'ventas_total', '>', 1000 )
        //                  ->where( 'ventas_total', '<', 1500 )
        //                  ->get();



        // SELECT Prod_Id, Prod_Descripcion, Prod_Color, Prod_Status, Prod_Precio, Prod_ProvId FROM PRODUCTOS WHERE PROD_PRECIO>0 AND (PROD_STATUS=0 OR (PROD_STATUS=1 AND PROD_PROVID=97))

        // $result = productos::select( 'Prod_Id', 'Prod_Descripcion', 'Prod_Color', 'Prod_Status', 'Prod_Precio', 'Prod_ProvId' )
        //                     ->where( 'prod_precio', '>', 0)
        //                     ->where( function( $query ) {

        //                         $query->where( 'prod_status', '=',0 )
        //                                 ->orWhere( function( $query ) {
        //                                     $query->where( 'prod_status', '=', 1)
        //                                           ->where( 'prod_provid', '=', 97);
        //                                 });
        //                     })->get();




        // SELECT Ventas_Id, Ventas_Fecha, Ventas_CliId, Ventas_NroFactura, Ventas_Total FROM ventas
        //                        WHERE Ventas_fecha >= '2018-01-01'
        //                        AND Ventas_fecha <= '2018-01-05'
        //                        AND (Ventas_CliId = 1
        //                            OR (Ventas_CliId <> 1 AND Ventas_Total > 1000))

        $result = ventas::select('Ventas_Id', 'Ventas_Fecha', 'Ventas_CliId', 'Ventas_NroFactura', 'Ventas_Total' )
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

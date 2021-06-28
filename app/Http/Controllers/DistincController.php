<?php

namespace App\Http\Controllers;

use App\Models\productos;
use App\Models\ventas;
use Illuminate\Http\Request;

class DistincController extends Controller
{
    public function distinct(){


        // SELECT DISTINCT(ventas_CLIID) AS cliente FROM ventas

        $result = ventas::select( 'ventas_cliID')
                            ->distinct('ventast_cliID')
                            ->get();

        $total = sizeof( $result );
        return response()->json(
            [
            'message' => 'aqui',
           'total' => $total,
            'result' => $result
            ], 200);
    }

    public function between(){

        // SELECT ventas_fecha, ventas_cliId, ventas_total FROM ventas WHERE ventas_fecha BETWEEN '2018-01-02' AND '2018-01-11'

        $result = ventas::whereBetween( 'ventas_fecha', ['2018-01-02', '2018-01-11'])->get();

        $total = sizeof( $result );
        return response()->json(
            [
            'message' => 'aqui',
           'total' => $total,
            'result' => $result
            ], 200);
    }

    public function like(){

        // AD%	=	tenga AD al inicio
        // %AD	=	tenga AD al final
        // %AD%    =	tenga AD en cualquier parte

        // SELECT prod_id, prod_descripcion, prod_color FROM productos WHERE prod_descripcion LIKE 'AD%'
        $result = productos::select( 'prod_id', 'prod_descripcion', 'prod_color')
                                ->where( 'prod_descripcion', 'LIKE', 'AD%')
                                ->get();

        $total = sizeof( $result );
        return response()->json(
            [
            'message' => 'aqui',
           'total' => $total,
            'result' => $result
            ], 200);
    }


    public function concat(){

        // SELECT prod_id, prod_descripcion, prod_color FROM productos WHERE CONCAT(prod_descripcion, prod_color) LIKE '%AD%'

        // $result = productos::select( 'prod_id', 'prod_descripcion', 'prod_color')
        //                     ->whereConcat( ['prod_descripcion', 'prod_color' ], 'LIKE', '%AD%')
        //                     ->get();


        $result = productos::raw("select prod_id, prod_descripcion, prod_color FROM productos WHERE CONCAT(prod_descripcion, prod_color) LIKE '%AD%'" )
                            // ->whereConcat( 'CONCAT(prod_descripcion,  prod_color)', 'LIKE', '%AD%')
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

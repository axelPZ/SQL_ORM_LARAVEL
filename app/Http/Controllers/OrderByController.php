<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productos;

class OrderByController extends Controller
{
    public function querys(){

        // SELECT Prod_Id, Prod_Descripcion, Prod_Color, Prod_Status, Prod_Precio, Prod_ProvId FROM productos ORDER BY Prod_Precio Desc

        // $result = productos::select( 'Prod_Id', 'Prod_Descripcion', 'Prod_Color', 'Prod_Status', 'Prod_Precio', 'Prod_ProvId' )
        //                     ->orderBy( 'prod_precio', 'desc')
        //                     ->get();




        // SELECT Prod_Id, Prod_Descripcion, Prod_Color, Prod_Status, Prod_Precio, Prod_ProvId FROM productos ORDER BY Prod_Precio asc

        // $result = productos::select( 'Prod_Id', 'Prod_Descripcion', 'Prod_Color', 'Prod_Status', 'Prod_Precio', 'Prod_ProvId' )
        //                         ->orderBy( 'prod_precio', 'asc')
        //                         ->get();


        // SELECT Prod_Id, Prod_Descripcion, Prod_Color, Prod_Status, Prod_Precio, Prod_ProvId
		//     FROM productos
   		//         ORDER BY Prod_Status desc, Prod_Descripcion asc

           $result = productos::select( 'Prod_Id', 'Prod_Descripcion', 'Prod_Color', 'Prod_Status', 'Prod_Precio', 'Prod_ProvId' )
                                ->orderBy( 'Prod_Status', 'DESC')
                                ->orderBy( 'prod_descripcion', 'ASC')
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

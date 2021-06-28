<?php

namespace App\Http\Controllers;

use App\Models\productos;
use App\Models\ventas;
use Illuminate\Http\Request;

class SubConsultaController extends Controller
{
    public function querys(){

        // SELECT prod_id AS 'articulo', prod_descripcion AS 'descripcion',
		//     ( SELECT MAX( ventas_fecha ) FROM ventas JOIN ventas_detalle ON ventas_id = vd_ventasId WHERE prod_id=1633 ) AS 'ultima fecha'
        //         FROM productos WHERE prod_id =1633


        $subConsulta = ventas::join( 'ventas_detalle', 'vd_ventasid', 'ventas_Id')
                        ->max( 'ventas_fecha' );

        $result = productos::select( 'prod_id', 'prod_descripcion', [ 'ultima_Fecha', $subConsulta ])
                            ->where( 'prod_id', '=', 1633)
                            ->first();

        // $subquery = Login::select('logins.id')
        // ->whereColumn('logins.user_id', 'users.id')
        // ->latest()
        // ->limit(1);

        //$query->addSelect(['last_login_id' => $subquery]);


        return response()->json(
            [
            'message' => 'aqui',
           // 'total' => $total,
            'result' => $result
            ], 200);
    }
}

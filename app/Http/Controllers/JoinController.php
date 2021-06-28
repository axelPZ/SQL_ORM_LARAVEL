<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ventas;

class JoinController extends Controller
{
    public function join()
    {

        // SELECT ventas_fecha, ventas_NroFactura, ventas_CliID, Cli_razonSocial, VD_prodid, prod_descripcion, prod_Id,
		//  prov_nombre, vd_cantidad, vd_precio, (vd_cantidad * vd_precio) AS parcial
		//  	FROM ventas
		// 		JOIN ventas_detalle ON vd_ventasId = ventas_id
		// 		JOIN productos ON vd_prodId = prod_id
		// 		JOIN proveedores ON prod_provID = prov_Id
		// 		JOIN clientes ON ventas_CliID = Cli_id


        $result = ventas::select( 'ventas_fecha', 'ventas_NroFactura', 'ventas_cliID', 'Cli_razonSocial', 'VD_prodId', 'prod_descripcion', 'prod_Id')
                            ->join( 'ventas_detalle', 'vd_ventasId','ventas_id')
                            ->join( 'productos', 'vd_prodId', 'prod_id')
                            ->join( 'proveedores', 'prod_provId', 'prov_id')
                            ->join( 'clientes', 'ventas_cliId', 'Cli_id')
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

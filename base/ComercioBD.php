<?php

require_once('ConexionBD.php');
require_once('./modelo/Comercio.php');
/**
 * Description of ComercioBD
 *
 * @author pablo
 */
class ComercioBD {
    public static function buscarXCodigoBD($codigo){
        $unaConexion = ConexionBD::abrirConexion();
        $objResultado = NULL;
        
        $sql = "SELECT * FROM comercio WHERE comcodigo = $codigo";
        if ($unaConexion->ejecutarConsulta($sql)) {
            while ($fila = $unaConexion->obtenerRegistro()) {
                $objResultado = new Comercio ();
                $objResultado->setComCodigo(trim($fila['comcodigo']));
                $objResultado->setComDescripcion(trim($fila['comdescripcion']));
            }
        }
        $unaConexion->cerrarConexion();
        return $objResultado;
    }
}

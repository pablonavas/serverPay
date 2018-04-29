<?php

require_once('ConexionBD.php');
require_once('./modelo/Transaccion.php');
require_once('./modelo/MgrCliente.php');
require_once('./modelo/MgrComercio.php');
require_once('./utils/Fechas.php');

/**
 * Description of TransaccionBD
 *
 * @author pablo
 */
class TransaccionBD {
    
    
    
    public static function buscarXClienteBD($cliente){
        $unaConexion = ConexionBD::abrirConexion();
        $vecResultado = array ();
        
        $sql = "SELECT * FROM transacciones WHERE trxcliente = $cliente ORDER BY trxcodigo";        
        if ($unaConexion->ejecutarConsulta($sql)) {
            while ($fila = $unaConexion->obtenerRegistro()) {
                $objResultado = new Transaccion ();
                $objResultado->setTrxCodigo(trim($fila['trxcodigo']));
                $fecha = Fechas::cambiarFormatoBASE(substr($fila['trxfecha'],0,10));
                $hora = substr($fila['trxfecha'],11,5);
                $objResultado->setTrxFecha($fecha." ".$hora);
                $objResultado->setTrxTipo(trim($fila['trxtipo']));
                $objResultado->setTrxMonto(trim($fila['trxmonto']));
                $unComercio = MgrComercio::buscarXCodigo($fila['trxcomercio']);
                $objResultado->setTrxComercio(MgrComercio::toArray2($unComercio));
                $unCliente = MgrCliente::buscarXCodigo($fila['trxcliente']);
                $objResultado->setTrxCliente(MgrCliente::toArray2($unCliente));
                $objResultado->setTrxDescripcion(trim($fila['trxdescripcion']));
                array_push($vecResultado, $objResultado);
            }
        }
        $unaConexion->cerrarConexion();
        return $vecResultado;
    }
}

<?php

require_once('ConexionBD.php');
require_once('./modelo/Cliente.php');


/**
 * Description of ClienteBD
 *
 * @author pablo
 */
class ClienteBD {
    public static function insertar($unCliente){
        /* @var $unCliente Cliente */
        $sql = "INSERT INTO cliente(
                    clinombre, cliapellido, clipais, clitipdocumento, 
                    clidocumento, clicelular, clisaldo, clipin) 
                VALUES ('".
                $unCliente->getCliNombre()."', '".
                $unCliente->getCliApellido()."', '".
                $unCliente->getCliPais()."', ".
                $unCliente->getCliTipDoc().", '".
                $unCliente->getCliDocumento()."', '".
                $unCliente->getCliCelular()."', ".
                $unCliente->getCliSaldo().", ".
                $unCliente->getCliPin().") RETURNING clicodigo;";
        $resultado = ConexionBD::ejecutarConsultaInsert($sql);
        return $resultado;
    }
    
    public static function actualizar($unCliente){
        /* @var $unCliente Cliente */
        $sql = "UPDATE cliente SET  ".
                "clinombre= '".$unCliente->getCliNombre()."', ". 
                "cliapellido= '".$unCliente->getCliApellido()."', ". 
                "clitipdoc= ".$unCliente->getCliTipDoc().", ". 
                "clidocumento= '".$unCliente->getCliDocumento()."', ". 
                "clifchnacimiento= ".$unCliente->getCliFchNacimiento().", ". 
                "clidomicilio= '".$unCliente->getCliDomicilio()."', ".
                "clilocalidad= ".$unCliente->getCliLocalidad().", ".
                "clidepartamento= ".$unCliente->getCliDepartamento().", ".
                "clitelefono= '".$unCliente->getCliTelefono()."', ".
                "clicelular= '".$unCliente->getCliCelular()."', ".
                "cliemail= '".$unCliente->getCliEMail()."', ".
                "cliobservaciones= '".$unCliente->getCliObservaciones()."', ". 
                "cliestado= '".$unCliente->getCliEstado()."', ". 
                "cliusumodificacion= '".$unCliente->getCliUsuModificacion()."', ". 
                "clifchmodificacion= ".$unCliente->getCliFchModificacion()." ". 
                "WHERE clicodigo = ".$unCliente->getCliCodigo();
        $resultado = ConexionBD::ejecutarConsultaIUD($sql);
        return $resultado;
    }
    
    public static function eliminar($unCliente){
        /* @var $unCliente Cliente */
        $sql = "DELETE FROM cliente WHERE clicodigo = ".$unCliente->getCliCodigo();
        $resultado = ConexionBD::ejecutarConsultaIUD($sql);
        return $resultado;
    }
            
    public static function buscarXCodigoBD($codigo){
        $unaConexion = ConexionBD::abrirConexion();
        $objResultado = NULL;
        
        $sql = "SELECT * FROM cliente WHERE clicodigo = $codigo";
        if ($unaConexion->ejecutarConsulta($sql)) {
            while ($fila = $unaConexion->obtenerRegistro()) {
                $objResultado = new Cliente ();
                $objResultado->setCliCodigo(trim($fila['clicodigo']));
                $objResultado->setCliNombre(trim($fila['clinombre']));
                $objResultado->setCliApellido(trim($fila['cliapellido']));
                $objResultado->setCliPais(trim($fila['clipais']));
                $objResultado->setCliTipDoc(trim($fila['clitipdocumento']));
                $objResultado->setCliDocumento(trim($fila['clidocumento']));
                $objResultado->setCliCelular(trim($fila['clicelular']));
                $objResultado->setCliSaldo(trim($fila['clisaldo']));
                $objResultado->setCliPin(trim($fila['clipin']));
            }
        }
        $unaConexion->cerrarConexion();
        return $objResultado;
    }
    
    public static function buscarTodosBD(){
        $unaConexion = ConexionBD::abrirConexion();
        $vecResultado = array ();
        
        $sql = "SELECT * FROM cliente ORDER BY clicodigo";        
        if ($unaConexion->ejecutarConsulta($sql)) {
            while ($fila = $unaConexion->obtenerRegistro()) {
                $objResultado = new Cliente ();
                $objResultado->setCliCodigo(trim($fila['clicodigo']));
                $objResultado->setCliNombre(trim($fila['clinombre']));
                $objResultado->setCliApellido(trim($fila['cliapellido']));
                $objResultado->setCliTipDoc(trim($fila['clitipdoc']));
                $objResultado->setCliDocumento(trim($fila['clidocumento']));
                $objResultado->setCliFchNacimiento($fila['clifchnacimiento']);
                $objResultado->setCliDomicilio(trim($fila['clidomicilio']));
                $objResultado->setCliLocalidad(trim($fila['clilocalidad']));
                $objResultado->setCliDepartamento(trim($fila['clidepartamento']));
                $objResultado->setCliTelefono(trim($fila['clitelefono']));
                $objResultado->setCliCelular(trim($fila['clicelular']));
                $objResultado->setCliEMail(trim($fila['cliemail']));
                $objResultado->setCliObservaciones(trim($fila['cliobservaciones']));
                $objResultado->setCliEstado(trim($fila['cliestado']));
                $objResultado->setCliUsuIngreso(trim($fila['cliusuingreso']));
                $objResultado->setCliFchIngreso(trim($fila['clifchingreso']));
                $objResultado->setCliUsuModificacion(trim($fila['cliusumodificacion']));
                $objResultado->setCliFchModificacion(substr(trim($fila['clifchmodificacion']), 0, 16));
                array_push($vecResultado, $objResultado);
            }
        }
        $unaConexion->cerrarConexion();
        return $vecResultado;
    }
    
    public static function buscarXEstadoBD($estado){
        $unaConexion = ConexionBD::abrirConexion();
        $vecResultado = array ();
        
        $sql = "SELECT * FROM cliente WHERE cliestado = '$estado' ORDER BY clicodigo";
        if ($unaConexion->ejecutarConsulta($sql)) {
            while ($fila = $unaConexion->obtenerRegistro()) {
                $objResultado = new Cliente ();
                $objResultado->setCliCodigo(trim($fila['clicodigo']));
                $objResultado->setCliNombre(trim($fila['clinombre']));
                $objResultado->setCliApellido(trim($fila['cliapellido']));
                $objResultado->setCliTipDoc(trim($fila['clitipdoc']));
                $objResultado->setCliDocumento(trim($fila['clidocumento']));
                $objResultado->setCliFchNacimiento($fila['clifchnacimiento']);
                $objResultado->setCliDomicilio(trim($fila['clidomicilio']));
                $objResultado->setCliLocalidad(trim($fila['clilocalidad']));
                $objResultado->setCliDepartamento(trim($fila['clidepartamento']));
                $objResultado->setCliTelefono(trim($fila['clitelefono']));
                $objResultado->setCliCelular(trim($fila['clicelular']));
                $objResultado->setCliEMail(trim($fila['cliemail']));
                $objResultado->setCliObservaciones(trim($fila['cliobservaciones']));
                $objResultado->setCliEstado(trim($fila['cliestado']));
                $objResultado->setCliUsuIngreso(trim($fila['cliusuingreso']));
                $objResultado->setCliFchIngreso(trim($fila['clifchingreso']));
                $objResultado->setCliUsuModificacion(trim($fila['cliusumodificacion']));
                $objResultado->setCliFchModificacion(substr(trim($fila['clifchmodificacion']), 0, 16));
                array_push($vecResultado, $objResultado);
            }
        }
        $unaConexion->cerrarConexion();
        return $vecResultado;
    }
    
}

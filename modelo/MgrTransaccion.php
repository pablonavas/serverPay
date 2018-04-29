<?php
require_once('./base/TransaccionBD.php');

/**
 * Description of MgrTransaccion
 *
 * @author pablo
 */
class MgrTransaccion {
    public static function insertar($unCliente){
        return TransaccionBD::insertar($unCliente);
    }

    public static function actualizar($unCliente){
        return TransaccionBD::actualizar($unCliente);

    }
    
    public static function eliminar($unCliente){
        return TransaccionBD::eliminar($unCliente);
    }

    /**
     * Metodo que busca un Cliente por codigo.
     * @return Cliente
     */
    public static function buscarXCodigo($codigo) {
        return TransaccionBD::buscarXCodigoBD($codigo);
    }
    
    /**
     * Metodo que busca todas las Clientes.
     * @return array
     */
    public static function buscarXCliente($cliente) {
        return TransaccionBD::buscarXClienteBD($cliente);
    }
    
    
    public static function toArray2($object) {
    $reflectionClass = new \ReflectionClass($object);

    $properties = $reflectionClass->getProperties();

    $array = [];
    foreach ($properties as $property) {
        $property->setAccessible(true);
        $value = $property->getValue($object);
        if (is_object($value)) {
            $array[$property->getName()] = self::toArray2($value);
        } else {
            $array[$property->getName()] = $value;
        }
    }
    return $array;
}
    
}

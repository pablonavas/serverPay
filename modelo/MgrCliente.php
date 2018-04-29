<?php
require_once('./base/ClienteBD.php');

/**
 * Description of MgrCliente
 *
 * @author pablo
 */
class MgrCliente {
    public static function insertar($unCliente){
        return ClienteBD::insertar($unCliente);
    }

    public static function actualizar($unCliente){
        return ClienteBD::actualizar($unCliente);

    }
    
    public static function eliminar($unCliente){
        return ClienteBD::eliminar($unCliente);
    }

    /**
     * Metodo que busca un Cliente por codigo.
     * @return Cliente
     */
    public static function buscarXCodigo($codigo) {
        return ClienteBD::buscarXCodigoBD($codigo);
    }
    
    /**
     * Metodo que busca todas las Clientes.
     * @return array
     */
    public static function buscarTodos() {
        return ClienteBD::buscarTodosBD();
    }
    
    /**
     * Metodo que busca los clientes en cierto estado.
     * @return array
     */
    public static function buscarXEstado($estado) {
        return ClienteBD::buscarXEstadoBD($estado);
    }
    
    /**
     * Metodo que busca el nombre de un Cliente por codigo.
     * @return string
     */
    public static function buscarNombre($codigo) {
        $unCliente = self::buscarXCodigo($codigo);
        $cli_nombre = empty($unCliente->getCliApellido())?$unCliente->getCliNombre():$unCliente->getCliApellido().", ".$unCliente->getCliNombre();
        return $cli_nombre;
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

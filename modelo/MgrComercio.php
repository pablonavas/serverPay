<?php
require_once('./base/ComercioBD.php');

/**
 * Description of MgrComercio
 *
 * @author pablo
 */
class MgrComercio {
   /**
     * Metodo que busca un Comercio por codigo.
     * @return Comercio
     */
    public static function buscarXCodigo($codigo) {
        return ComercioBD::buscarXCodigoBD($codigo);
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

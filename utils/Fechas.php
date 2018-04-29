<?php


/**
 * Description of Fechas
 *
 * @author Pablo
 */
class Fechas {

    
    /**
     * Metodo que cambia el formato de la fecha de mm-dd-yyyy a dd/mm/YYYY.
     * @param date $fecha fecha en formato mm-dd-YYYY
     * @return string
     */
    public static function cambiarFormatoBASE($fecha){
        $nueva_fecha = NULL;
        if (!empty($fecha)){
            $var_fecha = explode('-',trim($fecha));
            $nueva_fecha = "$var_fecha[2]/$var_fecha[1]/$var_fecha[0]";
        }
        return $nueva_fecha;
    }
     
    /**
     * Metodo que cambia el formato de la hora de hh:mm:ss.XXXXXX a hh:mm.
     * @param time $hora hora en formato hh:mm:ss.XXXXXX
     * @return string
     */
    public static function cambiarFormatoHoraBASE($hora){
        return substr($hora,0,5);
    }
    
    /**
     * Metodo que suma dias expresados en horas a una fecha dada.
     * @param integer $cant_horas cantidad de horas a sumar
     * @param integer $fecha fecha incial
     * @return integer
     */
    public static function sumarHorasFecha($cant_horas, $fecha) {
        $fecha_nueva = new DateTime($fecha);
        $fecha_nueva->add(new DateInterval('PT'.$cant_horas.'H'));
        return $fecha_nueva->format('Y-m-d');
    }
    
    /**
     * Metodo que resta dos fechas y dice la cantidad de dias.
     * @param date $fecha1 fecha 1 a restar
     * @param date $fecha2 fecha 2
     * @return integer
     */
    public static function restarFechas($fecha1, $fecha2) {
        $datetime1 = new DateTime($fecha1);
        $datetime2 = new DateTime($fecha2);
        $interval = $datetime2->diff($datetime1);
        return $interval->format('%a');
    }
    
    /**
     * Metodo que resta dos fechas y calcula el % de avance a la fecha del momento.
     * @param date $fecha1 fecha 1 a restar
     * @param date $fecha2 fecha 2
     * @return integer
     */
    public static function calulcarPorcentaje($fecha1, $fecha2) {
        $fecha_actual = date('Y-m-d');
        $dias_total = self::restarFechas($fecha1, $fecha2);
        $dias_avance = self::restarFechas($fecha_actual, $fecha2);
        
        if($dias_total >= $dias_avance && $dias_total > 0){
            $res = round(($dias_avance*100)/$dias_total);
        } else {
            $res = 100;
        }
        return $res;
    }
}


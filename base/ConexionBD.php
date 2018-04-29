<?php

/**
 * Description of ConexionBD
 *
 * @author Pablo
 */
class ConexionBD {
    private $conexion;
    private $result;
    const OK_TRN = true;
    const ERROR_TRN = false;
    
    function __construct() {
    }

    public function getConexion() {
        return $this->conexion;
    }

    public function setConexion($conexion) {
        $this->conexion = $conexion;
    }
    
    function getResult() {
        return $this->result;
    }

    function setResult($result) {
        $this->result = $result;
    }
    
    public static function abrirConexion(){
        $unaConexion = new ConexionBD();
        $dbcon = pg_connect("host=127.0.0.1 port=5432 dbname=pagos user=postgres password=zaq1xsw2",PGSQL_CONNECT_FORCE_NEW);
        $unaConexion->setConexion($dbcon);
        return $unaConexion;
    }

    public function cerrarConexion(){
        pg_close($this->conexion);
    }

    public static function ejecutarConsultaIUD($sql){
        $unaConexion = self::abrirConexion();
        $unaConexion->setResult(pg_query($unaConexion->getConexion(), $sql));
        $resultado = $unaConexion->resultIUD();
        $unaConexion->cerrarConexion(); 
        return $resultado;
    }
    
    public static function ejecutarConsultaInsert($sql){
        $ultimoCodigo = 0;
        $unaConexion = self::abrirConexion();
        $result = pg_query($unaConexion->getConexion(),$sql);
        $ultimoCodigo = pg_fetch_result($result, 0);
        $unaConexion->cerrarConexion();
        return $ultimoCodigo;
    }
    
    public function ejecutarConsulta($sql){
        $this->result = pg_query($this->getConexion(), $sql);
        return $this->hayResult();
    }
    
    public static function ejecutarConsultaIUDTRN($sql,$unaConexion){
        $unaConexion->setResult(pg_query($unaConexion->getConexion(), $sql));
        $resultado = $unaConexion->resultIUD();
        return $resultado;
    }
    
    public static function ejecutarConsultaInsertTRN($sql,$unaConexion){
        $ultimoCodigo = 0;
        $result = pg_query($unaConexion->getConexion(),$sql);
        $ultimoCodigo = pg_fetch_result($result, 0);
        return $ultimoCodigo;
    }

    public function iniciarTrn(){
       //odbc_autocommit($this->getConexion(),FALSE);
       pg_query($this->getConexion(),"BEGIN");
    }

    public function finalizarTrn($resTrn){
        if ($resTrn) {
            pg_query($this->getConexion(),"COMMIT");
        } else {
            pg_query($this->getConexion(),"ROLLBACK");
        }
    }
    
    public function hayResult(){
        $resultado = false;
        if (pg_num_rows($this->getResult()) != 0) {
            $resultado = true;
        }
        return $resultado;
    }
    
    public function resultIUD(){
        $resultado = false;
        if (!$this->getResult()) {
            $resultado = false;
        } else {
            if (pg_affected_rows($this->getResult()) != 0) {
                $resultado = true;
            }
        }
        return $resultado;
    }
    
    public function obtenerRegistro(){
        return pg_fetch_assoc($this->getResult());
    }
    
    public function cantidadRegistros(){
        return pg_num_rows($this->getResult());
    }
}

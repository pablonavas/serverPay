<?php

/**
 * Description of Comercio
 *
 * @author pablo
 */
class Comercio {
   private $comCodigo;
   private $comDescripcion;
   
   function __construct() {
       
   }
   
   function getComCodigo() {
       return $this->comCodigo;
   }

   function getComDescripcion() {
       return $this->comDescripcion;
   }

   function setComCodigo($comCodigo) {
       $this->comCodigo = $comCodigo;
   }

   function setComDescripcion($comDescripcion) {
       $this->comDescripcion = $comDescripcion;
   }



}

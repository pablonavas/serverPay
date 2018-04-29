<?php

/**
 * Description of Transaccion
 *
 * @author pablo
 */
class Transaccion {
    private $trxCodigo; 
    private $trxFecha; 
    private $trxTipo;
    private $trxMonto;
    private $trxComercio;
    private $trxCliente;
    private $trxDescripcion;
    
    function getTrxCodigo() {
        return $this->trxCodigo;
    }

    function getTrxFecha() {
        return $this->trxFecha;
    }

    function getTrxTipo() {
        return $this->trxTipo;
    }

    function getTrxMonto() {
        return $this->trxMonto;
    }

    function getTrxComercio() {
        return $this->trxComercio;
    }

    function getTrxCliente() {
        return $this->trxCliente;
    }

    function getTrxDescripcion() {
        return $this->trxDescripcion;
    }

    function setTrxCodigo($trxCodigo) {
        $this->trxCodigo = $trxCodigo;
    }

    function setTrxFecha($trxFecha) {
        $this->trxFecha = $trxFecha;
    }

    function setTrxTipo($trxTipo) {
        $this->trxTipo = $trxTipo;
    }

    function setTrxMonto($trxMonto) {
        $this->trxMonto = $trxMonto;
    }

    function setTrxComercio($trxComercio) {
        $this->trxComercio = $trxComercio;
    }

    function setTrxCliente($trxCliente) {
        $this->trxCliente = $trxCliente;
    }

    function setTrxDescripcion($trxDescripcion) {
        $this->trxDescripcion = $trxDescripcion;
    }


}

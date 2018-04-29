<?php


/**
 * Description of Cliente
 *
 * @author pablo
 */
class Cliente {
    private $cliCodigo;
    private $cliNombre;
    private $cliApellido;
    private $cliPais;
    private $cliTipDoc;
    private $cliDocumento;
    private $cliCelular;
    private $cliSaldo;
    private $cliPin;
    
    function __construct() {
        
    }
    
    function getCliCodigo() {
        return $this->cliCodigo;
    }

    function getCliNombre() {
        return $this->cliNombre;
    }

    function getCliApellido() {
        return $this->cliApellido;
    }

    function getCliPais() {
        return $this->cliPais;
    }

    function getCliTipDoc() {
        return $this->cliTipDoc;
    }

    function getCliDocumento() {
        return $this->cliDocumento;
    }

    function getCliCelular() {
        return $this->cliCelular;
    }

    function getCliSaldo() {
        return $this->cliSaldo;
    }

    function getCliPin() {
        return $this->cliPin;
    }

    function setCliCodigo($cliCodigo) {
        $this->cliCodigo = $cliCodigo;
    }

    function setCliNombre($cliNombre) {
        $this->cliNombre = $cliNombre;
    }

    function setCliApellido($cliApellido) {
        $this->cliApellido = $cliApellido;
    }

    function setCliPais($cliPais) {
        $this->cliPais = $cliPais;
    }

    function setCliTipDoc($cliTipDoc) {
        $this->cliTipDoc = $cliTipDoc;
    }

    function setCliDocumento($cliDocumento) {
        $this->cliDocumento = $cliDocumento;
    }

    function setCliCelular($cliCelular) {
        $this->cliCelular = $cliCelular;
    }

    function setCliSaldo($cliSaldo) {
        $this->cliSaldo = $cliSaldo;
    }

    function setCliPin($cliPin) {
        $this->cliPin = $cliPin;
    }


    

}

<?php
namespace src;

use src\ValidarSesionIdInterface;

use const SESSION_ID;
use const SESSION_CREACION;
use const SESSION_CADUCIDAD;

/**
 * La clase devuelve TRUE si la sesión es valida, false si es invalida
 */

class RevisarSesion
{
    private $_validarId;

    public function __construct(ValidarSesionIdInterface $validarSesionId)
    {
        $this->_validarId = $validarSesionId;
    }

    public function revisar(): bool
    {
        return $this->existeId();
    }

    private function existeId(): bool
    {
        if (!isset($_SESSION[SESSION_ID])) {
            return false;
        }

        return $this->idEstaVacia();
    }

    private function idEstaVacia(): bool
    {
        if (empty($_SESSION[SESSION_ID])) {
            return false;
        }

        return $this->idEsValido();
    }

    private function idEsValido(): bool
    {
        if (!$this->_validarId->validar($_SESSION[SESSION_ID])) {
            return false;
        }

        return $this->caduco();
    }
    
    private function caduco(): bool
    {
        if ((time() - $_SESSION[SESSION_CREACION]) > $_SESSION[SESSION_CADUCIDAD]) {
            return false;
        }

        return true;
    }
}

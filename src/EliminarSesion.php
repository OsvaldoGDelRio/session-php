<?php
namespace src;

use const SESSION_ID;
use const SESSION_CREACION;

class EliminarSesion
{
    public function eliminar(): void
    {
        $this->eliminarVariablesDeSesion();
    }

    private function eliminarVariablesDeSesion()
    {
        unset($_SESSION[SESSION_ID]);
        unset($_SESSION[SESSION_CREACION]);
        session_destroy();
    }
}

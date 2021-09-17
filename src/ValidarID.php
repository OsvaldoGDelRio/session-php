<?php
namespace src;

class ValidarID implements ValidarSesionIdInterface
{
    public function __construct(bool $true)
    {
        $this->_respuesta = $true;
    }

    public function validar(string $id): bool
    {
        return $this->_respuesta;
    }
}

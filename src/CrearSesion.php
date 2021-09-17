<?php
namespace src;

use src\Sesion;
use src\SesionId;
use src\FactoryClassInterface;

class CrearSesion implements FactoryClassInterface
{
    public function crear(array $array): Sesion
    {
        return new Sesion(
            new SesionId(
                $array['sesionId']
            )
        );
    }
}

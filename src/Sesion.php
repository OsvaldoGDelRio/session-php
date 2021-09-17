<?php
namespace src;

use src\SesionId;
use const SESSION_ID;
use const SESSION_CREACION;
use const SESSION_CADUCIDAD;
use const CADUCIDAD_DE_SESION;

class Sesion
{
    public function __construct(
        SesionId $sesionId
    ) {
        $this->setSesionId($sesionId->id());
        $this->setCreacion();
        $this->setCaducidad();
    }

    public function id(): string
    {
        return $_SESSION[SESSION_ID];
    }

    public function creacion(): int
    {
        return $_SESSION[SESSION_CREACION];
    }

    public function caducidad(): int
    {
        return $_SESSION[SESSION_CADUCIDAD];
    }

    private function setSesionId(string $id): string
    {
        $_SESSION[SESSION_ID] = (string) $id;
        
        return $_SESSION[SESSION_ID];
    }

    private function setCreacion(): int
    {
        $_SESSION[SESSION_CREACION] = time();
        
        return $_SESSION[SESSION_CREACION];
    }

    private function setCaducidad(): int
    {
        $_SESSION[SESSION_CADUCIDAD] = CADUCIDAD_DE_SESION;

        return $_SESSION[SESSION_CADUCIDAD];
    }
}

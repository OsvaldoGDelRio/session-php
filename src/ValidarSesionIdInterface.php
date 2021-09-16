<?php
namespace src;

interface ValidarSesionIdInterface
{
    public function validar(string $id): bool;
}
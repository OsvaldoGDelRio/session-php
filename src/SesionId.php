<?php
namespace src;

use Exception;

class SesionId
{
    private string $_id;

    public function __construct(string $id)
    {
        $this->_id = $this->setId($id);
    }

    public function id(): string
    {
        return $this->_id;
    }

    private function setId(string $string): string
    {
        $this->estaVacio($string);

        return $string;
    }

    private function estaVacio(string $string): void
    {
        if (empty($string)) {
            throw new Exception("El ID de sesión no puede estar vacío");
        }
    }
}

<?php
declare(strict_types=1);

namespace test;

session_start();

define('SESSION_ID','ahau3333hauhsuhs');
define('SESSION_CREACION','duiehiuwhuih3333wu');
define('SESSION_CADUCIDAD', 'idjeifiefiehiih4i4i5i5hh');
define('CADUCIDAD_DE_SESION', 3600);

use Exception;
use \PHPUnit\Framework\TestCase;
use src\CrearSesion;
use src\EliminarSesion;
use src\RevisarSesion;
use src\Sesion;
use src\SesionId;
use src\ValidarID;

class SesionTest extends TestCase
{
    public function setUp(): void
    {
        $this->sesion = new Sesion(new SesionId('os'));    
    }

    //Sesion

    public function testSesionIdDevuelveString()
    {
        $this->assertIsString($this->sesion->id());
    }

    public function testSesionCreacionDevuelveInt()
    {
        $this->assertIsInt($this->sesion->creacion());
    }

    public function testSesionCaducidadDevuelveInt()
    {
        $this->assertIsInt($this->sesion->caducidad());
    }

    //sesionId

    public function testSiIdSesionEstaVacioDevuelveExcepcion()
    {
        $this->expectException(Exception::class);
        $id = new SesionId('');
    }

    public function testRevisarSesionDevuelveFalseSiNoPasa()
    {
        unset($_SESSION[SESSION_ID]);
        $revisar = new RevisarSesion(new ValidarID(false));
        //No existe la variable de id
        $this->assertFalse($revisar->revisar());
        $_SESSION[SESSION_ID] = '';
        //La variable de Id esta vacia
        $this->assertFalse($revisar->revisar());
        $_SESSION[SESSION_ID] = 'frfrfrf';
        //La id no pasó la comprobación
        $this->assertFalse($revisar->revisar());
        $revisar = new RevisarSesion(new ValidarID(true));
        $_SESSION[SESSION_CREACION] = 1;
        $_SESSION[SESSION_CADUCIDAD] = 100;
        //La sesion caduco
        $this->assertFalse($revisar->revisar());
    }

    public function testRevisarSesionDevuelveTrueSiPasaTodo()
    {
        $_SESSION[SESSION_CREACION] = time();
        $_SESSION[SESSION_CADUCIDAD] = 10;
        $revisar = new RevisarSesion(new ValidarID(true));
        $this->assertTrue($revisar->revisar());
    
    }

    //EliminarSesion

    public function testEliminarSesionFunciona()
    {
        $eliminar = new EliminarSesion;
        $eliminar->eliminar();

        $this->assertArrayNotHasKey(SESSION_ID, $_SESSION);
        $this->assertArrayNotHasKey(SESSION_CREACION, $_SESSION);
    }

    //ValidarID 

    /**
     * DUMMY TEST
     */

    public function testValidarIDDevuelveBool()
    {
        $validar = new ValidarID(true);
        $this->assertIsBool($validar->validar('id'));
    }

    //CrearSesion

    public function testCrearSesionDevuelveObjetoCorrecto()
    {
        $sesion = new CrearSesion();

        $this->assertInstanceOf(Sesion::class, $sesion->crear(['sesionId' => 'os']));
    }
}
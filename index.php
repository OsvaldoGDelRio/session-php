<?php
declare(strict_types=1);
session_start();
require_once __DIR__ . '/vendor/autoload.php';

define('SESSION_ID','ahau3333hauhsuhs');
define('SESSION_CREACION','duiehiuwhuih3333wu');
define('SESSION_CADUCIDAD', 'idjeifiefiehiih4i4i5i5hh');
define('CADUCIDAD_DE_SESION', 3600);

use src\EliminarSesion;
use src\RevisarSesion;
use src\Sesion;
use src\SesionId;
use src\ValidarID;

$sesion = new Sesion(
    new SesionId('osdelrio_0')
);


$eliminar = new EliminarSesion;
$eliminar->eliminar();

$validarId = new ValidarID(true);

$revisarSesion = new RevisarSesion($validarId);

var_dump($revisarSesion->revisar());


<?php

  // cargar las librerias
  require_once 'config/configurar.php';

  // remplazado por el autoload
  // require_once 'libraries/Controller.php';
  // require_once 'libraries/Core.php';
  // require_once 'libraries/Database.php';

  // autoload para clases
  spl_autoload_register(function($nombreClase){
    require_once 'libraries/'.$nombreClase.'.php';
  });

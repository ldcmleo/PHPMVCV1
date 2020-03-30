<?php

  /**
   *
   */
  class Vista{

    public static function usar($vista, $datos = []){
      if (file_exists('../app/views/'.$vista.'.php')) {
        require_once '../app/views/'.$vista.'.php';
      }else {
        // en caso de no existir
        die('La vista no existe');
      }
    }
  }

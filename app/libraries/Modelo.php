<?php

  /**
   *
   */
  class Modelo{
    public static function usar($modelo){
      require_once '../app/models/'.$modelo.'.php';
      return new $modelo();
    }
  }

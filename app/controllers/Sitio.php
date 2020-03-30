<?php

  /**
   * Controlador por defecto
   */
  class Sitio{

    function __construct(){

    }

    public function index(){
      $datos = [
        'titulo_pagina' => 'inicio',
      ];

      Vista::usar('pages/inicio', $datos);
    }

    // paso de parametro a la vista
    // public function ejemplodos(){
    //   $datos = [
    //     'titulo_pagina' => 'Hola mundo'
    //   ];
    //
    //   Vista::usar('pages/prueba', $datos);
    // }

    // ejemplo de paso de parametro por get
    // public function ejemplo($id){
    //   echo $id;
    // }
  }

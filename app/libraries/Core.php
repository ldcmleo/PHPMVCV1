<?php

  /**
   * Mapear la url ingresada en el navegador
   * 1-controlador
   * 2-metodo
   * 3-parametro
   */
  class Core{
    protected $controladorActual = "sitio";
    protected $metodoActual = "index";
    protected $parametros = [];

    public function __construct(){
      // obtenemos el url para empezar a rutear
      $url = $this->getUrl();

      // verificamos que exista el controlador por defecto
      if (file_exists('../app/controllers/'.ucwords($url[0]).'.php')) {
        // si existe se configura el controlador a utilizar
        $this->controladorActual = ucwords($url[0]);

        //desmontamos el arreglo
        unset($url[0]);
      }


      // mandamos a llamar el controlador
      require_once '../app/controllers/'.$this->controladorActual.'.php';
      // instanciamos el controlador como clase
      $this->controladorActual = new $this->controladorActual;


      // verificar el metodo del url
      if (isset($url[1])) {
        if (method_exists($this->controladorActual, $url[1])) {
          $this->metodoActual = $url[1];
          unset($url[1]);
        }
      }
      // echo $this->metodoActual;

      // obtener los parametros
      $this->parametros = $url ? array_values($url) : [];

      // callback con los parametros
      call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
    }

    public function getUrl(){
      // echo $_GET['url'];

      if (isset($_GET['url'])) {
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }
  }

<?php

  /**
   * clase para connectar con la base de datos
   * y ejecutarla con PDO
   */
  class Database{
    private $host = DBHOST;
    private $user = DBUSER;
    private $pass = DBPASS;
    private $db = DBNAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct(){
      $dsn = 'mysql:host='.$this->host.';dbname='.$this->db;
      $opciones = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );

      try {
        $this->dbh = new PDO($dsn, $this->user, $this->pass, $opciones);
        $this->dbh->exec('set names utf8');
      } catch (PDOException $e) {
        $this->error = $e->getMessage();
        echo $this->error;
      }
    }

    public function query($sql){
      $this->stmt = $this->dbh->prepare($sql);
    }

    public function bind($p, $v, $t){
      if (is_null($t)) {
        switch (true) {
          case is_int($v):
            $t = PDO::PARAM_INT;
          break;
          case is_bool($v):
            $t = PDO::PARAM_BOOL;
          break;
          case is_null($v):
            $t = PDO::PARAM_NULL;
          break;
          default:
            $t = PDO::PARAM_STR;
          break;
        }
      }
      $this->stmt->bindValue($p, $v, $t);
    }

    public function execute(){
      return $this->stmt->execute();
    }

    public function getAllRows(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getRow(){
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function rowCount(){
      return $this->stmt->rowCount();
    }
  }

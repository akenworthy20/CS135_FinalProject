<?php
  class db {

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
          $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRORMODE_EXCEPTION;
          self::instance = new PDO('mysql:host=localhost;dbname=tm_ddl','root','root', $pdo_options);
        }
        return self::instance;
    }
  }
?>

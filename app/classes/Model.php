<?php

abstract class Model {
     protected $conn;

     public function __construct ($dbConnection) {
          $this->conn = $dbConnection; // Assign database connection to $conn
     }
}

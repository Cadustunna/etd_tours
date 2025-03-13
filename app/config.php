<?php

class Auth {
     
     private $dsn = "mysql:host=localhost;dbname=etd_tours_db";
     private $user = "root";
     private $pass = "";
     public $conn;

     public function __construct()
     {
          try {
               $this->conn = new PDO ($this->dsn, $this->user, $this->pass);
               $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
          } catch (Exception $e) {
               die('Database connection failed: ' . $e->getMessage());
          }
     }

     public function show_message($type, $message)
     {
          $alert = <<<DATA
               <div class="alert alert-$type alert-dismissible">
               <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
               <strong>$message</strong>.
               </div>
          DATA;

          return $alert;
     }

     public function clean_data($data)
     {
          return htmlspecialchars(trim(stripslashes($data)));
     }

     public function lastInsertedId()
     {
          return $this->conn->lastInsertId();
     }
}
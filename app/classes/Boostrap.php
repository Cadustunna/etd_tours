<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Boostrap {
     private $controller;
     private $action;
     private $request;

     public function __construct($request)
     {
          $this->request = $request;

          $this->controller = isset($this->request['controller']) && !empty($this->request['controller'])
               ? ucfirst($this->request['controller']) // Capitalize the first letter to match class names
               : 'Home'; // Default to 'Home' controller

          $this->action = isset($this->request['action']) && !empty($this->request['action'])
               ? $this->request['action'] : 'index'; 
     }

     public function createController()
     {
          //Check if controller class exists
          if (class_exists($this->controller)) {
               $parents = class_parents($this->controller);

               // Ensure the class extends the base Controller
               if (in_array("Controller", $parents)) {

                    //Dynamically instantiate the controller and pass the request
                    $controller = new $this->controller($this->request, $this->action);
                    if (method_exists($controller, $this->action)) {
                         return $controller;
                    } else {
                         //Method does not exist
                         echo "Error: Method '{$this->action}' does not exist in '{$this->controller}'.";
                         return null;
                         }    
                    } else {
                         //Base  Controller does not exist
                         echo "Error: Base Controller does not exist for '{$this->controller}'.";
                              return null;
                         }
                    } else {
                         //Controller does not exist
                         echo "Error: Controller '{$this->controller}' does not exist.";
                              return null;
                         }
                    }
}
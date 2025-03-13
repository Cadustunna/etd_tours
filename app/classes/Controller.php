<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

abstract class Controller {
    protected $request;
    protected $action;

    public function __construct($request, $action) {
        $this->request = $request;
        $this->action = $action;
    }
    
    public function executeAction() 
    {
        if (method_exists($this, $this->action)) {
            return $this->{$this->action}();
        } else {
            echo "Action '{$this->action}' does not exist in " . get_class($this);
            return false;
        }
    }
    
    protected function returnView($viewModel, $fullView)
    {
        if (!is_array($viewModel)) {
            $viewModel = [];
        }

        // Extract variables from the viewModel
        extract($viewModel); 

        // Specify the path for the view file
        $view = 'views/' . get_class($this) . '/' . $this->action . '.php';

        if ($fullView) {
            require_once('views/main.php');
        } else {
            require_once($view);
        }
    }
}


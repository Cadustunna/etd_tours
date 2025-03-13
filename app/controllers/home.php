<?php

class Home extends Controller
{
     protected function index()
     {
          $auth = new Auth; // Instantiate the DB connection
          $dbConnection = $auth->conn; // Get the PDO connection

          $viewModel = new HomeModel($dbConnection, $auth);
          $this->returnView($viewModel->index(), true);
     }

     protected function package()
     {
          $auth = new Auth; // Instantiate the DB connection
          $dbConnection = $auth->conn; // Get the PDO connection

          $viewModel = new HomeModel($dbConnection, $auth);
          $this->returnView($viewModel->package(), true);
     }

     protected function booking()
     {
          $auth = new Auth; // Instantiate the DB connection
          $dbConnection = $auth->conn; // Get the PDO connection

          $viewModel = new HomeModel($dbConnection, $auth);

          $this->returnView($viewModel->booking(), true);
     }

     protected function about()
     {
          $auth = new Auth; // Instantiate the DB connection
          $dbConnection = $auth->conn; // Get the PDO connection

          $viewModel = new HomeModel($dbConnection, $auth);
          $this->returnView($viewModel->about(), true);
     }
}
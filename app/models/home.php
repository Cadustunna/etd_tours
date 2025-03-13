<?php

class HomeModel extends Model
{
     private $auth;

     public function __construct($dbConnection, $auth){
          parent::__construct($dbConnection);
          $this->auth = $auth;
     }
     public function index()
     {
          return [];
     }

     public function package()
     {
          return [];
     }

     public function booking()
     {
          if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) 
               || empty($_POST['address']) || empty($_POST['location']) || empty($_POST['guests'] 
               || empty($_POST['arrival']) || empty($_POST['departure']))) {
               return false;
          }

          if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submitBtn'])) {
               $name = $this->auth->clean_data($_POST['name']);
               $email = $this->auth->clean_data($_POST['email']);
               $phone = $this->auth->clean_data($_POST['phone']);
               $address = $this->auth->clean_data($_POST['address']);
               $location = $this->auth->clean_data($_POST['location']);
               $guests = $this->auth->clean_data($_POST['guests']);
               $arrival = $this->auth->clean_data($_POST['arrival']);
               $departure = $this->auth->clean_data($_POST['departure']);

               $bookingSql = "INSERT INTO book_form (name, email, phone, address, location, guests, arrival, departure) 
                              VALUE(:name, :email, :phone, :address, :location, :guests, :arrival, :departure)";
               $bookingStmt = $this->conn->prepare($bookingSql); 
               $bookingStmt->bindParam(':name', $name, PDO::PARAM_STR);              
               $bookingStmt->bindParam(':email', $email, PDO::PARAM_STR);              
               $bookingStmt->bindParam(':phone', $phone, PDO::PARAM_STR);              
               $bookingStmt->bindParam(':address', $address, PDO::PARAM_STR);              
               $bookingStmt->bindParam(':location', $location, PDO::PARAM_STR);              
               $bookingStmt->bindParam(':guests', $guests, PDO::PARAM_INT);              
               $bookingStmt->bindParam(':arrival', $arrival, PDO::PARAM_STR);              
               $bookingStmt->bindParam(':departure', $departure, PDO::PARAM_STR); 
               $booking = $bookingStmt->execute();   
               
               if ($booking) {
                    Message::setMsg('Booking information inserted successfully!', 'success');
               } else {
                    Message::setMsg('Booking failed!', 'error');
               }
          }
     }

     public function about()
     {
          return [];
     }
}
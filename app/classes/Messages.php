<?php

class Message {
    public static function setMsg($message, $type = 'success')
    {
     $_SESSION['message'] = $message;
     $_SESSION['message_type'] = $type;
    }

    public static function display()
    {
     if (isset($_SESSION['message'])) {
     $type = $_SESSION['message_type'] === 'success' ? 'alert-success' : 'alert-danger';
     echo '<div class="alert ' . $type . '">' . $_SESSION['message'] . '</div>';
     unset($_SESSION['message'], $_SESSION['message_type']);
     }
  }
}

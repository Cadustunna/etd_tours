<?php require_once('views/includes/header.php'); ?>
<?php require_once('views/includes/navbar.php'); ?>

<div class="container-fluid">
     <div class="row">

      <?php Message::display(); ?> 

     <?php require_once($view); ?>
     
     </div>
</div>


<?php require_once('views/includes/footer.php'); ?>
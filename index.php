<?php require ('includes/config.inc.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="The SP40 is created by ICONIC Auto Sports, a Miami based low volume car.">
  <title>SP40 BY ICONIC AUTO SPORTS</title>

  <!-- Favicons -->
  <?php include('includes/favicon.php'); ?>

  <link rel="stylesheet" type="text/css" href="./node_modules/normalize.css/normalize.css">
  <link rel="stylesheet" type="text/css" href="./node_modules/@fortawesome/fontawesome-free/css/all.css">
  <link rel="stylesheet" type="text/css" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./node_modules/aos/dist/aos.css"/>
  <link rel="stylesheet" href="css/app.css">
</head>
<body>
  
  <?php $current = 'index'; ?>

  <!-- Modal -->
  <?php include('includes/contacto-modal.php'); ?>

  <!-- Header -->
  <?php include('includes/header.php'); ?>

  <section class="container-fluid">

    <!-- Slide -->
    <div class="row">
      <div class="col-md-12">
        Lorem ipsum dolor sit amet, consectetur, adipisicing elit. Velit officia repellendus accusamus deserunt tempora adipisci quae, commodi, earum architecto sed ad ipsa saepe voluptatem fugit consequuntur necessitatibus beatae? Repellendus, ut?
      </div>
    </div>
    <!-- Slide end -->
  </section>

  <!-- Footer -->
  <?php include('includes/footer.php'); ?>
  
  <script type="text/javascript" src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./node_modules/aos/dist/aos.js"></script>
  <script type="text/javascript" src="js/app.js"></script>

  <?php 

    if (isset($_GET['errors']) || isset($_GET['msg_contacto'])) {

      ?>
      <script>

        var modal = new bootstrap.Modal(document.getElementById('contactModal'), {
          keyboard: false
        })

        modal.show()
        
      </script>
      <?php 

    } 

  ?>
</body>

</html>
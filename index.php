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

  <!-- Section Home -->
  <section class="home">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="text-white mb-5">LAUNCHING 2022</h1>
          <img class="img-fluid" src="./img/logo-large-sp40.png" alt="logo sp40 large">
          <h2 class="text-white mt-5">Inspired by American muscle and European design</h2>
        </div>
      </div>
    </div>
  </section>
  <!-- Section Home end -->

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
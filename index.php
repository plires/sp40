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

  <!-- PAGE -->
  <sction class="page">
    
    <!-- Slide -->
    <section class="container-fluid carousel-fade slides_home">

      <div class="row">

        <div class="col-md-12 p-0">

          <div id="carouselHomeControls" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">

              <div id="slide_1" class="carousel-item active">
                <div class="content">
                  <h1>
                    Inspired by American muscle<br>
                    <span>and European design</span>
                  </h1>
                </div>
              </div>

              <div id="slide_2" class="carousel-item">
                <div class="content">
                  <h2>
                    Inspired by American muscle<br>
                    <span>and European design</span>
                  </h2>
                </div>
              </div>

              <div id="slide_3" class="carousel-item">
                <div class="content">
                  <h2>
                    Inspired by American muscle<br>
                    <span>and European design</span>
                  </h2>
                </div>
              </div>

              <div id="slide_4" class="carousel-item">
                <div class="content">
                  <h2>
                    Inspired by American muscle<br>
                    <span>and European design</span>
                  </h2>
                </div>
              </div>

              <div id="slide_5" class="carousel-item">
                <div class="content">
                  <h2>
                    Inspired by American muscle<br>
                    <span>and European design</span>
                  </h2>
                </div>
              </div>
              
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselHomeControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselHomeControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>

          </div>

        </div>

      </div>

    </section>
    <!-- Slide end -->

    <!-- Presentation -->
    <section class="container-fluid presentation">
      <div class="row">

        <div class="col-lg-5 offset-lg-1 data">
          <img class="img-fluid logo" src="./img/presentation-logo.jpg" alt="logo concept sp40">
          
          <div>
            <h3>We love classic cars.</h3>
            <p>
              Everything about them, the curves, the design, the feeling of riding history, but something was missing. So we created the SP40 Restomod, a unique car that combines the best of both worlds.
              Modern technology and the elegance of a classic.
            </p>

            <h4>How did we do this?</h4>
            <p>
              Inspired by our award winning Ford 40 Special Speedster 
              we designed a powerful, attractive and functional car.
              We take the lines and design of the original model and develop 
              it from scratch together with the best technologies in 
              motorization, electronics, chassis and body construction.
            </p>
          </div>

          <div class="barra first">
            <div class="up">
              <h5>classic</h5>
              <h5>100%</h5>
            </div>
            <div class="complete"></div>
          </div>

          <div class="barra">
            <div class="up">
              <h5>modern</h5>
              <h5>100%</h5>
            </div>
            <div class="complete"></div>
          </div>

          <div class="barra">
            <div class="up">
              <h5>carbon fiber body</h5>
              <h5>100%</h5>
            </div>
            <div class="complete"></div>
          </div>

        </div>

        <div class="col-lg-6 img">
          <img src="./img/presentation.jpg" class="img-fluid" alt="presentation sp40">
        </div>
          
      </div>
    </section>
    <!-- Presentation end -->

    <!-- Features Mobile -->
    <section class="container-fluid features_mobile">
      <div class="row">
        <div class="col-md-12">
          <div id="carouselConceptControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

              <div class="carousel-item active">
                <img src="./img/slide-1.jpg" class="d-block w-100" alt="slide sp40 1">
                <h1>
                  Inspired by American muscle<br>
                  <span>and European design</span>
                </h1>
              </div>

              <div class="carousel-item">
                <img src="./img/slide-2.jpg" class="d-block w-100" alt="slide sp40 2">
                <h2>
                  Inspired by American muscle<br>
                  <span>and European design</span>
                </h2>
              </div>
              <div class="carousel-item">
                <img src="./img/slide-3.jpg" class="d-block w-100" alt="slide sp40 3">
                <h2>
                  Inspired by American muscle<br>
                  <span>and European design</span>
                </h2>
              </div>
              <div class="carousel-item">
                <img src="./img/slide-4.jpg" class="d-block w-100" alt="slide sp40 4">
                <h2>
                  Inspired by American muscle<br>
                  <span>and European design</span>
                </h2>
              </div>
              <div class="carousel-item">
                <img src="./img/slide-5.jpg" class="d-block w-100" alt="slide sp40 5">
                <h2>
                  Inspired by American muscle<br>
                  <span>and European design</span>
                </h2>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselConceptControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselConceptControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </section>
    <!-- Features Mobile end -->

    <!-- Features Desktop -->
    <section class="container-fluid features_desktop">
      <div class="row">
        <div class="col-md-12 p-0">
          <img src="./img/features.jpg" class="d-block w-100" alt="features sp40">

          <h2>concept</h2>
          <p>Click <img src="./img/btn-more.png" class="d-inline" alt="button more samll sp40">buttons to see details</p>
          
          <button type="button" class="btn btn-lg btn-danger" data-bs-toggle="popover" title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?">
            <img src="./img/btn-more.png" class="img-fluid" alt="button more motor sp40">
          </button>

          <p>
            ver como implementar popover
          </p>

        </div>
      </div>
    </section>
    <!-- Features Desktop end -->

    <!-- Gallery -->
    <section class="container-fluid gallery">
      <div class="row">

        <div class="col-md-5 offset-md-1 data">
          <img src="./img/galeria-izq-a.jpg" class="img-fluid" alt="gallery left a sp40">
          <p>Inspired by American muscle and European design.</p>
          <img src="./img/galeria-izq-b.jpg" class="img-fluid" alt="gallery left b sp40">
        </div>

        <div class="col-md-5 img">
          <img src="./img/galeria-der.png" class="img-fluid" alt="gallery right sp40">
        </div>

      </div>
    </section>
    <!-- Gallery end -->

    <!-- About Us -->
    <section class="container-fluid about">
      <div class="row">

        <div class="col-md-6 data">
          <h2>history</h2>
          <p>
            The SP40 is created by Iconic Auto Sports, a low volume car manufacture company, founded by Francisco Orden and Arturo Arrabillaga. 
            Both are passionate about cars and wanted to create something new, a place where cars could be restored but also where people could find their dream car.
            Combining Arturo´s skills in industrial engineering and Francisco´s marketing ideas, they won three Autoclassica´s awards:
          </p>

          <p>
            Mejor Artesanía - Autoclásica 2016 
            1931 Mercedes Benz SSK Count Trossi
          </p>

          <p>
            Mejor Artesanía - Autoclásica 2017 
            1952 - Alfa Romeo DV C52 Fianchi Stretti
          </p> 

          <p>
            Mejor Artesanía - Autoclásica 2018
            1934 - Ford 40 Special Speedster Boattail
          </p>

          <p>
            Winning the award with the Ford 40 Special Speedster, urged 
            the desire to create their own Ford 40 Speedster Restomod.
            In order to create this car, they had to create each individual 
            part from scratch. So they started the journey combining a classy 
            American muscle with European design.
          </p>

          <p>
            To learn more about the original 1934 Ford Model 40 Special Speedster
            <a href="#" rel="noopener" target="_blank">CLICK HERE</a>
          </p>

        </div>

        <div class="col-md-6 img">
          <img src="./img/history-1.jpg" class="img-fluid" alt="history 1 sp40">
        </div>

      </div>

      <div class="row">

        <div class="col-md-6 img">
          <img src="./img/history-2.jpg" class="img-fluid" alt="history 2 sp40">
        </div>

        <div class="col-md-6 data">
          <h2>about us</h2>
          
          <p>
            Iconic Auto Sports is a classic car evocation custom made company, that specializes in the body building and craftsmanship of recreations of the most famous and unique vehicles in the world.
            It also restores original cars and has its own and unique racing, classic and vintage models. In its production records, it denotes over 100 cars built through the last decades, many of them for the top classic car collectors in South America and abroad.
          </p>

          <p>
            Iconic Auto Sports cars have been presented in some of the finest international auction houses with excellent estimates and selling results, as well as being awarded by specialized classic car juries in renowned exhibitions, the best price for construction quality and supreme bodybuilding. But it wasn’t until the year 2016 that it was formerly registered under the name of Iconic Auto Sports.
          </p>

          <p>
            The firm is currently settled in its new state of the art car factory
            in San Isidro, Buenos Aires, Argentina.
          </p>

        </div>

      </div>
    </section>
    <!-- About Us end -->

    <!-- Team -->
    <section class="container-fluid team">
      <div class="row">

        <div class="col-md-10 offset-md-1">
          <h2>the team</h2>

          <div class="row">
            <div class="col-md-8 offset-md-2">
              <div class="row">
                <div class="col-md-4">
                  <img src="./img/team-1.jpg" class="img-fluid" alt="team 1 sp40">
                </div>
                <div class="col-md-4">
                  <img src="./img/team-2.jpg" class="img-fluid" alt="team 2 sp40">
                </div>
                <div class="col-md-4">
                  <img src="./img/team-3.jpg" class="img-fluid" alt="team 3 sp40">
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- Team end -->

    <!-- Lauch -->
    <section class="container-fluid lauch">
      <div class="row">

        <div class="col-md-12">
          <img src="./img/logo-sp40-large.png" class="img-fluid" alt="logo sp40 large">
          <h2>LAUNCHING 2022</h2>
          <button class="btn btn-primary">JOIN THE WAITING LIST</button>
        </div>

      </div>
    </section>
    <!-- Lauch end -->

  </sction>
  <!-- PAGE end -->

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

<script>
  var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
  })
</script>

</html>
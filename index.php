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
  <link rel="stylesheet" href="./node_modules/popover-plugin/dist/popover.min.css">
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
    <section data-aos="fade-up" id="presentation" class="container-fluid presentation">
      <div class="row">

        <div class="col-lg-5 offset-lg-1 data">
          <img class="img-fluid logo" src="./img/presentation-logo.jpg" alt="logo concept sp40">
          
          <div>
            <h3>We love classic cars.</h3>
            <p>
              Everything about them, the curves, the design, the feeling of riding history, but many times the sweet & souer sensation invades all these beautiful emotions when clogged carburators, worn contact breaker points, spark plug stucks or simply fatigued spare parts not working frustrates the dreamed road trip or ride in our classic car. So we created the SP40 Restomod, a unique car that combines the best of both worlds. Modern technology and the elegance of a classic.
            </p>

            <h4>How did we do this?</h4>
            <p>
              Inspired by our award  winning 1934 Ford 40 Special Speedster Boattail we designed a powerful, attractive and functional car. We took the lines and the design of the original model and developed it together with the best technologies in motoration, electronics, chassis and supreme body construction 
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
    <section data-aos="fade-up" id="concept_mobile" class="container-fluid features_mobile">
      <div class="row">
        <div class="col-md-10 offset-md-1">
          <div id="carouselConceptControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

              <!-- Engine -->
              <div class="carousel-item active">
                <img src="./img/engine-featured.jpg" class="d-block w-100" alt="engine sp40">
                <div class="content">
                  <h3 class="arimo">engine</h3>
                  <p class="arimo description">
                    Ford Coyote V8 Gen3 (aluminum) 5.0L Engine
                  </p>
                  <div class="numbers">
                    <p class="number_a">+460<span>horsepower</span></p>
                    <p class="number_b">+420<span>LB-FT TORQUE</span></p>
                  </div>
                </div>
              </div>
              <!-- Engine end -->

              <!-- Transmision -->
              <div class="carousel-item">
                <img src="./img/transmision-featured.jpg" class="d-block w-100" alt="transmision sp40">
                <div class="content">
                  <h3 class="arimo">transmision</h3>
                  <p class="arimo description">
                    Tremec TKO 500/600
                  </p>
                </div>
              </div>
              <!-- Transmision end -->

              <!-- Suspension -->
              <div class="carousel-item">
                <img src="./img/suspension-featured.jpg" class="d-block w-100" alt="suspension sp40">
                <div class="content">
                  <h3 class="arimo">suspension</h3>
                  <p class="arimo description">
                    Independent rear, traction-lok differential and front independent
                  </p>
                </div>
              </div>
              <!-- Suspension end -->

              <!-- Brakes -->
              <div class="carousel-item">
                <img src="./img/brakes-featured.jpg" class="d-block w-100" alt="brakes sp40">
                <div class="content">
                  <h3 class="arimo">brakes</h3>
                  <p class="arimo description">
                    Tilton pedals <br>
                    Mustang GT350R brakes. Brembo 6 piston aluminum fixed front calipers. Front rotors 15.5” cross-drilled with directional vanes. Brembo 4 piston aluminum rear calipers. Rear rotors are 14.9” cross-drilled
                  </p>
                </div>
              </div>
              <!-- Brakes end -->

              <!-- Exhaust -->
              <div class="carousel-item">
                <img src="./img/exhaust-featured.jpg" class="d-block w-100" alt="exhaust sp40">
                <div class="content">
                  <h3 class="arimo">EXHAUST</h3>
                  <p class="arimo description">
                    Full stainless steel long tube headers, mufflers and pipes
                  </p>
                </div>
              </div>
              <!-- Exhaust end -->

              <!-- Wheels -->
              <div class="carousel-item">
                <img src="./img/wheels-featured.jpg" class="d-block w-100" alt="wheels sp40">
                <div class="content">
                  <h3 class="arimo">wheels</h3>
                  <p class="arimo description">
                    Front 235/45/20 - Rear 275/35/20
                  </p>
                </div>
              </div>
              <!-- Wheels end -->

              <!-- Body -->
              <div class="carousel-item">
                <img src="./img/body-featured.jpg" class="d-block w-100" alt="body sp40">
                <div class="content">
                  <h3 class="arimo">body</h3>
                  <p class="arimo description">
                    Full carbon fiber body
                  </p>
                </div>
              </div>
              <!-- Body end -->

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
    <section data-aos="fade-up" id="concept_desktop" class="container-fluid features_desktop">
      <div class="row">
        <div class="col-md-12 p-0 img">

          <h2 class="arimo">concept</h2>
          <p class="subtitulo">Click <img src="./img/btn-more.png" class="d-inline icon" alt="button more samll sp40">buttons to see details</p>

          <!-- Engine -->
          <div data-popover-target="#engine-popover-target" class="popover-ele btn_features btn_engine"></div>
          
          <div id="engine-popover-target">
            <div class="pop-comp-content content_card">
              <img class="img_featured" src="./img/engine-featured.jpg" alt="engine featured desktop">
              <div class="content">
                <h3 class="arimo">engine</h3>
                <p>
                  Ford Coyote V8 - Gen3 (aluminum) - 5.0L Engine
                </p>
              </div>
            </div>
          </div>
          <!-- Engine end -->

          <!-- Transmision -->
          <div data-popover-target="#transmision-popover-target" class="popover-ele btn_features btn_transmision"></div>
          
          <div id="transmision-popover-target">
            <div class="pop-comp-content content_card">
              <img class="img_featured" src="./img/transmision-featured.jpg" alt="transmision featured desktop">
              <div class="content">
                <h3 class="arimo">transmision</h3>
                <p>
                  Tremec TKO 500/600
                </p>
              </div>
            </div>
          </div>
          <!-- Transmision end -->

          <!-- Suspension -->
          <div data-popover-target="#suspension-popover-target" class="popover-ele btn_features btn_suspension"></div>
          
          <div id="suspension-popover-target">
            <div class="pop-comp-content content_card">
              <img class="img_featured" src="./img/suspension-featured.jpg" alt="suspension featured desktop">
              <div class="content">
                <h3 class="arimo">suspension</h3>
                <p>
                  Independent rear, traction-lok differential and front independent
                </p>
              </div>
            </div>
          </div>
          <!-- Suspension end -->

          <!-- Brakes -->
          <div data-popover-target="#brakes-popover-target" class="popover-ele btn_features btn_brakes"></div>
          
          <div id="brakes-popover-target">
            <div class="pop-comp-content content_card">
              <img class="img_featured" src="./img/brakes-featured.jpg" alt="brakes featured desktop">
              <div class="content">
                <h3 class="arimo">brakes</h3>
                <p>
                  Tilton pedals - Mustang GT350R brakes
                </p>
              </div>
            </div>
          </div>
          <!-- Brakes end -->

          <!-- Exhaust -->
          <div data-popover-target="#exhaust-popover-target" class="popover-ele btn_features btn_exhaust"></div>
          
          <div id="exhaust-popover-target">
            <div class="pop-comp-content content_card">
              <img class="img_featured" src="./img/exhaust-featured.jpg" alt="exhaust featured desktop">
              <div class="content">
                <h3 class="arimo">exhaust</h3>
                <p>
                  Full stainless steel long tube headers, mufflers and pipes 
                </p>
              </div>
            </div>
          </div>
          <!-- Exhaust end -->

          <!-- Wheels -->
          <div data-popover-target="#wheels-popover-target" class="popover-ele btn_features btn_wheels"></div>
          
          <div id="wheels-popover-target">
            <div class="pop-comp-content content_card">
              <img class="img_featured" src="./img/wheels-featured.jpg" alt="wheels featured desktop">
              <div class="content">
                <h3 class="arimo">wheels</h3>
                <p>
                  Front 235/45/20 - Rear 275/35/20
                </p>
              </div>
            </div>
          </div>
          <!-- Wheels end -->

          <!-- Body -->
          <div data-popover-target="#body-popover-target" class="popover-ele btn_features btn_body"></div>
          
          <div id="body-popover-target">
            <div class="pop-comp-content content_card">
              <img class="img_featured" src="./img/body-featured.jpg" alt="body featured desktop">
              <div class="content">
                <h3 class="arimo">body</h3>
                <p>
                  Full carbon fiber body
                </p>
              </div>
            </div>
          </div>
          <!-- Body end -->

        </div>
      </div>
    </section>
    <!-- Features Desktop end -->

    <!-- Gallery -->
    <section data-aos="fade-up" id="gallery" class="container-fluid gallery">
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
    <section data-aos="fade-up" id="about" class="container-fluid about">
      <div class="row">

        <div class="col-lg-5 offset-lg-1 data">
          <h2 class="arimo">history</h2>

          <p>
            The SP40 is created by Iconic Auto Sports, a low volume car manufacturer company, founded by Francisco Orden and Arturo Arrebillaga. Both are passionate about cars and wanted to create something new, a place where cars could be restored but mostly where people could find their dream and unique iconic car. Combining Arturo´s Skills in industrial engineering and Francisco´s marketing ideas, they won three Autoclasica´s awards:
          </p>

          <p>
            Best Argentinian Handcrafted Coachbuilders - Autoclásica 2016 <br>
            1931 Mercedes Benz SSK Count Trossi Evocation
          </p>

          <p>
            Best Argentinian Handcrafted Coachbuilders  - Autoclásica 2017 <br>
            1952 Alfa Romeo DV C52 Fianchi Stretti Evocation
          </p>

          <p>
            Best Argentinian Handcrafted Coachbuilders  - Autoclásica 2018 <br>
            1934 Ford 40 Special Speedster Boattail Evocation 
          </p>

          <p>
            Winning this award with the Ford 40 Special Speedster Boattail, urged the desire to create their own Ford 40 Speedster Restomod. 
            In order to build this car, they had to design and fabricate each individual part. So they started the journey with by combining a classy American muscle with European design.
          </p>

          <p>
            To learn more about the original 1934 Ford Model 40 Special Speedster Boattail <a class="transition" href="#" rel="noopener" target="_blank">CLICK HERE</a>
          </p>

        </div>

        <div class="col-lg-6 img">
          <img src="./img/history-1.jpg" class="img-fluid" alt="history 1 sp40">
        </div>

      </div>

      <div class="row">

        <div class="col-lg-6 img">
          <img src="./img/history-2.jpg" class="img-fluid" alt="history 2 sp40">
        </div>

        <div class="col-lg-5 data">
          <h2 class="arimo">about us</h2>

          <p>
            Iconic Auto Sports is a classic car evocation custom made company, that specializes in the body building and craftsmanship of recreations of the most famous and unique vehicles in the world. It also restores original cars and has its own and unique racing, classic and vintage models. In its production records, it detonates over 100 cars built through the last decades, many of them for the top classic car collectors in South America and abroad.
          </p>

          <p>
            Iconic Auto Sports cars have been presented in some of the finest international auction houses with excellent estimates and selling results, as well as being awarded by specialized classic car juries in renowned exhibitions, the best prize for construction quality and supreme bodybuilding. But it wasn´t until the year 2016 that it was formally registered under the name of OHA Automobili and in 2020 changed its name to Iconic Auto Sports. 
          </p>

          <p>
            The firm is currently settles in its new state of the art car boutique factory in San isidro, Buenos Aires, Argentina             
          </p>
          
        </div>

      </div>
    </section>
    <!-- About Us end -->

    <!-- Team -->
    <section data-aos="fade-up" class="container-fluid team">
      <div class="row">

        <div class="col-md-10 offset-md-1">
          <h2 class="arimo">the team</h2>
        </div>

        <div class="col-md-8 offset-md-2">
          <div class="row">

            <div class="col-md-4 content_team">
              <img src="./img/team-1.jpg" class="img-fluid" alt="team 1 sp40">
              <h3 class="arimo">pedro<br>campo</h3>
              <p>Automotive designer and specialist <br>in competition aerodynamics.</p>
            </div>

            <div class="col-md-4 content_team">
              <img src="./img/team-2.jpg" class="img-fluid" alt="team 2 sp40">
              <h3 class="arimo">francisco<br>orden</h3>
              <p>Founder - Iconic Auto Sports</p>
            </div>

            <div class="col-md-4 content_team">
              <img src="./img/team-3.jpg" class="img-fluid" alt="team 3 sp40">
              <h3 class="arimo">Arturo<br>Arrebillaga</h3>
              <p>Founder - Iconic Auto Sports</p>
            </div>

          </div>
        </div>

        </div>

      </div>
    </section>
    <!-- Team end -->

    <!-- Lauch -->
    <section data-aos="fade-up" class="container-fluid lauch">
      <div class="row">

        <div class="col-md-12 content">
          <img src="./img/logo-sp40-large.png" class="img-fluid" alt="logo sp40 large">
          <h2 class="arimo">LAUNCHING 2022</h2>
          <button 
            data-bs-toggle="modal" 
            data-bs-target="#contactModal" 
            class="btn btn-primary arimo transition">JOIN THE WAITING LIST
          </button>
        </div>

      </div>
    </section>
    <!-- Lauch end -->

  </sction>
  <!-- PAGE end -->

  <!-- Footer -->
  <?php include('includes/footer.php'); ?>
  
  <script src="./node_modules/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js?render=<?= RECAPTCHA_KEY_SITE ?>"></script>
  <script type="text/javascript" src="./node_modules/aos/dist/aos.js"></script>
  <script src="./node_modules/popover-plugin/dist/popover.min.js"></script>
  <script src="./node_modules/jquery-easing/dist/jquery.easing.1.3.umd.min.js"></script>
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

  <script>
    PopoverComponent.init({
      ele: '.popover-ele'
    });
  </script>

</body>

</html>
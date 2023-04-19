<header>

  <i id="hamburger" class="fas fa-bars transition"></i>

  <a class="content_logo transition" href="./">
    <img class="logo transition" src="./img/logo-small-sp40.png" alt="logo small sp40">
  </a>

  <div class="menu_rrss">
    <a 
      href="#" 
      class="transition mail" 
      data-bs-toggle="modal" 
      data-bs-target="#contactModal">
        <i class="transition fa-regular fa-envelope"></i>
    </a>
  </div>

  <nav id="menu" class="transition">
    <ul>
      <li>
        <img class="logo_menu" src="./img/logo-menu.png" alt="logo menu sp40">
      </li>
      <li><a class="arimo transition" href="#presentation" onclick="menuToggle()">Presentation</li></a>
      <li class="btn_nav_desktop"><a class="arimo transition" href="#concept_desktop" onclick="menuToggle()">Concept</li></a>
      <li class="btn_nav_mobile"><a class="arimo transition" href="#concept_mobile" onclick="menuToggle()">Concept</li></a>
      <li><a class="arimo transition" href="#about" onclick="menuToggle()">About us</li></a>
      <li><a class="arimo transition" href="#gallery" onclick="menuToggle()">Gallery</li></a>
      <li>
        <div class="icons">
          <a class="transition" href="<?= RRSS_FACEBOOK ?>" target="_blank" rel="noopener noreferrer">
            <i class="transition fa-brands fa-facebook"></i>
          </a>
          <a class="transition" href="<?= RRSS_INSTAGRAM ?>" target="_blank" rel="noopener noreferrer">
            <i class="transition fa-brands fa-instagram"></i>
          </a>
          <a class="transition" href="<?= RRSS_LINKEDIN ?>" target="_blank" rel="noopener noreferrer">
            <i class="transition fa-brands fa-linkedin"></i>
          </a>
          <a class="transition" href="<?= RRSS_YOUTUBE ?>" target="_blank" rel="noopener noreferrer">
            <i class="transition fa-brands fa-youtube"></i>
          </a>
          <a 
            class="transition" 
            href="#" 
            data-bs-toggle="modal" 
            data-bs-target="#contactModal">
              <i class="transition fa-regular fa-envelope"></i>
          </a>
        </div>
      </li>
    </ul>
  </nav>

</header>
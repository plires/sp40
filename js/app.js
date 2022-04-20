$(document).ready(function() {

  const header = document.getElementsByTagName("header")[0]
  const toggle = document.getElementById('hamburger')
  const menu = document.getElementById('menu')

  function menuToggle() {

  	menu.classList.toggle('active')
  	toggle.classList.toggle('active')
  	
  	if (toggle.classList.contains("fa-bars")) {

  		toggle.classList.remove('fa-bars')
  		toggle.classList.add('fa-times')

  	} else {

  		toggle.classList.add('fa-bars')
  		toggle.classList.remove('fa-times')
  		
  	}

  }

  toggle.addEventListener('click', function(){
  	menuToggle()
  });

  function showlHeader() {
    header.classList.add('header_small')
  }

  function hidelHeader() {
    header.classList.remove('header_small')
  }

  window.addEventListener('scroll', function() {

    if ( window.scrollY > 100) {
      showlHeader()
    } else {
      hidelHeader()
    }

  });

  $('#send').click(function() { // validar formulario

    var errorsInFieldsFront = false

    // Validacion del Formulario
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var form = document.getElementById('form-contacto');
    
    if (form.checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
      errorsInFieldsFront = true
    }
    form.classList.add('was-validated');

    if (!errorsInFieldsFront) {
      grecaptcha.ready(function() {
        grecaptcha.execute('6LflZIofAAAAAOuuw2MHK9vwm6RxVWo7c-v-tVIL', {
          action: 'validarFormulario'
          }).then(function(token) {
          $('#form-contacto').prepend('<input type="hidden" name="token" value="' + token + '" >');
          $('#form-contacto').prepend('<input type="hidden" name="action" value="validarFormulario" >');
          $('#form-contacto').submit();
        });
      });
    } 

  });

});

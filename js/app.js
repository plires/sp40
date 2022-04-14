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

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

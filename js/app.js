const header = document.getElementsByTagName("header")[0];
const toggle = document.getElementById("hamburger");
const menu = document.getElementById("menu");

function menuToggle() {
  menu.classList.toggle("active");
  toggle.classList.toggle("active");

  if (toggle.classList.contains("fa-bars")) {
    toggle.classList.remove("fa-bars");
    toggle.classList.add("fa-times");
  } else {
    toggle.classList.add("fa-bars");
    toggle.classList.remove("fa-times");
  }
}

toggle.addEventListener("click", function () {
  menuToggle();
});

function showlHeader() {
  header.classList.add("header_small");
}

function hidelHeader() {
  header.classList.remove("header_small");
}

window.addEventListener("scroll", function () {
  if (window.scrollY > 100) {
    showlHeader();
  } else {
    hidelHeader();
  }
});

AOS.init();

// ============================================
// ANTI-SPAM: Gestión del Timestamp
// ============================================

function setFormTimestamp() {
  const timestampField = document.getElementById("form_timestamp");
  if (timestampField && !timestampField.value) {
    const timestamp = Math.floor(Date.now() / 1000);
    timestampField.value = timestamp;
  }
}

// Método 1: Cuando se muestra el modal (Bootstrap 5)
const contactModal = document.getElementById("contactModal");
if (contactModal) {
  contactModal.addEventListener("shown.bs.modal", function () {
    setFormTimestamp();
  });

  // Método 2: Cuando se oculta el modal, limpiar
  contactModal.addEventListener("hidden.bs.modal", function () {
    const timestampField = document.getElementById("form_timestamp");
    if (timestampField) {
      timestampField.value = "";
    }
  });
}

// Método 3: Establecer al cargar la página (fallback)
document.addEventListener("DOMContentLoaded", function () {
  // Si el modal está visible al cargar, establecer timestamp
  if (contactModal && contactModal.classList.contains("show")) {
    setFormTimestamp();
  }
});

// Método 4: Antes de enviar el formulario (último recurso)
$("#send").click(function (event) {
  // Asegurar que el timestamp esté establecido
  const timestampField = document.getElementById("form_timestamp");
  if (!timestampField || !timestampField.value) {
    console.warn("⚠️ Timestamp no establecido, configurando ahora...");
    setFormTimestamp();
  }

  var errorsInFieldsFront = false;

  // Validacion del Formulario
  var form = document.getElementById("form-contacto");

  if (form.checkValidity() === false) {
    event.preventDefault();
    event.stopPropagation();
    errorsInFieldsFront = true;
  }
  form.classList.add("was-validated");

  if (!errorsInFieldsFront) {
    // Verificar una última vez el timestamp antes de enviar
    const finalTimestamp = document.getElementById("form_timestamp").value;
    console.log("📤 Enviando formulario con timestamp:", finalTimestamp);

    grecaptcha.ready(function () {
      grecaptcha
        .execute("6LflZIofAAAAAOuuw2MHK9vwm6RxVWo7c-v-tVIL", {
          action: "validarFormulario",
        })
        .then(function (token) {
          $("#form-contacto").prepend(
            '<input type="hidden" name="token" value="' + token + '" >'
          );
          $("#form-contacto").prepend(
            '<input type="hidden" name="action" value="validarFormulario" >'
          );
          $("#form-contacto").submit();
        });
    });
  }
});

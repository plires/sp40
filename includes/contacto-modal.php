<?php 

	if (isset($_GET['errors'])) {

	  $errors = unserialize(urldecode($_GET['errors']));

	} else {
	  $errors = '';
	}

	if (isset($_GET['msg_contacto'])) {

	  $msg_contacto = urldecode($_GET['msg_contacto']);

	} 

	if (isset($_GET['name'])) {
	  $name = $_GET['name'];
	} else {
	  $name = '';
	}

	if (isset($_GET['email'])) {
	  $email = $_GET['email'];
	} else {
	  $email = '';
	}

	if (isset($_GET['phone'])) {
	  $phone = $_GET['phone'];
	} else {
	  $phone = '';
	}

	if (isset($_GET['city'])) {
	  $city = $_GET['city'];
	} else {
	  $city = '';
	}

	if (isset($_GET['comments'])) {
	  $comments = $_GET['comments'];
	} else {
	  $comments = '';
	}

?>

<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="contactModalLabel">JOIN THE WAITING LIST!</h5>
        <i data-bs-dismiss="modal" aria-label="Close" class="btn-close fa fa-times transition"></i>
      </div>
      <div class="modal-body">

      	<div class="container-fluid">
			    <div class="row">
			      <div class="col-md-12">
			      	<!-- Mensaje Exito -->
				      <?php if (isset($msg_contacto)): ?>
				        <div id="msg_contacto" class="alert alert-success alert-dismissible fade show" role="alert">
				          <strong>Successful!</strong>
				          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				          <ul style="padding: 0;">
				              <li>- <?php echo $msg_contacto; ?></li>
				          </ul>
				        </div>
				      <?php endif ?>
				      <!-- Mensaje Exito end -->

				      <!-- Errores Formulario -->
				      <?php if ($errors): ?>

				        <div id="error" class="alert alert-danger alert-dismissible fade show" role="alert">
				          <strong>¡Please check the data!</strong>
				          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				          <ul style="padding: 0;">
				            <?php foreach ($errors as $error) { ?>
				              <li>- <?php echo $error; ?></li>
				            <?php } ?>
				          </ul>
				        </div>

				      <?php endif ?>
				      <!-- Errores Formulario end -->
			      </div>
			    </div>
		    </div>
        
        <!-- Formulario -->
        <form id="form-contacto" action="php/validate-form.php" method="post" class="needs-validation" novalidate>

				  <div class="mb-3">
				    <label for="name" class="form-label">Name</label>
				    <input required type="text" class="form-control" value="<?= $name ?>" name="name" aria-describedby="nameHelp">
	          <div class="invalid-feedback">
			        Please enter your name.
			      </div>
				  </div>

				  <div class="mb-3">
				    <label for="email" class="form-label">Email</label>
				    <input required type="email" class="form-control" value="<?= $email ?>" name="email" aria-describedby="emailHelp">
				    <div class="invalid-feedback">
			        Please enter your email.
			      </div>
				  </div>

				  <div class="mb-3">
				    <label for="phone" class="form-label">Phone</label>
				    <input type="text" class="form-control" value="<?= $phone ?>" name="phone" aria-describedby="phoneHelp">
				  </div>

				  <div class="mb-3">
					  <label for="comments" class="form-label">Comments</label>
					  <textarea required class="form-control" name="comments" rows="3"><?= $comments ?></textarea>
					  <div class="invalid-feedback">
			        Please enter your comments.
			      </div>
					</div>

					<div class="text-center">
				  	<button type="submit" class="btn btn-primary">SEND</button>
					</div>

				</form>
        <!-- Formulario end -->

      </div>
    </div>
  </div>
</div>
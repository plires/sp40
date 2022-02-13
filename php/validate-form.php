<?php

  include('functions.php');
  include('../includes/config.inc.php');
  include('../clases/app.php');
  
	// Verificamos si hay errores en el formulario
  if (emptyInput($_POST['name'])){
    $errors['error_name']='Please enter your name.';
  } else {
    $name = $_POST['name'];
  }

  if (!emailCheck($_POST['email'])){
    $errors['error_email']='Please enter your email.';
  } else {
    $email = $_POST['email'];
  }

  if (emptyInput($_POST['comments'])){
    $errors['error_comments']='Please enter your comments.';
  } else {
    $comments = $_POST['comments'];
  }

  if (!isset($errors)) {
  	
	  //Enviamos los mails al cliente y usuario
	  $app = new App;

	  $sendClient = $app->sendContact($_POST);

	  if ($sendClient) {
	  	$msg_contacto = 'Message received. We will answer you shortly. Thanks a lot!';
	    $url = explode("?",$_SERVER['HTTP_REFERER']);

	    header("Location: " . $url[0] ."?msg_contacto=". urlencode($msg_contacto) . "#msg_contacto" );
  	exit;
	  } else {
	    exit('Error submitting the form, please try again');
	  }

  } else {
  	$phone = $_POST['phone'];
  	$url = explode("?",$_SERVER['HTTP_REFERER']);

  	header("Location: " . $url[0] . "?name=$name&email=$email&phone=$phone&comments=$comments&errors=" . urlencode(serialize($errors)) . "#error");
  	exit;
  }
 
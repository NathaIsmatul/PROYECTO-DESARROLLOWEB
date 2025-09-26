<?php
    require_once('../models/loginModel.php');
    session_start();
    $username = $_POST['nombre'];
    $password = $_POST['contrasena'];
    $usuario = new usuario();
    
    if(!empty($_SESSION['PERFIL'])){
        switch($_SESSION['PERFIL']){
            case 1:
                header('Location: ../views/index.php');
                break;
            case 2:
                header('Location: ../Vista/Tec_catalogo.php');
                break;
        }
    }else{
        $usuario -> logearse($username, $password);
        if(!empty($usuario->objetos)){
            foreach($usuario->objetos as $objeto){
                $_SESSION['USUARIO'] = $objeto['USUARIO']; 
                $_SESSION['CLAVE'] = $objeto['CLAVE'];
                $_SESSION['ID_PERFIL'] = $objeto['ID_PERFIL'];
            }
            switch($_SESSION['ID_PERFIL']){
                case 1:
                    header('Location: ../views/index.php');
                    break;
                case 2:
                    header('Location: ../views/index.php');
                    break;
                case 3:
                    header('Location: ../views/V_empleado.php');
                    break;
            }
        }else{
            header('Location: ../../public/login.php');
        }
    }
?>
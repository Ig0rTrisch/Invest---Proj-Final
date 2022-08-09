<?php

namespace APP\Controller;

require_once '../../vendor/autoload.php';

use APP\Model\DAO\UserDAO;
use APP\Utils\Redirect;
use PDOException;

if (empty($_GET['operation'])) {
    Redirect::redirect(message: 'Requisição inválida!!!', type: 'error');
}

switch ($_GET['operation']) {
    case 'login':
        login();
        break;
    case 'logout':
        logout();
        break;
    default:
        Redirect::redirect(message: 'Operação inválida!!!', type: 'error');
}

function login()
{
    if (empty($_POST)) {
        Redirect::redirect(message: 'Requisição inválida!!!', type: 'error');
    }

    $login = $_POST['login'];
    $password = $_POST['password'];

    $dao = new UserDAO();
    $userClient = $dao->findClient($login);
    
    $userEmployee = $dao->findEmployee($login);
    //localizador automatica de login senha de funcionário e cliente
    if($userEmployee){
        if (password_verify($password, $userEmployee['password'])) {
            session_start();
            $_SESSION['auth'] = $login;
            header('location:../View/dashboard.php');
        } else {
            Redirect::redirect(message: ['Nenhum Funcionário foi localizado com essas credenciais'], type: 'warning');
        }
    }else if ($userClient) {

        if (password_verify($password, $userClient['password'])) {
            session_start();
            $_SESSION['auth'] = $login;
            header('location:../View/dashboard.php');
        } else {
            Redirect::redirect(message: ['Nenhum Cliente foi localizado com essas credenciais'], type: 'warning');
        }
    }else {
        Redirect::redirect(message: ['Nenhum usuário foi localizado com essas credenciais'], type: 'warning');
    }
}
function logout()
{
    session_start();
    session_destroy();
    header('location:../../index.html');
}

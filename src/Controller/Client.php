<?php

namespace APP\Controller;

use APP\Model\Address;
use APP\Model\Client;
use APP\Model\DAO\AddressDAO;
use APP\Model\DAO\ClientDAO;
use APP\Utils\Redirect;
use APP\Model\Validation;
use LDAP\Result;
use PDOException;

require '../../vendor/autoload.php';

if(!isset($_GET['operation'])){
    Redirect::redirect(message: 'Nenhuma operação foi enviada!!!', type:'error');
}

switch ($_GET['operation']){
    case 'insert':
        insertClient();
        break;
    case 'list':
        listClient();
        break;
    case 'remove':
        removeClient();
        break;
    case 'find':
        findClient();
        break;
    case 'edit':
        editClient();
        break;
    default:
        Redirect::redirect(message: 'A operação informada é inválida!!!', type:'error');
}

function insertClient()
{
    if(empty($_POST)){
        session_start();
        Redirect::redirect(message: 'Requisição inválida!!!', type:'error');
    }

    $name = $_POST["name"];
    $cpf = str_repeat(".","-", $_POST['cpf']);
    $birthDate = $_POST["birthDate"];
    $email = $_POST["email"];
    $login = $_POST["login"];
    $password = $_POST["password"];
    $clientPublicPlace = $_POST["publicPlace"];
    $clientStreetName = $_POST['streetName'];
    $clientnumberOfStreet = $_POST["numberOfStreet"];
    $clientComplement = $_POST["complement"];
    $clientNeighborhood = $_POST["neighborhood"];
    $clientCity = $_POST["city"];
    $clientZipCode = $_POST["zipCode"];

    $error = array();

    if(Validation::validateString($name)){
        array_unshift($error, "O nome do cliente deve ter mais de 3 Caractéres");
    }

    if($error){
        Redirect::redirect(message: $error, type:'warning');
    }else{
        $client = new Client(
            name: $name,
            cpf: $cpf,
            birthDate: $birthDate,
            email: $email,
            login: $login,
            password: $password,
            address: new Address(
                publicPlace: $clientPublicPlace,
                streetName: $clientStreetName,
                neighborhood: $clientNeighborhood,
                complement: $clientComplement,
                numberOfStreet: $clientnumberOfStreet,
                zipCode: $clientZipCode,
                city: $clientCity
            )
        );
        try {
            $dao = new AddressDAO();
            $result = $dao->insert($client->address);
            if($result){
                $data = $dao->findId();
                $client->address->id = $data["id"];
                $dao = new ClientDAO();
                $result = $dao->insert($client);
                if($result){
                    Redirect::redirect(message: "O cliente $name foi cadastrado com sucesso!!!");
                }else{
                    Redirect::redirect(message: "Lamento, não foi possível cadastrar o cliente $client", type: 'error');
                }
            }
        }catch(PDOException $e){
            Redirect::redirect("Houve um erro inesperado!!", type: 'error');
        }
    
    }
}

function listClient()
{
    try{
        session_start();
        $dao = new ClientDAO();
        $client = $dao->findAll();
        if($client){
            $_SESSION['list_of_client'] = $client;
            header('location:../View/list_of_client.php');
        }else{
            Redirect::redirect(message: ['Não existe cliente cadastrado!!!'], type: 'warning');
        }
    }catch(PDOException $e){
        Redirect::redirect("Houve um erro inesperado!!", type: 'error');
    }
}

function removeClient()
{
    if(empty($_GET['code'])){
        Redirect::redirect(message: 'O código do cliente não foi informado', type: 'error');
    }

    $code = (float) $_GET['code'];
    $error = array();

    if(!Validation::validatenumber($code)){
        array_unshift($error, 'Código do cliente inválido!!!');
    }

    if($error){
        Redirect::redirect($error, type: 'warning');
    }else{
        try{
            $dao = new ClientDAO();
            $result = $dao->delete($code);
            if($result){
                Redirect::redirect(message: "Cliente foi removido com sucesso!!!");
            }else{
                Redirect::redirect(message: ['Não foi possível remover o cliente'], type: 'warning');
            }
        }catch(PDOException $e){
            Redirect::redirect("Houve um erro inesperado!!", type: 'error');
        }
    }
}

function findClient()
{
    if(empty($_GET['code'])){
        Redirect::redirect(message: 'O código do cliente não foi informado', type: 'error');
    }
    $code = $_GET['code'];
    $dao = new ClientDAO();
    try{
        $result = $dao->findOne($code);
    }catch (PDOException $e){
        Redirect::redirect("Houve um erro inesperado!!", type: 'error');
    }
    if($result){
        session_start();
        $_SESSION['client_info'] = $result;
        header("location:../View/form_edit_client.php");
    }else{
        Redirect::redirect("Não encontramos o cliente na base de dados", type: 'error');
    }
}

function editClient()
{
    if(empty($_POST)){
        Redirect::redirect(message: 'Requisição inválida!!!', type: 'error');
    }

    $code = $_POST['code'];
    $name = $_POST["name"];
    $cpf = str_repeat(".","-", $_POST['cpf']);
    $birthDate = $_POST["birthDate"];
    $email = $_POST["email"];
    $login = $_POST["login"];
    $password = $_POST["password"];
    $clientPublicPlace = $_POST["publicPlace"];
    $clientStreetName = $_POST['streetName'];
    $clientnumberOfStreet = $_POST["numberOfStreet"];
    $clientComplement = $_POST["complement"];
    $clientNeighborhood = $_POST["neighborhood"];
    $clientCity = $_POST["city"];
    $clientZipCode = $_POST["zipCode"];

    $error = array();

    $client = new Client(
        name: $name,
        cpf: $cpf,
        birthDate: $birthDate,
        email: $email,
        login: $login,
        password: $password,
        address: new Address(
            publicPlace: $clientPublicPlace,
            streetName: $clientStreetName,
            neighborhood: $clientNeighborhood,
            complement: $clientComplement,
            numberOfStreet: $clientnumberOfStreet,
            zipCode: $clientZipCode,
            city: $clientCity
        ),
        id: $code
    );
    $dao = new ClientDAO();
    try{
        $result = $dao->update($client);
    }catch (PDOException $e){
        Redirect::redirect("Houve um erro inesperado!!", type: 'error');
    }
    if($result){
        Redirect::redirect(message: 'Cliente atualizado com sucesso!!!');
    }else{
        Redirect::redirect(message: ['Não foi possível atualizar os dados do cliente!!!']);
    }

}
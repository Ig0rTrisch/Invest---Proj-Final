<?php

namespace APP\Controller;

use APP\Model\Address;
use APP\Model\DAO\EmployeeDAO;
use APP\Model\Employee;
use APP\Model\DAO\AddressDAO;
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
        insertEmployee();
        break;
    case 'list':
        listEmployee();
        break;
    case 'remove':
        removeEmployee();
        break;
    case 'find':
        findEmployee();
        break;
    case 'edit':
        editEmployee();
        break;
    default:
        Redirect::redirect(message: 'A operação informada é inválida!!!', type:'error');
}

function insertEmployee()
{
    if(empty($_POST)){
        session_start();
        Redirect::redirect(message: 'Requisição inválida!!!', type:'error');
    }

    $name = $_POST["name"];
    $cpf = str_repeat(".","-", $_POST['cpf']);
    $birthDate = $_POST["birthDate"];
    $email = $_POST["email"];
    $registration = $_POST["registration"];
    $password = $_POST["password"];
    $employeePublicPlace = $_POST["publicPlace"];
    $employeeStreetName = $_POST['streetName'];
    $employeenumberOfStreet = $_POST["numberOfStreet"];
    $employeeComplement = $_POST["complement"];
    $employeeNeighborhood = $_POST["neighborhood"];
    $employeeCity = $_POST["city"];
    $employeeZipCode = $_POST["zipCode"];

    $error = array();

    if(Validation::validateString($name)){
        array_unshift($error, "O nome do funcionário deve ter mais de 3 Caractéres");
    }
    if(Validation::validatenumber($registration)){
        array_unshift($error, "O número da matrícula deve ser maior que zero!!!!");
    }

    if($error){
        Redirect::redirect(message: $error, type:'warning');
    }else{
        $employee = new Employee(
            name: $name,
            cpf: $cpf,
            birthDate: $birthDate,
            email: $email,
            registration: $registration,
            password: $password,
            address: new Address(
                publicPlace: $employeePublicPlace,
                streetName: $employeeStreetName,
                neighborhood: $employeeNeighborhood,
                complement: $employeeComplement,
                numberOfStreet: $employeenumberOfStreet,
                zipCode: $employeeZipCode,
                city: $employeeCity
            )
        );
        try {
            $dao = new AddressDAO();
            $result = $dao->insert($employee->address);
            if($result){
                $data = $dao->findId();
                $employee->address->id = $data["id"];
                $dao = new EmployeeDAO();
                $result = $dao->insert($employee);
                if($result){
                    Redirect::redirect(message: "O funcionário $name foi cadastrado com sucesso!!!");
                }else{
                    Redirect::redirect(message: "Lamento, não foi possível cadastrar o funcionário $employee", type: 'error');
                }
            }
        }catch(PDOException $e){
            Redirect::redirect("Houve um erro inesperado!!", type: 'error');
        }
    
    }
}

function listEmployee()
{
    try{
        session_start();
        $dao = new EmployeeDAO();
        $employee = $dao->findAll();
        if($employee){
            $_SESSION['list_of_employee'] = $employee;
            header('location:../View/list_of_employee.php');
        }else{
            Redirect::redirect(message: ['Não existe funcionário cadastrado!!!'], type: 'warning');
        }
    }catch(PDOException $e){
        Redirect::redirect("Houve um erro inesperado!!", type: 'error');
    }
}

function removeEmployee()
{
    if(empty($_GET['code'])){
        Redirect::redirect(message: 'O código do funcionário não foi informado', type: 'error');
    }

    $code = (float) $_GET['code'];
    $error = array();

    if(!Validation::validatenumber($code)){
        array_unshift($error, 'Código do funcionário inválido!!!');
    }

    if($error){
        Redirect::redirect($error, type: 'warning');
    }else{
        try{
            $dao = new EmployeeDAO();
            $result = $dao->delete($code);
            if($result){
                Redirect::redirect(message: "Funcionário foi removido com sucesso!!!");
            }else{
                Redirect::redirect(message: ['Não foi possível remover o funcionário'], type: 'warning');
            }
        }catch(PDOException $e){
            Redirect::redirect("Houve um erro inesperado!!", type: 'error');
        }
    }
}

function findEmployee()
{
    if(empty($_GET['code'])){
        Redirect::redirect(message: 'O código do funcionário não foi informado', type: 'error');
    }
    $code = $_GET['code'];
    $dao = new EmployeeDAO();
    try{
        $result = $dao->findOne($code);
    }catch (PDOException $e){
        Redirect::redirect("Houve um erro inesperado!!", type: 'error');
    }
    if($result){
        session_start();
        $_SESSION['employee_info'] = $result;
        header("location:../View/form_edit_employee.php");
    }else{
        Redirect::redirect("Não encontramos o funcionário na base de dados", type: 'error');
    }
}

function editEmployee()
{
    if(empty($_POST)){
        Redirect::redirect(message: 'Requisição inválida!!!', type: 'error');
    }

    $code = $_POST['code'];
    $name = $_POST["name"];
    $cpf = str_repeat(".","-", $_POST['cpf']);
    $birthDate = $_POST["birthDate"];
    $email = $_POST["email"];
    $registration = $_POST["registration"];
    $password = $_POST["password"];
    $employeePublicPlace = $_POST["publicPlace"];
    $employeeStreetName = $_POST['streetName'];
    $employeenumberOfStreet = $_POST["numberOfStreet"];
    $employeeComplement = $_POST["complement"];
    $employeeNeighborhood = $_POST["neighborhood"];
    $employeeCity = $_POST["city"];
    $employeeZipCode = $_POST["zipCode"];

    $error = array();

    $employee = new Employee(
        name: $name,
        cpf: $cpf,
        birthDate: $birthDate,
        email: $email,
        registration: $registration,
        password: $password,
        address: new Address(
            publicPlace: $employeePublicPlace,
            streetName: $employeeStreetName,
            neighborhood: $employeeNeighborhood,
            complement: $employeeComplement,
            numberOfStreet: $employeenumberOfStreet,
            zipCode: $employeeZipCode,
            city: $employeeCity
        ),
        id: $code
    );
    $dao = new EmployeeDAO();
    try{
        $result = $dao->update($employee);
    }catch (PDOException $e){
        Redirect::redirect("Houve um erro inesperado!!", type: 'error');
    }
    if($result){
        Redirect::redirect(message: 'Funcionário atualizado com sucesso!!!');
    }else{
        Redirect::redirect(message: ['Não foi possível atualizar os dados do funcionário!!!']);
    }

}
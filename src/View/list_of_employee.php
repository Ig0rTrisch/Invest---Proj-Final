<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Funcionários</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleSheet.css">
</head>

<body style="height: 650px; display:flex; flex-direction: column; justify-content: space-between;">
    <nav class="bg-blue-400">
        <ul>
            <li class="inline">
                <a href="dashboard.php">Home</a>
            </li>
            <li class="inline">
                <a href="form_add_employee.php">Novo Funcionário</a>
            </li>
            <li class="inline">
                <a href="../Controller/Employee.php?operation=listEmployee">Listar Funcionários</a>
            </li>
            <li class="inline">
                <a href="../Controller/User.php?operation=logout">Sair</a>
            </li>
        </ul>
    </nav>
    <h1 class="my-5 text-3xl font-bold text-center text-blue-800">Lista de funcionários cadastrados</h1>
    <table class="m-auto">
        <head class="text-white bg-blue-400">
            <th>#</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Data de nascimento</th>
            <th>E-mail</th>
            <th>Matricula</th>
        </head>
        <body>
            <?php
            session_start();
            foreach ($_SESSION['list_of_employee'] as $employee) :
            ?>
                <tr>
                    <td>
                        <?= $employee['idEmployee'] ?>
                    </td>
                    <td>
                        <?= $employee['name'] ?>
                    </td>
                    <td>
                        <?= $employee['cpf'] ?>
                    </td>
                    <td>
                        <?= $employee['birthDate'] ?>
                    </td>
                    <td>
                        <?= $employee['email'] ?>
                    </td>
                    <td>
                        <?= $employee['registration_employee'] ?>
                    </td>
                    <td>
                        <a href="../Controller/Employee.php?operation=find&code=<?= $employee["idEmployee"] ?>">Editar</a>
                        <a href="../Controller/Employee.php?operation=removeEmployee&code=<?= $employee["idEmployee"] ?>">Remover</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </body>
    </table>
</body>

</html>
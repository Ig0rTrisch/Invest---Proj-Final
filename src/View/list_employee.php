<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Funcionários</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="height: 650px; display:flex; flex-direction: column; justify-content: space-between;">
    <nav class="bg-blue-400">
        <ul>
            <li class="inline">
                <a href="dashboard.php">Home/</a>
            </li>
            <li class="inline">
                <a href="form_add_client.php">Novo Cliente/</a>
            </li>
            <li class="inline">
                <a href="form_add_sector.php">Novo Setor/</a>
            </li>
            <li class="inline">
                <a href="form_add_account.php">Nova Conta/</a>
            </li>
            <li class="inline">
                <a href="form_add_employee.php">Novo Funcionário/</a>
            </li>
            <li class="inline">
                <a href="../Controller/Client.php?operation=list">Listar Clientes/</a>
            </li>
            <li class="inline">
                <a href="../Controller/Employee.php?operation=list">Listar Funcionários</a>
            </li>
        </ul>
    </nav>
    <h1 class="my-4 text-3xl font-bold text-center text-blue-800">Lista de funcionários cadastrados</h1>
    <table class="m-auto">
        <thead class="text-white bg-blue-400">
            <th>#</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>E-mail</th>
            <th>Matricula</th>
        </thead>
        <tbody>
            <?php
            session_start();
            foreach ($_SESSION['list_of_employee'] as $employee) :
            ?>
                <tr>
                    <td>
                        <?= $employee['employee_code'] ?>
                    </td>
                    <td>
                        <?= $employee['employee_name'] ?>
                    </td>
                    <td>
                        R$ <?= str_replace(".", ",", $employee['employee_price']) ?>
                    </td>
                    <td>
                        <?= $employee['employee_quantity'] ?>
                    </td>
                    <td>
                        <a href="../Controller/Employee.php?operation=find&code=<?= $employee["employee_code"] ?>">Editar</a>
                        <a href="../Controller/Employee.php?operation=remove&code=<?= $employee["employee_code"] ?>">Remover</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</body>

</html>
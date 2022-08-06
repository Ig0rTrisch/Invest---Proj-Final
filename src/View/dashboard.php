<?php require_once '../Controller/auth.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Invest+ - Home</title>
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
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
</body>

</html>
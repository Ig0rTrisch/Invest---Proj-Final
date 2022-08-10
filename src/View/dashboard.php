<?php require_once '../Controller/auth.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Invest+ - Home</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/styleSheet.css">
</head>

<body class="corpo">
  
  <h1>Seja Bem-Vindo!</h1>
  <h2>Escolha a opção desejada</h2>
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
</body>

</html>
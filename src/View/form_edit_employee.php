<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/styleSheet.css">
    <title>Editar Funcionário</title>
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
    <main class="flex items-center justify-center h-screen">
        <?php
        session_start();
        $employee = $_SESSION['employee_info'];
        ?>
        <form action="../Controller/Employee.php?operation=edit" method="POST">
            <fieldset class="flex flex-col p-4 m-5 w-400">
                <input type="hidden" name="idEmployee" value="<?= $employee['idEmployee']?>">
                <section>
                    <article>
                        <label for="name">Nome: </label>
                        <input type="text" id="name" name="name" placeholder="Nome" class="p-2 m-2 field"  value="<?= $employee['name']?>">
                    </article>
                    <article>
                        <label for="cpf">CPF: </label>
                        <input type="text" id="cpf" name="cpf" placeholder="cpf" class="p-2 m-2 field" value="<?= $employee['cpf']?>">
                    </article>
                    <article>
                        <label for="birthDate">Data de Nascimento: </label>
                        <input type="text" id="birthDate" name="birthDate" placeholder="Data de Nascimento" class="p-2 m-2 field"value="<?= $employee['birthDate']?>">
                    </article>
                    <article>
                        <label for="email">E-mail: </label>
                        <input type="text" id="email" name="email" placeholder="E-mail" class="p-2 m-2 field"value="<?= $employee['email']?>">
                    </article>
                    <article>
                        <label for="registration">Matricula: </label>
                        <input type="number" id="registration" name="registration" placeholder="Matricula" class="p-2 m-2 field"value="<?= $employee['registration_employee']?>">
                    </article>
                    <article>
                        <label for="password">Senha: </label>
                        <input type="password" id="password" name="password" placeholder="Senha" class="p-2 m-2 field" value="<?= $employee['password']?>">
                    </article>
                </section>
                <section class="grid grid-cols-2">
                    Endereço
                    <p></p>
                    <input type="hidden" name="idAddress" value="<?= $employee['idAddress']?>">
                    <article>
                        <label for="publicPlace">Logradouro: </label>
                        <input type="text" id="publicPlace" name="publicPlace" placeholder="Logradouro" class="p-2 m-2 field"value="<?= $employee['public_place']?>">
                    </article>
                    <article>
                        <label for="streetName">Rua: </label>
                        <input type="text" id="streetName" name="streetName" placeholder="Rua" class="p-2 m-2 field"value="<?= $employee['streetName']?>">
                    </article>
                    <article>
                        <label for="numberOfStreet">Número: </label>
                        <input type="text" id="numberOfStreet" name="numberOfStreet" placeholder="Número" class="p-2 m-2 field"value="<?= $employee['numberOfStreet']?>">
                    </article>
                    <article>
                        <label for="complement">Complemento: </label>
                        <input type="text" id="complement" name="complement" placeholder="Complemento" class="p-2 m-2 field"value="<?= $employee['complement']?>">
                    </article>
                    <article>
                        <label for="neighborhood">Bairro: </label>
                        <input type="text" id="neighborhood" name="neighborhood" placeholder="Bairro" class="p-2 m-2 field"value="<?= $employee['neighborhood']?>">
                    </article>
                    <article>
                        <label for="city">Cidade: </label>
                        <input type="text" id="city" name="city" placeholder="Cidade" class="p-2 m-2 field"value="<?= $employee['city']?>">
                    </article>
                    <article>
                        <label for="zipCode">CEP: </label>
                        <input type="text" id="zipCode" name="zipCode" placeholder="CEP" class="p-2 m-2 field"value="<?= $employee['zipCode']?>">
                    </article>
                </section>
                <button type="submit" class="px-4 py-2 font-bold text-white bg-purple-500 rounded shadow hover:bg-purple-400 focus:shadow-outline focus:outline-none">Atualizar</button>
            </fieldset>
        </form>
    </main>
</body>

</html>
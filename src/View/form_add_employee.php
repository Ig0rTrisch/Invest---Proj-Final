<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadatrar Funcionário</title>
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
                <a href="#">Novo Funcionário/</a>
            </li>
            <li class="inline">
                <a href="../Controller/Client.php?operation=list">Listar Clientes/</a>
            </li>
            <li class="inline">
                <a href="../Controller/Employee.php?operation=listEmployee">Listar Funcionários</a>
            </li>
        </ul>
    </nav>
    <main class="flex items-center justify-center h-screen">
        <form action="../Controller/Employee.php?operation=insert" method="POST">
            <fieldset class="flex flex-col p-4 m-5 border border-purple-400 w-400">
                <section>
                    <article>
                        <input type="text" id="name" name="name" placeholder="Nome" class="p-2 m-2 field">
                    </article>
                    <article>
                        <input type="text" id="cpf" name="cpf" placeholder="cpf" class="p-2 m-2 field">
                    </article>
                    <article>
                        <input type="text" id="birthDate" name="birthDate" placeholder="Data de Nascimento" class="p-2 m-2 field">
                    </article>
                    <article>
                        <input type="text" id="email" name="email" placeholder="E-mail" class="p-2 m-2 field">
                    </article>
                    <article>
                        <input type="number" id="registration" name="registration" placeholder="Matricula" class="p-2 m-2 field">
                    </article>
                    <article>
                        <input type="password" id="password" name="password" placeholder="Senha" class="p-2 m-2 field">
                    </article>
                </section>
                <section class="grid grid-cols-2">
                    Endereço
                    <p></p>
                    <article>
                        <input type="text" id="publicPlace" name="publicPlace" placeholder="Logradouro" class="p-2 m-2 field">
                    </article>
                    <article>
                        <input type="text" id="streetName" name="streetName" placeholder="Rua" class="p-2 m-2 field">
                    </article>
                    <article>
                        <input type="text" id="numberOfStreet" name="numberOfStreet" placeholder="Número" class="p-2 m-2 field">
                    </article>
                    <article>
                        <input type="text" id="complement" name="complement" placeholder="Complemento" class="p-2 m-2 field">
                    </article>
                    <article>
                        <input type="text" id="neighborhood" name="neighborhood" placeholder="Bairro" class="p-2 m-2 field">
                    </article>
                    <article>
                        <input type="text" id="city" name="city" placeholder="Cidade" class="p-2 m-2 field">
                    </article>
                    <article>
                        <input type="text" id="zipCode" name="zipCode" placeholder="CEP" class="p-2 m-2 field">
                    </article>
                </section>
                <button type="submit" class="px-4 py-2 font-bold text-white bg-purple-500 rounded shadow hover:bg-purple-400 focus:shadow-outline focus:outline-none">Cadastrar</button>
            </fieldset>
        </form>
    </main>
</body>

</html>
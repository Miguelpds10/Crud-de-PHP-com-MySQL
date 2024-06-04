<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="crud.css">
    <title>Excluir Registros</title>
</head>
<body>
   <h1 class="título">Excluir Registros</h1>
   <form action = "delet.php" method="post">
    <label for ="text">Escolha o Código Desejado:</label>
    <br/>
    <input type="text" id="txtCod"  name = "txtCod" placeholder="Código desejado" required/>
    <br/>
    <div class="botões">
    <br/>
    <input type="submit" value="Excluir"/>
    <input type="reset" value="Limpar" onClick="document.getElementById('txtNome').focus();"/>
    <input type="button" value="Menu" onClick="location.href= 'index.html'"/>
    </div>
 </form>
 <?php
    echo "<link rel='stylesheet' type='text/css' href='crud.css'/>";
    include 'conexao.php';
    $lista=$cmd->query("select * from tbcrud");
    $total_registros =$lista->rowCount();
    if ($total_registros > 0)
    {
    echo "<table>";
    echo "<tr> <th colspan=6> Dados Cadastrados </th> </tr>";
    echo "<tr> 
            <th> Código </th>
            <th> Nome </th>
            <th> Email </th>
            <th> Senha </th>
            <th> Sexo </th>
            <th> Nascimento </th>
         </tr>";
            
    while($linha=$lista->fetch(PDO::FETCH_ASSOC))
    {
        $codigo=$linha['codi_cr'];
        $nome=$linha['nome_cr'];
        $email=$linha['email_cr'];
        $senha=$linha['senha_cr'];
        $sexo=$linha['sexo_cr'];
        $datnasc=$linha['dtna_cr'];
        echo "<tr>
                <td>$codigo</td>
                <td>$nome</td>
                <td>$email</td>
                <td>$senha</td>
                <td>$sexo</td>
                <td>$datnasc</td>
              </tr>";
        }
        echo "</table>";
    }
    ?>     
</body>
</html>
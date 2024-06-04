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
        echo "<br/><br/>";
        echo "<button onClick='window.history.back();'>Voltar</button>";
       }
    else{
      echo "<script language=javascript> window.alert('Não existem registros para exibir!!!'); window.history.back(); </script>";
    }
?>
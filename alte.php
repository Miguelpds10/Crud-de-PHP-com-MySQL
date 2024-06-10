<!doctype HTML>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Alterar Registros</title>
        <link rel="stylesheet" href="crud.css">
	    <script language="JavaScript">
		function Saindo()
		{
			location.href="index.html";
		}
		</script>
	 </head>
    <body>
        <form id="form1" method="post" action="alte.php">             
        <?php  
            echo "<h3>Alteração de Registros</h3>";

        	echo "<label for='txtcodi'>Código do registro a ser alterado:</label>";                 
            echo "<input type='text' name='txtcodi' id='txtcodi'/><br/>";
            
            echo "<label for='txtnome'>Nome:</label>";                 
            echo "<input type='text' name='txtnome' id='txtnome'/><br/>";
            
            echo "<label for='txtemai'>email:</label>";
            echo "<input type='email' name='txtemai' id='txtemai'/><br/>";
            
            echo "<label for='txtsenh'>Senha:</label>";                 
            echo "<input type='password' name='txtsenh' id='txtsenh'/><br/>";
                
            echo "<label for='txtsexo'>Sexo:</label>";                
            echo "<input type='radio' value='f' name='txtsexo' id='txtsexof' checked/>Feminino
			      <input type='radio' value='m' name='txtsexo' id='txtsexom'/>Masculino
                  <br/>";
            
            echo "<label for='txtdtna'>Informe sua data de nascimento:</label>";
            echo "<input type='date' id='txtdtna' name='txtdtna'/> <br/><br/>";
            
            echo "<div class='botoes'>
                    <input type='submit' name='bt' id='bt' value='Escolher'/>; 
                    <input type='button' value='Menu' onClick='Saindo()'/>
                  </div>";

            //estabelecendo a conexão com banco de dados 
            include 'conexao.php';
            $listar=$cmd->query("select * from tbcrud");
			$total_registros=$listar->rowCount();
            if ($total_registros > 0)
	        {
	            echo "<table>";
                echo "<tr><th colspan=6>Dados Cadastrados</th></tr>";
                echo "<tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>EMail</th>
                        <th>Senha</th>
                        <th>Sexo</th>
                        <th>Nascimento</th>
                     </tr>";
                while($linha=$listar->fetch(PDO::FETCH_ASSOC))
                {
                    $vcodi=$linha['codi_cr'];
                    $vnome=$linha['nome_cr'];
                    $vemai=$linha['email_cr'];
        			$vsenh=$linha['senha_cr'];
					$vsexo=$linha['sexo_cr'];
                    $vdtna=$linha['dtna_cr'];
                    echo "<tr>
                            <td>$vcodi</td>
                            <td>$vnome</td>
                            <td>$vemai</td>
                            <td>$vsenh</td>
                            <td>$vsexo</td>
                            <td>$vdtna</td>
                         </tr>";
				}
				echo "</table>";
			}
        else
            {
                echo "<script language=javascript> window.alert('Não existem registros para alterar!!!'); location.href='index.html'</script>";
            }
                
        //recebendo os valores preenchidos nos campos do formulário nas variáveis do PHP
        if (isset($_POST['bt']))
        {
            $vcodi=$_POST['txtcodi']; 
            $vbt=$_POST['bt'];            
            
            if ($vbt=='Escolher')
            { 
                //verificando se o código escolhido EXISTE                 
                $pesq=$cmd-> query("select * from tbcrud where codi_cr='$vcodi'");
                $total_registros=$pesq->rowCount();
                if ($total_registros > 0) //achou o código escolhido, vamos devolver os dados para a tela
                {
                    while($linha=$pesq->fetch(PDO::FETCH_ASSOC))
                    {
                        $vcodi=$linha['codi_cr'];
                        $vnome=$linha['nome_cr'];
                        $vemai=$linha['email_cr'];
        			    $vsenh=$linha['senha_cr'];
					    $vsexo=$linha['sexo_cr'];
                        $vdtna=$linha['dtna_cr'];
		                echo "<script language=javascript>
                                document.getElementById('txtcodi').value='$vcodi';
         	                    document.getElementById('txtnome').value='$vnome';
                                document.getElementById('txtemai').value='$vemai';
                                document.getElementById('txtsenh').value='$vsenh';
                                if ('$vsexo' == 'f')
    		                        document.getElementById('txtsexof').checked=true;
                                else
    		                        document.getElementById('txtsexom').checked=true;
                                document.getElementById('txtdtna').value='$vdtna';
                                document.getElementById('bt').value='Alterar';
                                document.getElementById('txtcodi').readOnly=true;
                             </script>";
				    }
                }
			    else
			    {
                    echo "<script language=javascript> window.alert('Código inexistente!!!'); location.href='alte.php'; </script>";
                }
            }
            else if ($vbt=='Alterar')
            { 
                $vcodi=$linha['codi_cr'];
                $vnome=$linha['nome_cr'];
                $vemai=$linha['email_cr'];
        		$vsenh=$linha['senha_cr'];
				$vsexo=$linha['sexo_cr'];
                $vdtna=$linha['dtna_cr'];
                //atualizando o registro com os novos valores 
                $alter=$cmd-> query("update tbcrud set nome_cr='$vnome', email_cr='$vemai', senha_cr='$vsenh', sexo_cr='$vsexo', dtna_cr='$vdtna' where codi_cr='$vcodi'");
		        echo "<script language=javascript>
                    window.alert('Registro alterado com sucesso!!!'); 
                    document.getElementById('bt').value='Escolher';
                    document.getElementById('txtcodi').readOnly=false;
                    </script>";
                echo "<meta http-equiv='refresh' content='0'/>"; 
		    }
        }               		
 	    ?>
	    </form>
	</body>
</html>
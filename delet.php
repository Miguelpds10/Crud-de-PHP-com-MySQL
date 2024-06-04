<?php
    echo "<link rel='stylesheet' type='text/css' href='crud.css'/>";
        // conexão com o database
        include 'conexao.php';
        $codigo=$_POST['txtCod'];
        $pesq=$cmd->query("select * from tbcrud where codi_cr ='$codigo'");
        $total_registros =$pesq->rowCount();
        if ($total_registros > 0)
    {
     // O Usuário vai apagar pelo Código das Pessoas Cadastradas
        $excluir =$cmd->query("delete  from tbcrud where codi_cr ='$codigo'");
        echo "<script language = javascript>
            window.alert('Registro excluído com Sucesso!');
            location.href='dele.php';
             </script>";
    }
    else
    {
        // Se o Usuário colocar o Código Incorreto
        echo "<script language = javascript>
            window.alert('Não Existe esse Código!');
            location.href='dele.php';
            </script>";
    }
    ?>
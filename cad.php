<?php
include 'conexao.php';
$nome= $_POST['txtNome'];
$email= $_POST['txtEmail'];
$senha = $_POST['txtSenha'];
$sexo = $_POST['txtSexo'];
$datnasc = $_POST['txtDtna'];
$incluir = $cmd->query("insert into tbcrud(nome_cr, email_cr, senha_cr, sexo_cr, dtna_cr) values('$nome', '$email', '$senha', '$sexo', '$datnasc')");

echo "<script language = 'JavaScript'>
alert('Dados cadastrados com sucesso!');
location.href = 'cad.html';
</script>";
?>
<?php
    require 'conexao.php';

    $id = $_REQUEST['id'];
	$conexao = conexao::getInstance();
    $sql = "delete from dados_curriculum where id= :id";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id', $id);  
    $stm->execute();
	


header('location: mostra_dados.php');
?>
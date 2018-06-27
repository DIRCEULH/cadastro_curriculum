<?php 
session_start();
require 'conexao.php';

$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):

	$conexao = conexao::getInstance();
	$sql = 'SELECT DISTINCT id, image, nome, sexo, email,data_nasc,contato,nivel,image,arquivo FROM dados_curriculum where id limit 15';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

else:
	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, image, nome, sexo, email,data_nasc,contato,nivel,image,arquivo FROM dados_curriculum WHERE nome LIKE :nome ';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $termo.'%');

	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);
endif;
?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="UTF-8">
<title>Dados</title>
<link rel="stylesheet" type="text/css" href="css/custom.css">

</head>

<body>
<nav id="menu">
    <ul>
        <li><a href="index.php">Cadastro de Curriculo</a></li>
        <li><a href="mostra_dados.php">Verificar Candidatos</a></li>
        <li><a href="#">Menu-3</a></li>
        <li><a href="#">Menu-4</a></li>
        <li><a href="#">Menu-5</a></li>
    </ul>
</nav>
<form id ="pesquisa" action="" method="get"  >
				     <h2>Pesquisar</h2>
				<div >
			    	<input type="text"  id="termo" name="termo" placeholder="Infome o Nome ">
				</div>
			    <button type="submit" class="pesq" >Pesquisar</button>
				<a href="index.php" ><button type="button" class="pesq">Voltar</button></a>
</form>


<table id ="table">
		<tr >
						<th>Foto</th>
						<th>Nome</th>
						<th>Sexo</th>
						<th>Email</th>
						<th>Data Nascimento</th>
                        <th>Contato</th>
						<th>Formação Nível</th>
						<th>Baixar Curriculum</th>

						<th>Mostrar Dados do Currículo</th>
						<th>Excluir Candidato</th>
		</tr>
<?php foreach($dados as $dado){ 
$path = "Documentos/";
?>

		<tr>
		    <td><img src='fotos/<?=$dado->image?>' height='60' width='80'></td>
			<td><?=$dado->nome?></td>
			<td><?=$dado->sexo?></td>
			<td><?=$dado->email?></td>
			<td><?=$dado->data_nasc?></td>
			<td><?=$dado->contato?></td>
			<td><?=$dado->nivel?></td>
			<td><?php echo '</br><a   href="'.$path.$dado->arquivo . ' " title="Curriculum ' . $dado->arquivo. '" target="_blank"><button><font color="green" >' . $dado->arquivo . '</font></button></a>';?></td>
            
			<td><a  class="pesq" href="curriculo.php?id=<?=$dado->id ?>"><button type="button" class="ver">Ver Currículo</button></a></td>
			<td><a  class="pesq"  href="javascript:func()" onclick="confirmacao(<?=$dado->id ?>)" ><button type="button" class="excluir">Excluir</button></a></td>

		</tr>
<?php }	?>		
</table>
 

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/function.js"></script>
 
</body>

</html>
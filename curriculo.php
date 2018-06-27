<?php
error_reporting(E_ALL);
ini_set('display_errors','on');
require 'conexao.php';

if ( !empty( $_GET['id'])){
	$conexao = conexao::getInstance();
	$id= filter_var($_GET['id'],FILTER_VALIDATE_INT);
	$sql = 'SELECT *FROM dados_curriculum WHERE id=?';
	$alteracao = $conexao->prepare($sql);
	$alteracao->execute(array($id));
	$dado = $alteracao->fetch(PDO:: FETCH_ASSOC);
    //print_r($dado);
}else{
	header('location;listagem.php');
}

?>
<html>
	<head>
		<title>Curriculo Vitae</title>
		<link rel="stylesheet" type="text/css" href="css/style_curriculo.css">
		
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
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
		<h1>Curriculo Vitae</h1>
		
		<ul id="menu">
			
	
		</ul>
		
		<div class="secao">
			<h2>Dados Básicos</h2>			
				<div id="hcard-Ademir-Mazer-Jr" class="vcard"></br>
				  <img src='fotos/<?=$dado->image?>' height='60' width='80'></br>
				  <font class="font" >Nome: </font><span class="given-name"><?php echo $dado['nome']; ?></span></br>
				  <font class="font" >Sexo: </font><span class="additional-name"><?php echo $dado['sexo']; ?></span></br>
				  <font class="font" >Email: </font><span class="family-name"><?php echo $dado['email']; ?></span></br>
				  <font class="font" >Data Nascimento: </font><span class="given-name"><?php echo $dado['data_nasc']; ?></span></br>
				  <font class="font">Contato: </font><span class="additional-name"><?php echo $dado['contato']; ?></span></br>
				  <font class="font" >Cpf: </font><span class="given-name"><?php echo $dado['cpf']; ?></span></br>
				  <font class="font">Estado Civíl: </font><span class="additional-name"><?php echo $dado['civil']; ?></span></br>
				  <font class="font">Cep: </font><span class="family-name"><?php echo $dado['cep']; ?></span></br>
				  <font class="font" >Logradouro: </font><span class="given-name"><?php echo $dado['logradouro']; ?></span></br>
				  <font class="font">Número: </font><span class="additional-name"><?php echo $dado['numero']; ?></span></br>
				  <font class="font" >Complemento: </font><span class="family-name"><?php echo $dado['complemento']; ?></span></br>
				  <font class="font">Bairro: </font><span class="given-name"><?php echo $dado['bairro']; ?></span></br>
				  <font class="font">Cidade: </font><span class="additional-name"><?php echo $dado['cidade']; ?></span></br>				  
				  <font class="font" >Estado: </font><span class="given-name"><?php echo $dado['uf']; ?></span></br>
				  <font class="font">Curriculo Anexado: </font><span class="additional-name"><?php echo $dado['arquivo']; ?></span></br>	

				

				</div>
		</div>

		<div class="secao">
			<h2>Formação Acadêmica</h2>
			
				<div id="hcard-Ademir-Mazer-Jr" class="vcard"></br>

				  <font class="font" >Nível Profissional: </font><span class="given-name"><?php echo $dado['nivel']; ?></span></br>
				  <font class="font" >Curso: </font><span class="additional-name"><?php echo $dado['curso']; ?></span></br>
				  <font class="font" >Situação: </font><span class="family-name"><?php echo $dado['situacao']; ?></span></br>
				  <font class="font" > Ano de Conclusão: </font><span class="given-name"><?php echo $dado['ano_conclu']; ?></span></br>
				
				  

				

				</div>
		</div>

		<div class="secao">
			<h2>Experiência Profissional</h2>
			
			<p><label class="font">Ùltima Empresa</label><?php echo $dado['empresa_ultima']; ?></p>
			<p><label class="font">Cargo</label><?php echo $dado['cargo_ultima']; ?></p>
			<p><label class="font">Local de Trabalho</label><?php echo $dado['local_ultima']; ?></p>
						
			<p><label class="font">Data Entrada</label><?php echo $dado['data_entrada_ultima']; ?></p>
			<p><label class="font">Data Saída</label><?php echo $dado['data_saida_ultima']; ?></p>
			<p><label class="font">Atividades desenvolvidas</label><?php echo $dado['atividades_ultima']; ?></p>
	
              <p><label>__________________________________</label></p>
			
			<p><label class="font">Ùltima Empresa</label><?php echo $dado['empresa_anterior']; ?></p>
			<p><label class="font">Cargo</label><?php echo $dado['cargo_anterior']; ?></p>
			<p><label class="font">Local de Trabalho</label><?php echo $dado['local_anterior']; ?></p>
						
			<p><label class="font">Data Entrada</label><?php echo $dado['data_entrada_anterior']; ?></p>
			<p><label class="font">Data Saída</label><?php echo $dado['data_saida_anterior']; ?></p>
			<p><label class="font">Atividades desenvolvidas</label><?php echo $dado['atividades_anterior']; ?></p>

			</div>
			

	
	</body>
</html>
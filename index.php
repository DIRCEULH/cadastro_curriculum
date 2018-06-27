<?php session_start()?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="UTF-8">
<title>Cadastro Curriculum</title>
<link rel="stylesheet" type="text/css" href="css/custom.css">
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/function.js"></script>
</head>
<script>
//BUSCAR CEP VIA JAVA SCRIPT

	$(document).ready(function () {
 

 
 
	     // Método para consultar o CEP
		$('#cep').on('blur', function(){
 
			if($.trim($("#cep").val()) != ""){
 
				$("#mensagem").html('(Aguarde, consultando CEP ...)');
				$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){
 
			  		if(resultadoCEP["resultado"]){
						$("#rua").val(unescape(resultadoCEP["tipo_logradouro"])+" "+unescape(resultadoCEP["logradouro"]));
						$("#bairro").val(unescape(resultadoCEP["bairro"]));
						$("#cidade").val(unescape(resultadoCEP["cidade"]));
						$("#uf").val(unescape(resultadoCEP["uf"]));
					}
 
					$("#mensagem").html('');
				});				
			}			
		});
	});
	
</script>
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

<form id="formulario" action="enviar.php" method="POST" enctype='multipart/form-data'>
  <ul id="progress">
     <li class="ativo">Dados Básicos</li>
     <li>Formação Acadêmica</li>
	 <li>Experiência</li>
     <li>Detalhes Pessoais</li>
    
  </ul>
  <fieldset>
     <h2>Dados Básicos</h2>
     
	 <h1><b>Foto</b></h1><input type="file" name="image" value="<?php echo $_SESSION['image'] = !empty($_SESSION['image']) ? $_SESSION['image'] : '' ?>"/>
	 <h1><b>Nome</b></h1><input type="text" name="nome" value="<?php echo $_SESSION['nome'] = !empty($_SESSION['nome']) ? $_SESSION['nome'] : '' ?>" />
     <h1><b>Sexo</b></h1><select name="sexo"  >
	  <option value ="<?php $_SESSION['sexo']; ?>" ><?php echo $_SESSION['sexo'] = !empty($_SESSION['sexo']) ? $_SESSION['sexo']: 'Selecione o sexo' ?></option>
     <option value ="Masculino">Masculino</option>
     <option value ="Feminino">Feminino</option>
     </select>
      <h1><b>Email</b></h1><input type="text" name="email" value="<?php echo $_SESSION['email'] = !empty($_SESSION['email']) ? $_SESSION['email'] : '' ?>" />
      <h1><b>Data Nascimento</b></h1><input type="text" name="data_nasc" onkeyup="mascaraData( this )"  value="<?php echo $_SESSION['data_nasc'] = !empty($_SESSION['data_nasc']) ? $_SESSION['data_nasc'] : '' ?>"/>
      <h1><b>Contato</b></h1><input type="text" name="contato"   onkeyup="mascaraTelefone( this )" value="<?php echo $_SESSION['contato'] = !empty($_SESSION['contato']) ? $_SESSION['contato'] : '' ?>"/>
     <input type="button" name="next" id="botao" class="next acao" value="Próximo"/>  
  </fieldset>
  <fieldset>

     <h2>Formação Acadêmica</h2>
	  <h1><b>Nível</b></h1><select name="nivel">
	 <option value ="<?php  $_SESSION['nivel']; ?>" ><?php echo $_SESSION['nivel'] = !empty($_SESSION['nivel']) ? $_SESSION['nivel']: 'Selecione o nível' ?></option>
     <option value ="Fundamental">Ensino Fundamental</option>
     <option value ="Médio">Ensino Médio</option>
	 <option value ="Superior">Ensino Superior</option>
     <option value ="Graduação">Pós Graduação</option>
     </select>
      <h1><b>Curso</b></h1><input type="text" name="curso" value="<?php echo $_SESSION['curso'] = !empty($_SESSION['curso']) ? $_SESSION['curso']: '' ?>" />
	  <h1><b>Situação</b></h1><select name="situacao" >
	 <option value ="<?php  $_SESSION['situacao'] ?>" ><?php echo $_SESSION['situacao'] = !empty($_SESSION['situacao']) ? $_SESSION['situacao']: 'Selecione a situacao' ?></option>
     <option value ="Andamento">Andamento</option>
     <option value ="Concluído">Concluído</option>
     </select>
	  <h1><b>Instituição</b></h1><input type="text" name="instituicao" value="<?php echo $_SESSION['instituicao'] = !empty($_SESSION['instituicao']) ? $_SESSION['instituicao'] : '' ?>"/>
     <h1><b>Ano Conclusão</b></h1><input type="text" name="ano_conclu" value="<?php echo $_SESSION['ano_conclu'] = !empty($_SESSION['ano_conclu']) ? $_SESSION['ano_conclu'] : '' ?>"/>
	 <input type="button" name="prev" class="prev acao" value="Anterior"/>  
	 <input type="button" name="next" class="next acao" value="Próximo"/> 
  </fieldset>
  <fieldset>
     <h2>Experiência</h2>
	 
	  <h1><b>Última Empresa</b></h1><input type="text" name="empresa_ultima" value="<?php echo $_SESSION['empresa_ultima'] = !empty($_SESSION['empresa_ultima']) ? $_SESSION['empresa_ultima'] : '' ?>" />
	  <h1><b>Cargo</b></h1><input type="text" name="cargo_ultima" value="<?php echo $_SESSION['cargo_ultima'] = !empty($_SESSION['cargo_ultima']) ? $_SESSION['cargo_ultima'] : '' ?>" />
	  <h1><b>Local de trabalho</b></h1><input type="text" name="local_ultima" value="<?php echo $_SESSION['local_ultima'] = !empty($_SESSION['local_ultima']) ? $_SESSION['local_ultima'] : '' ?>" />
	  <h1><b>Data Entrada</b></h1><input type="data" name="data_entrada_ultima" onkeyup="mascaraData( this )"  value="<?php echo $_SESSION['data_entrada_ultima'] = !empty($_SESSION['data_entrada_ultima']) ? $_SESSION['data_entrada_ultima'] : '' ?>" />
	  <h1><b>Data saída</b></h1><input type="text" name="data_saida_ultima" onkeyup="mascaraData( this )"   value="<?php echo $_SESSION['data_saida_ultima'] = !empty($_SESSION['data_saida_ultima']) ? $_SESSION['data_saida_ultima'] : '' ?>" />
	  <h1><b>Atividades Desenvolvidas</b></h1><textarea name ="atividades_ultima" value="<?php echo $_SESSION['atividades_ultima'] = !empty($_SESSION['atividades_ultima']) ? $_SESSION['atividades_ultima'] : 'Digite as atividaddes' ?>" rows="4" cols="50"></textarea>
	  <div><br></br><br></br></div>
	  
	  <h1><b> Empresa Anterior</b></h1><input type="text" name="empresa_anterior" value="<?php echo $_SESSION['empresa_anterior'] = !empty($_SESSION['empresa_anterior']) ? $_SESSION['empresa_anterior'] : '' ?>" />
	  <h1><b>Cargo</b></h1><input type="text" name="cargo_anterior" value="<?php echo $_SESSION['cargo_anterior'] = !empty($_SESSION['cargo_anterior']) ? $_SESSION['cargo_anterior'] : '' ?>" />
	  <h1><b>Local de trabalho</b></h1><input type="text" name="local_anterior" value="<?php echo $_SESSION['local_anterior'] = !empty($_SESSION['local_anterior']) ? $_SESSION['local_anterior'] : '' ?>" />
	  <h1><b>Data Entrada</b></h1><input type="data" name="data_entrada_anterior" onkeyup="mascaraData( this )"  value="<?php echo $_SESSION['data_entrada_anterior'] = !empty($_SESSION['data_entrada_anterior']) ? $_SESSION['data_entrada_anterior'] : '' ?>" />
	  <h1><b>Data saída</b></h1><input type="text" name="data_saida_anterior" onkeyup="mascaraData( this )"   value="<?php echo $_SESSION['data_saida_anterior'] = !empty($_SESSION['data_saida_anterior']) ? $_SESSION['data_saida_anterior'] : '' ?>" />
	 <h1><b>Atividades Desenvolvidas</b></h1><textarea name ="atividades_anterior" value="<?php echo $_SESSION['atividades_anterior'] = !empty($_SESSION['atividades_anterior']) ? $_SESSION['atividades_anterior'] : 'Digite as atividaddes' ?>" rows="4" cols="50"></textarea>
      
     <input type="button" name="prev" class="prev acao" value="Anterior"/>  
	 <input type="button" name="next" class="next acao" value="Próximo"/> 
  </fieldset>
    <fieldset>
     <h2>Detalhes Pessoais</h2>
    
      <h1><b>CPF</b></h1><input type="text" name="cpf" value="<?php echo $_SESSION['cpf'] = !empty($_SESSION['cpf']) ? $_SESSION['cpf'] : '' ?>" />
	  <h1><b>Estadeo Civíl</b></h1><select name="civil">
	 <option value ="<?php $_SESSION['civil'] ?>" ><?php echo $_SESSION['civil'] = !empty($_SESSION['civil']) ? $_SESSION['civil']: 'Selecione o estado civil' ?></option>
     <option value ="Casado">Casado</option>
     <option value ="Divorciado">Divorciado</option>
	 <option value ="Solteiro">Solteiro</option>
     <option value ="viúvo">viúvo</option>
	 <option value ="Separado">Separado</option>
	 <option value ="União estável">União estável</option>
     </select>
	  <h1><b> CEP</b></h1><input type="text" name="cep" id="cep"  value="<?php echo $_SESSION['cep'] = !empty($_SESSION['cep']) ? $_SESSION['cep'] : '' ?>" />
	  <h1><b> Logradouro</b></h1><input type="text" name="logradouro" id="rua"   value="<?php echo $_SESSION['logradouro'] = !empty($_SESSION['logradouro']) ? $_SESSION['logradouro'] : '' ?>" />
	   <h1><b> Numero</b></h1><input type="text" name="numero"  value="<?php echo $_SESSION['numero'] = !empty($_SESSION['numero']) ? $_SESSION['numero'] : '' ?>" />
	    <h1><b> Complemento</b></h1><input type="text" name="complemento" value="<?php echo $_SESSION['complemento'] = !empty($_SESSION['complemento']) ? $_SESSION['complemento'] : '' ?>" />
		 <h1><b> Bairro</b></h1><input type="text" name="bairro" id="bairro"  value="<?php echo $_SESSION['bairro'] = !empty($_SESSION['bairro']) ? $_SESSION['bairro'] : '' ?>" />
		  <h1><b> Cidade</b></h1><input type="text" name="cidade" id="cidade"  value="<?php echo $_SESSION['cidade'] = !empty($_SESSION['cidade']) ? $_SESSION['cidade'] : '' ?>" />
		   <h1><b> Estado</b></h1><input type="text" name="uf" id="uf"  value="<?php echo $_SESSION['uf'] = !empty($_SESSION['uf']) ? $_SESSION['uf'] : '' ?>" />
           <h1><b>Anexar seu Curriculo (PDF,DOCX)</b></h1><input type="file" name="arquivo" value="<?php echo $_SESSION['arquivo'] = !empty($_SESSION['arquivo']) ? $_SESSION['arquivo'] : '' ?>"/>
	 <input type="button" name="prev" class="prev acao" value="Anterior"/>  
	 <input type="submit" class="acao" name="enviar" value="Enviar"/> 
  </fieldset>

</form>



<?php
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusMsgClass = "<div id='mensagem'><font color='green'>Salvo com sucesso!!</font></div>" ;

            break;
        case 'err':
		
            $statusMsgClass = "<div id='mensagem'><font color='red'>Problemas na inserção!! Verifique os campos Obrigatórios.</font></div>" ;
			
            break;
	    case 'pdo':
		
            $statusMsgClass = "<div id='mensagem'><font color='red'>Problemas na inserção sql!!</font></div>" ;
			
            break;
	    case 'erroimage':
		
            $statusMsgClass = "<div id='mensagem'><font color='red'>Problemas na inserção da imagem, verificar tamanho e extensão!!</font></div>" ;
			
            break;
        default:
            $statusMsgClass = '';
          
    }
}

 if(!empty($statusMsgClass)){
        echo $statusMsgClass;
}

?> 
</body>

</html>
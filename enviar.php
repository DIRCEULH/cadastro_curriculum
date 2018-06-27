<?php
session_start();
require_once('conexao.php');
require_once('class/Upload.class.php');

if (isset($_POST['enviar'])) {
   //die(print_r($_FILES));
      //die(print_r($_POST));
   if (empty($_FILES['image']['name'] && $_FILES['arquivo']['name'] && $_POST['nome'] && $_POST['sexo'] && $_POST['email'] && $_POST['data_nasc'] && $_POST['contato'] && $_POST['nivel']
   && $_POST['curso'] && $_POST['situacao'] && $_POST['instituicao'] && $_POST['ano_conclu'] && $_POST['empresa_ultima'] && $_POST['cargo_ultima']
   && $_POST['local_ultima'] && $_POST['data_entrada_ultima'] &&$_POST['data_saida_ultima'] && $_POST['atividades_ultima']
   && $_POST['empresa_anterior'] && $_POST['cargo_anterior'] && $_POST['local_anterior']&& $_POST['data_entrada_anterior'] && $_POST['data_saida_anterior'] && $_POST['atividades_anterior']
   && $_POST['cpf'] && $_POST['civil'] && $_POST['cep'] && $_POST['logradouro'] && $_POST['numero'] && $_POST['complemento'] && $_POST['bairro'] && $_POST['cidade'] && $_POST['uf'])) {
	 //die(print_r($_FILES));
   $qstring = '?status=err';
   
   $_SESSION['image'] = $_FILES['image']['name'];
   $_SESSION['nome'] = $_POST['nome'];
   $_SESSION['sexo'] = $_POST['sexo'];
   $_SESSION['email'] = $_POST['email'];
   $_SESSION['data_nasc'] = $_POST['data_nasc'];
   $_SESSION['contato'] = $_POST['contato'];
   
   $_SESSION['nivel'] = $_POST['nivel'];
   $_SESSION['curso'] = $_POST['curso'];
   $_SESSION['situacao'] = $_POST['situacao'];
   $_SESSION['instituicao'] = $_POST['instituicao'];
   $_SESSION['ano_conclu'] = $_POST['ano_conclu'];
   
   $_SESSION['empresa_ultima'] = $_POST['empresa_ultima'];
   $_SESSION['cargo_ultima'] = $_POST['cargo_ultima'];
   $_SESSION['local_ultima'] = $_POST['local_ultima'];
   $_SESSION['data_entrada_ultima'] = $_POST['data_entrada_ultima'];
   $_SESSION['data_saida_ultima'] = $_POST['data_saida_ultima'];
   $_SESSION['atividades_ultima'] = $_POST['atividades_ultima'];
   
   $_SESSION['empresa_anterior'] = $_POST['empresa_anterior'];
   $_SESSION['cargo_anterior'] = $_POST['cargo_anterior'];
   $_SESSION['local_anterior'] = $_POST['local_anterior'];
   $_SESSION['data_entrada_anterior'] = $_POST['data_entrada_anterior'];
   $_SESSION['data_saida_anterior'] = $_POST['data_saida_anterior'];
   $_SESSION['atividades_anterior'] = $_POST['atividades_anterior'];
   
   $_SESSION['cpf'] = $_POST['cpf'];
   $_SESSION['civil'] = $_POST['civil'];
   $_SESSION['cep'] = $_POST['cep'];
   $_SESSION['logradouro'] = $_POST['logradouro'];
   $_SESSION['numero'] = $_POST['numero'];
   $_SESSION['complemento'] = $_POST['complemento'];
   $_SESSION['bairro'] = $_POST['bairro'];
   $_SESSION['cidade'] = $_POST['cidade'];
   $_SESSION['uf'] = $_POST['uf'];
    $_SESSION['arquivo'] = $_FILES['arquivo']['name'];

   
  } else {
	  
 

   $nome = $_POST['nome'];
   $sexo = $_POST['sexo'];
   $email = $_POST['email'];
   $data_nasc = $_POST['data_nasc'];
   $contato = $_POST['contato'];
   
   $nivel = $_POST['nivel'];
   $curso = $_POST['curso'];
   $situacao = $_POST['situacao'];
   $instituicao = $_POST['instituicao'];
   $ano_conclu = $_POST['ano_conclu']; 

   $empresa_ultima = $_POST['empresa_ultima'];
   $cargo_ultima= $_POST['cargo_ultima'];
   $local_ultima = $_POST['local_ultima'];
   $data_entrada_ultima = $_POST['data_entrada_ultima'];
   $data_saida_ultima = $_POST['data_saida_ultima'];
   $atividades_ultima = $_POST['atividades_ultima'];
   
   $empresa_anterior = $_POST['empresa_anterior'];
   $cargo_anterior = $_POST['cargo_anterior'];
   $local_anterior= $_POST['local_anterior'];
   $data_entrada_anterior = $_POST['data_entrada_anterior'];
   $data_saida_anterior = $_POST['data_saida_anterior'];
   $atividades_anterior = $_POST['atividades_anterior'];
   
   $cpf = $_POST['cpf'];
   $civil = $_POST['civil'];
   $cep = $_POST['cep'];
   $logradouro = $_POST['logradouro'];
   $numero = $_POST['numero'];
   $complemento= $_POST['complemento'];
   $bairro = $_POST['bairro'];
   $cidade = $_POST['cidade'];
   $uf = $_POST['uf'];
   
   $curriculum= $_FILES['arquivo']['name'];
   $arquivo= $_FILES['image'];
   $nomeFile = $_FILES['image']['name'];
   
   $upload = new Upload($arquivo, 5000, 2000, "fotos/",$nomeFile);
   $upload->salvar();
   
   
   require_once('class/Arquivo.class.php');
   
	// Arquivo
   $arquivo = $_FILES['arquivo'];

   // Diretorio do arquivo
   $diretorio = "Documentos/";

   // Nome do arquivo
   $nomeArquivo = ($_FILES['arquivo']['name']);

	// Formatos permitidos
   $formatosPermitidos = array('.pdf','.docx');
            
			
	// Tamanho Maximo - 1048576 bits -> 1024 kilobits -> 1 megabits
   $tamanhoMaximo = 1048576;
			
	// verificar quantidade de arquivos na pasta e restringir 
   $quantidade = glob("$diretorio{*pdf,*docx}", GLOB_BRACE);
			
   Arquivo::salvar($_FILES['arquivo'], $diretorio, $nomeArquivo, $formatosPermitidos, 1048576);
   
		
           


 
   if ($upload->salvar() == "Sucesso")  {	
   


   
   $sql = 'INSERT INTO dados_curriculum (nome,sexo, email, data_nasc, contato, nivel, curso,situacao,instituicao,ano_conclu,empresa_ultima,cargo_ultima,local_ultima,data_entrada_ultima,data_saida_ultima,atividades_ultima,
   empresa_anterior,cargo_anterior,local_anterior,data_entrada_anterior,data_saida_anterior,atividades_anterior,cpf,civil,cep,logradouro,numero,complemento,bairro,cidade,uf,image,arquivo)
   VALUES(:nome,:sexo,:email,:data_nasc,:contato,:nivel,:curso,:situacao,:instituicao,:ano_conclu,:empresa_ultima,:cargo_ultima,:local_ultima,:data_entrada_ultima,:data_saida_ultima,:atividades_ultima,
   :empresa_anterior,:cargo_anterior,:local_anterior,:data_entrada_anterior,:data_saida_anterior,:atividades_anterior,:cpf,:civil,:cep,:logradouro,:numero,:complemento,:bairro,:cidade,:uf,:image,:arquivo)';
   $conexao = conexao::getInstance();
   $stm = $conexao->prepare($sql);


   
   $stm->bindValue(':image', $nomeFile); 
   $stm->bindValue(':nome', $nome);
   $stm->bindValue(':sexo', $sexo);
   $stm->bindValue(':email', $email);
   $stm->bindValue(':data_nasc', $data_nasc);
   $stm->bindValue(':contato', $contato);
   
    $stm->bindValue(':nivel', $nivel);  
   $stm->bindValue(':curso', $curso);
   $stm->bindValue(':situacao', $situacao);
   $stm->bindValue(':instituicao', $instituicao);
   $stm->bindValue(':ano_conclu', $ano_conclu);
   
   $stm->bindValue(':empresa_ultima', $empresa_ultima);
   $stm->bindValue(':cargo_ultima', $cargo_ultima);
   $stm->bindValue(':local_ultima', $local_ultima);
   $stm->bindValue(':data_entrada_ultima', $data_entrada_ultima);
   $stm->bindValue(':data_saida_ultima', $data_saida_ultima);
   $stm->bindValue(':atividades_ultima', $atividades_ultima);
   
   $stm->bindValue(':empresa_anterior', $empresa_anterior);
   $stm->bindValue(':cargo_anterior', $cargo_anterior);
   $stm->bindValue(':local_anterior', $local_anterior);
   $stm->bindValue(':data_entrada_anterior', $data_entrada_anterior);
   $stm->bindValue(':data_saida_anterior', $data_saida_anterior);
   $stm->bindValue(':atividades_anterior', $atividades_anterior);

   $stm->bindValue(':cpf', $cpf);
   $stm->bindValue(':civil', $civil);
   $stm->bindValue(':cep', $cep);
   $stm->bindValue(':logradouro', $logradouro);
   $stm->bindValue(':numero', $numero);
   $stm->bindValue(':complemento', $complemento);
   $stm->bindValue(':bairro', $bairro);
   $stm->bindValue(':cidade', $cidade);
   $stm->bindValue(':uf', $uf);
   $stm->bindValue(':arquivo', $curriculum);
 
   $retorno = $stm->execute();
  
   if ($retorno){	  
   
   $qstring = '?status=succ'; 
   session_unset ();
   
   } else {   
   $qstring = '?status=pdo';  
   }
 
 } else {
	$qstring = '?status=erroimage';   
 }
}
			
}else{$qstring = '?status=err'; }
			
header("Location: index.php".$qstring);	
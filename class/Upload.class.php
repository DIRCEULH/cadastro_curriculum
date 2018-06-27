<?php


class Upload{
		private $arquivo;
		private $altura;
		private $largura;
		private $pasta;
	   

		function __construct($arquivo, $altura, $largura, $pasta, $nomeFile){
			$this->arquivo = $arquivo;
			$this->altura  = $altura;
			$this->largura = $largura;
			$this->pasta   = $pasta;
			$this->nomeFile   = $nomeFile;
		}
		
		public function getExtensao(){
			
			return $extensao = strtolower(end(explode('.', $this->arquivo['name'])));
		}
		
		public function ehImagem($extensao){
			$extensoes = array('gif', 'jpeg', 'jpg', 'png');	 
			if (in_array($extensao, $extensoes))
				return true;	
		}
		
		
		public function redimensionar($imgLarg, $imgAlt, $tipo, $img_localizacao){
		
			if ( $imgLarg > $imgAlt ){
				$novaLarg = $this->largura;
				$novaAlt = round( ($novaLarg / $imgLarg) * $imgAlt );
			}
			elseif ( $imgAlt > $imgLarg ){
				$novaAlt = $this->altura;
				$novaLarg = round( ($novaAlt / $imgAlt) * $imgLarg );
			}
			else 
				$novaAltura = $novaLargura = max($this->largura, $this->altura);
			
		
			
		
			$novaimagem = imagecreatetruecolor($novaLarg, $novaAlt);
			
			switch ($tipo){
				case 1:	// gif
					$origem = imagecreatefromgif($img_localizacao);
					imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0,
					$novaLarg, $novaAlt, $imgLarg, $imgAlt);
					imagegif($novaimagem, $img_localizacao);
					break;
				case 2:	// jpg
					$origem = imagecreatefromjpeg($img_localizacao);
					imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0,
					$novaLarg, $novaAlt, $imgLarg, $imgAlt);
					imagejpeg($novaimagem, $img_localizacao);
					break;
				case 3:	// png
					$origem = imagecreatefrompng($img_localizacao);
					imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0,
					$novaLarg, $novaAlt, $imgLarg, $imgAlt);
					imagepng($novaimagem, $img_localizacao);
					break;
			}
			
			
			imagedestroy($novaimagem);
			imagedestroy($origem);
		}
		
		public function salvar(){
			
			$extensao = $this->getExtensao();
			
			$novo_nome = $this->nomeFile;
	
			$destino = $this->pasta . $novo_nome;
			
				
			if ($this->ehImagem($extensao)){												
			
				list($largura, $altura, $tipo, $atributo) = getimagesize($destino);

				if(($largura > $this->largura) || ($altura > $this->altura)) {
				
				
					$this->redimensionar($largura, $altura, $tipo, $destino);
				} 
				return "Sucesso";
			} else {
				return "Não é extensão permitida";
			}
		
			if (!move_uploaded_file($this->arquivo['tmp_name'], $destino)){
				if ($this->arquivo['error'] == 1) {
				
					return "Tamanho excede o permitido";
				} else {
				
					return "Erro " . $this->arquivo['error'];
				}
			} else {
				return "Sucesso";
			}
		}						
	}
?>
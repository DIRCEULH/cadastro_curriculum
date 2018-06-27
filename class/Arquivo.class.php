<?php
/**
 * Classe de uploud de arquivos
 * 
 * @author Samuel Carvalho <samuelneivacarvalho@gmail.com>
 * @link   https://github.com/SamuelN/Uploud-arquivo-PHP/
 * 
 */

class Arquivo {

/**
 * Armazena os erros
 * 
 * @var string
 */
    protected static $erros;
    
/**
 * Faz uploud dos arquivos
 * 
 * @param  array    $arquivo                O arquivo
 * @param  string   $destino                Destino do arquivo
 * @param  string   $nomeArquivo            Nome personalizado para o arquivo
 * @param  array    $formatosPermitidos     Formatos de arquivos permitidos
 * @param  int      $tamanhoMaximo          O tamanho maximo do arquivo
 * 
 * @return bool
 */
    public static function salvar($arquivo, $destino, $nomeArquivo = null, $formatosPermitidos = null, $tamanhoMaximo =  null){
        
        // verifica se algum arquivo foi passado para a função
        if (!empty($arquivo['name'])) {
                
            // verifica se destino do arquivo foi passado para a função
            if (empty($destino)) {
                self::$erros = "Nenhum destino foi passada para a função!";
                return false;
            }

            // verifica se tamanho maximo foi definido, se sim verifica se arquivo é menor do tamanho definido
            if (!empty($tamanhoMaximo) && $tamanhoMaximo!=null) {

                if ($arquivo['size'] > $tamanhoMaximo) {

                    $tamanhoMaximoPermitido = $tamanhoMaximo;
 
                    /* Medidas */
                    $medidas = array('KB', 'MB', 'GB', 'TB');
                 
                    /* Se for menor que 1KB arredonda para 1KB */
                    if($tamanhoMaximoPermitido < 999){
                        $tamanhoMaximoPermitido = 1000;
                    }
                 
                    for ($i = 0; $tamanhoMaximoPermitido > 999; $i++){
                        $tamanhoMaximoPermitido /= 1024;
                    }

                    $tamanhoMaximoPermitido = round($tamanhoMaximoPermitido) . $medidas[$i - 1];

                    self::$erros = "O arquivo ultrapassa o limite de tamanho de ".$tamanhoMaximoPermitido."!";
                    return false;
                }
            }
    
            // verifica se caminho do arquivo existe
            if (!file_exists($destino)) {
                self::$erros = "Destino não encontrado!";
                return false;
            }
    
            // verifica se formatos de arquivos foram passados para a função. Se sim, verifica se arquivo esta com formato correto
            if (!empty($formatosPermitidos) || $formatosPermitidos!=null) {

             $formatos = $formatosPermitidos;
              $extensao = strrchr($_FILES['arquivo']['name'], '.');
              for($i=0; $i<count($formatos); $i++){
                
              if ($extensao==$formatos[$i]) {
                    $formatoArquivoVerificado = $formatos[$i];
                 }

              }

            if (empty($formatoArquivoVerificado) || $extensao!=$formatoArquivoVerificado) {
                   self::$erros = "Formato de arquivo não suportado! Formatos permitidos: ".implode(", ", $formatosPermitidos);
                return false;
                }

          }
                
            // verifica se nome do arquivo foi passado para a função. Se não, o nome continua o mesmo
            if (!empty($nomeArquivo) || $nomeArquivo!=null) {
                $extensaoImagem = end(explode(".", $arquivo['name']));
                $uploadfile = $destino.$nomeArquivo;
            } else {
                $uploadfile = $destino.$arquivo['name'];
            }
        
            // faz uploud do arquivo
            if (move_uploaded_file($arquivo['tmp_name'], $uploadfile)) {
                return true;
            } else {
                self::$erros = "Erro inesperado ao salvar imagem!";
                return false;
            }
        
        } else {
            self::$erros = "Nenhuma arquivo foi passado para a função!";
            return false;
        }
    }

    
/**
 * Retorna erros gerados
 * 
 * 
 * @return string
 */
    public static function getErro(){
        if (empty(self::$erros)) {
            return "Erro inesperado ao salvar imagem!";
        } else {
            return self::$erros;    
        }
    }

}

    


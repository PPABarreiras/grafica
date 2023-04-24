<?php
    include "config.php";

    // Capitura dos dados informados
    $titulo = $_POST["titulo"];
    $tipo = $_POST["tipoDoc"];
    $assunto = $_POST["assunto"];
    $cor = $_POST["cor"];
    $nCopias = $_POST["nCopias"];
    // $nCopias = intval($nCopias);
    $data_entrega = $_POST["data_entrega"];
    // $data_entrega = date('d/m/Y');
    $situacao = "em espera";
    // $nome_sessao = $_SESSION['name'];

    // $id_query = $mysqli->query("SELECT id_usuario FROM professor WHERE nome =  \"$nome_sessao \" ; ") or die("falha ao consultar o banco de dados"); 
    // $retorno_id_query = ($id_query->fetch_assoc());  
    // $idusuario = $retorno_id_query['id_usuario'];

    // verificação de arquivo existente no input de upload de arquivos PDF
    if (isset($_POST['submit'])) {
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));
        
        if ($fileError === 0) {
            $fileNameNew = $titulo.".".$fileActualExt;
            
            $fileDestination = "../uploads/".$fileNameNew;
            
             move_uploaded_file($fileTmpName, $fileDestination);

            echo "<script>
                  window.location.href='/ppa/ppa/aplicacao_professor/index.php';
                  window.location.href='/ppa/ppa/aplicacao_professor/src/page_meus_envios.php';
                  alert('Inserido com sucesso!');
                  </script>";

        }

        $stmt->prepare("INSERT INTO arquivo (tipo, nome, tamanho_arquivo, qtd_impressao, data_envio, cor, titulo, assunto) VALUES (?,?,?,?,?,?,?,?);");
        $stmt->bind_param("ssiissss", $fileActualExt, $fileNameNew, $fileSize, $nCopias, $data, $cor, $titulo, $assunto);
        $stmt->execute();
    }

?>

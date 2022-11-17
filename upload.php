<?php
// Include the database configuration file
include 'dbConfig.php';
$statusMsg = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["myfile"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

if(isset($_POST["submit"]) && !empty($_FILES["myfile"]["name"])){

    // permitir algumas extensões
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){

        // carregar a imagem para o servidor
        if(move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetFilePath)){

            // inserir a imagem na base de dados
            $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if($insert){
                $statusMsg = "O ficheiro ".$fileName. " foi carregado com sucesso.";
            }else{
                $statusMsg = "O carregamento falhou, tente de novo.";
            } 
        }else{
            $statusMsg = "Desculpe, ocorreu um erro ao carregar a imagem";
        }
    }else{
        $statusMsg = 'Apenas ficheiros com as extensões JPG, JPEG, PNG files sao permitidos.';
    }
}else{
    $statusMsg = 'Selecione um ficheiro para carregar.';
}

// Display status message
echo $statusMsg;
?>
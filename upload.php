<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_FILES['file'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $fileName = $file['name'];
        $fileTmp = $file['tmp_name'];

        $object = $bucket->upload(
            fopen($fileTmp, 'r'),
            [
                'name' => $fileName
            ]
        );

        echo "Arquivo '$fileName' enviado com sucesso para a nuvem!";
    } else {
        echo "Erro ao enviar o arquivo.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Upload de Documentos</title>
</head>
<body>
    <h1>Upload de Documentos para a Nuvem</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Selecione um arquivo: 
        <input type="file" name="file" required><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

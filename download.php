<?php
include 'config.php';

if (isset($_GET['file'])) {
    $fileName = $_GET['file'];
    $object = $bucket->object($fileName);

    if ($object->exists()) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($fileName) . '"');
        echo $object->downloadAsString();
    } else {
        echo "Arquivo não encontrado.";
    }
} else {
    echo "Nenhum arquivo selecionado.";
}

<?php
include 'config.php';

$objects = $bucket->objects();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Documentos Armazenados</title>
</head>
<body>
    <h1>Lista de Documentos na Nuvem</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nome do Arquivo</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($objects as $object): ?>
                <tr>
                    <td><?php echo $object->name(); ?></td>
                    <td><a href="download.php?file=<?php echo $object->name(); ?>">Baixar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

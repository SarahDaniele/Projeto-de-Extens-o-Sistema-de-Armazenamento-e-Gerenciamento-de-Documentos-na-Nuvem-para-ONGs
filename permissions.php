<?php
session_start();

function checkPermission($requiredRole) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] != $requiredRole) {
        echo "Você não tem permissão para acessar esta página.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role'];
    $_SESSION['role'] = $role;
    echo "Papel de usuário definido como: " . $role;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Definir Permissões de Usuário</title>
</head>
<body>
    <h1>Configuração de Permissões</h1>
    <form method="POST" action="permissions.php">
        <label for="role">Defina o papel do usuário:</label><br>
        <select name="role" id="role">
            <option value="admin">Administrador</option>
            <option value="colaborador">Colaborador</option>
        </select><br><br>
        <input type="submit" value="Definir Permissão">
    </form>

    <?php if (isset($_SESSION['role'])): ?>
        <p>Papel atual: <?php echo $_SESSION['role']; ?></p>
    <?php endif; ?>
</body>
</html>

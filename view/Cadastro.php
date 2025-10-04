<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Conta</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <h1>Criar Conta</h1>
        <p>Preencha os dados abaixo para se cadastrar</p>
        <form method="post" action="">
            <input type="text" name="nome" placeholder="Nome completo" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha (mínimo 8 caracteres)" required minlength="8">
            <button type="submit">Registrar</button>
        </form>
        <a href="Index.php?controller=usuario&action=login" class="link">Já tem conta? Faça login</a>
    </div>
</body>
</html>

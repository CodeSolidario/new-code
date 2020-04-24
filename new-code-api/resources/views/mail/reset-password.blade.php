<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Solicitação de resgate de senha</h1>

    <p>Se voçê solicitou o resgate da sua senha clique no link abaixo para criar uma nova senha.</p>
    <p><a href="http://localhost:8080/reset-password/{{ $token->token }}">Reset de senha</a></p>
</body>
</html>
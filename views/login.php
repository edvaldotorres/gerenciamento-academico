<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0 shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Fazer Login | UNU DIGITAL</title>

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>/assets/css/all.min.css"/>
    <script src="<?php echo BASE_URL; ?>/assets/javaScript/all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    <link rel="stylesheet"
          href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body class="text-center">
<form class="form-signin" method="POST">

    <img class="mb-4" src="https://www.unu.com.br/wp-content/uploads/2017/11/UNU-DIGITA.png"
         alt="Logo UNU_DIGITAL" width="300"
         height="100">

    <h1 class="h3 mb-3 font-weight-normal">Gerenciamento Acadêmico</h1>

    <label for="inputEmail" class="sr-only">Digite seu e-mail</label>
    <input type="email" name="email" class="form-control"
           placeholder="Digite seu e-mail" required autofocus/>

    <label for="inputPassword" class="sr-only">Digite sua senha</label>
    <input type="password" name="password" class="form-control"
           placeholder="Digite sua senha" required/>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar
    </button>

    <p class="mt-5 mb-3 text-muted">&copy; 2021, Desenvolvido com <i
                class="fas fa-heart"></i> por Edvaldo Torres.</p>

    <?php if (isset($error) && !empty($error)): ?>
        <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
    <?php endif; ?>
</form>

<script src="/assets/javaScript/jquery-3.5.1.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>
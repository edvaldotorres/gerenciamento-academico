<h1>Aluno - Novo</h1>

<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warn"><?php echo $error_msg; ?></div>
<?php endif; ?>

<form method="POST">
    <label for="name">Nome do Aluno</label><br />
    <input type="text" name="name" required /><br /><br />

    <label for="date">Data de Nascimento</label><br /><br />
    <input type="date" name="date" require /><br/><br/>

    <input type="submit" value="Adicionar" />
</form>
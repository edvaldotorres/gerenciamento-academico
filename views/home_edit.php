<h1>Aluno - Editar</h1>

<?php if (isset($error_msg) && !empty($error_msg)): ?>
    <div class="warn"><?php echo $error_msg; ?></div>
<?php endif; ?>

<form method="POST">
    <label for="name">Titulo da Tarefa</label><br/>
    <input type="text" name="name" value="<?php echo $pupils_info[0]['name']; ?>"
           required/>
    
    <br/><br/>

    <label for="date">Data de Nascimento</label><br /><br />
    <input type="date" name="date"
           value="<?php echo $pupils_info[0]['date']; ?>"/><br/><br/>

    <input type="submit" value="Salvar"/>
</form>
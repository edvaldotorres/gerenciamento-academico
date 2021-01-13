<h1>Lista de Alunos</h1>

<?php if ($edit_permission) : ?>
    <div class="button">
        <a href="<?php echo BASE_URL; ?>/home/add">Novo Aluno</a>
    </div>
<?php endif; ?>

<input type="text" id="busca" data-type="search_pupils" placeholder="Nome do Aluno" />

<table border="0" width="100%">
    <tr>
        <th>id</th>
        <th>Nome do Aluno</th>
        <th>Data de Nascimento</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($pupils_list as $c) : ?>
        <tr>
            <td width="150"><?php echo $c['id']; ?></td>
            <td width="150"><?php echo $c['name']; ?></td>
            <td width="100"><?php $date = date_create($c['date']);
                            echo date_format($date, "d/m/Y"); ?></td>
            <td width="160" style="text-align:center">
                <?php if ($edit_permission) : ?>
                    <div class="button button_small"><a href="<?php echo BASE_URL; ?>/home/edit/<?php echo $c['id']; ?>">Editar</a>
                    </div>
                    <div class="button button_small"><a href="<?php echo BASE_URL; ?>/home/delete/<?php echo $c['id']; ?>" onclick="return confirm('O aluno será removido')">Excluir</a>
                    <?php else : ?>
                        <div class="button button_small"><a href="<?php echo BASE_URL; ?>/home/edit/<?php echo $c['id']; ?>">Visualizar</a>
                        </div>
                    <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<div class="pagination">
    <?php for ($q = 1; $q <= $p_count; $q++) : ?>
        <div class="pag_item <?php echo ($q == $p) ? 'pag_ativo' : ''; ?>"><a href="<?php echo BASE_URL; ?>/home?p=<?php echo $q; ?>"><?php echo $q; ?></a>
        </div>
    <?php endfor; ?>
    <div style="clear:both"></div>
</div>
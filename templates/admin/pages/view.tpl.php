<h3 class="mb-5">Visualização de página</h3>

<div class="row">
    <div class="col-3">
        <dl class="row">

            <dt class="col-sm-4">Título</dt>
            <dd class="col-sm-8"><?php echo $data['pages']['title']; ?></dd>

            <dt class="col-sm-4">Url</dt>
            <dd class="col-sm-8">/<?php echo $data['pages']['url']; ?> - <a href="/<?php echo $data['pages']['url']; ?>" target="_blank">abrir</a></dd>

            <dt class="col-sm-4">Criado em</dt>
            <dd class="col-sm-8"><?php echo $data['pages']['created']; ?></dd>

            <dt class="col-sm-4">Atualizado em</dt>
            <dd class="col-sm-8"><?php echo $data['pages']['created']; ?></dd>

        </dl>
    </div>
        <div class="col bg-light">
            <?php echo $data['pages']['body']; ?>
        </div>
</div>

<p>
    <a href="/admin/pages/<?php echo $data['pages']['id']; ?>/edit" class="btn btn-primary">editar</a>
    <a href="/admin/pages/<?php echo $data['pages']['id']; ?>/delete" class="btn btn-danger confirm">delete</a>
</p>

<hr>

<a href="/admin/pages" class="btn btn-secondary">voltar</a>
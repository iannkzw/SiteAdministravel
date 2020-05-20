<h3 class="mb-5">Administração de usuários</h3>

<dl class="row">
    <dt class="col-sm-3">Email</dt>
    <dd class="col-sm-9"><?php echo $data['users']['email']; ?></dd>

    <dt class="col-sm-3">Criado em</dt>
    <dd class="col-sm-9"><?php echo $data['users']['created']; ?></dd>

    <dt class="col-sm-3">Atulizado em</dt>
    <dd class="col-sm-9"><?php echo $data['users']['created']; ?></dd>
</dl>

<p>
    <a href="/admin/users/<?php echo $data['users']['id']; ?>/edit" class="btn btn-outline-primary">Editar</a>
    <a href="/admin/users/<?php echo $data['users']['id']; ?>/delete" class="btn btn-outline-danger confirm">Remover</a>
</p>

<hr/>

<a href="/admin/users" class="btn btn-outline-secondary">Voltar</a>
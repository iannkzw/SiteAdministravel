<h3 class="mb-5">Administração de usuários</h3>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
     <?php foreach ($data['users'] as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['email'] ?></td>
            <td class="text-right"><a href="/admin/users/<?= $user['id'] ?>" class="btn btn-outline-primary btn-sm">ver</a></td>
        </tr>
     <?php endforeach; ?>
    </tbody>
</table>
<a href="/admin/users/create" class="btn btn-outline-success">Novo usuário</a>
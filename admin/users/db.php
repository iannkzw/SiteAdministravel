<?php
function users_get_data ($redirectOnError)
{
    $email = filter_input(INPUT_POST, 'email');
    $senha = filter_input(INPUT_POST, 'senha');


    if (!$email)
    {
        flash('Informe o campo de email', 'error');
        header('location: '.$redirectOnError);
        die();
    }

    return compact('email', 'senha');

}

$users_all = function () use ($conn)
{

    $result = $conn->query("SELECT * FROM users");
    return $result->fetch_all(MYSQLI_ASSOC);

};

$users_one = function ($id) use ($conn)
{

    $sql = 'SELECT * FROM users WHERE id=?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_assoc();

};

$users_create = function () use ($conn)
{

    $data = users_get_data('/admin/users/create');

    $sql = 'INSERT INTO users (email, password, updated, created) VALUES (?, ?, NOW(), NOW())';

    $data['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $data['email'], $data['senha']);

    flash('Registro criado com sucesso', 'success');

    return $stmt->execute();

};

$users_edit = function ($id) use ($conn)
{
    $data = users_get_data('/admin/users/' .$id. '/edit');

    $sql = 'UPDATE users SET email=?, updated=NOW() WHERE id=?';

    if ($data['senha'])
    {
        $data['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);
        $sql = 'UPDATE users SET email=?, password=?, updated=NOW() WHERE id=?';
    }

    $stmt = $conn->prepare($sql);

    if ($data['senha'])
    {
        $stmt->bind_param('ssi', $data['email'], $data['senha'], $id);
    }
    else
    {
        $stmt->bind_param('si', $data['email'], $id);
    }

    flash('Registro atualizado com sucesso', 'success');

    return $stmt->execute();
};

$users_delete = function ($id) use ($conn)
{
    $sql = 'DELETE FROM users WHERE id=?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    flash('Registro deletado com sucesso', 'success');

    return $stmt->execute();
};
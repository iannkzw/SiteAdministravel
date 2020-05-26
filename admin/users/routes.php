<?php

include __DIR__. '/db.php';

if (resolve('/admin/users')) {

    $users = $users_all();
    render('admin/users/index', 'admin', ['users' =>$users]);

}elseif (resolve('/admin/users/create')){

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $users_create();
        return header('location: /admin/users');
    }
    render('admin/users/create', 'admin');

}elseif ($params = resolve('/admin/users/(\d+)')){

    $users = $users_one($params[1]);

    render('admin/users/view', 'admin', compact('users'));

}elseif ($params = resolve('/admin/users/(\d+)/edit')){

        $users = $users_one($params[1]);

        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $users_edit($params[1]);
            return header('location: /admin/users/' . $params[1]);
        }
        render('admin/users/edit', 'admin', compact('users'));

}elseif ($params = resolve('/admin/users/(\d+)/delete')){

    $users_delete($params[1]);
    return header('location: /admin/users');

}
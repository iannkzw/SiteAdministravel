<?php
require __DIR__ . '/../admin/pages/db.php';


if (resolve('/'))
{
    $pages = $pages_all();
    render('site/home', 'site', compact('pages'));
}
elseif (resolve('/contato'))
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $from = filter_input(INPUT_POST, 'from');
        $subject = filter_input(INPUT_POST, 'subject');
        $message = filter_input(INPUT_POST, 'message');
        $headers = 'De: ' . $from . "\r\n" . 'Responder para: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion();

        if (mail('ian_rox1@hotmail.com', $subject, $message, $headers))
        {
            flash('Email enviado com sucesso', 'success');
        }
        else
        {
            flash('Algo de errado aconteceu, tente contato por telefone', 'error');
        }

        return header('location: /contato');
    }

    $pages = $pages_all();
    render('site/contato', 'site',  compact('pages'));
}
elseif ($params = resolve('/(.*)'))
{
    $pages = $pages_all();
    foreach ($pages as $page)
    {
        if ($page['url'] == $params[1])
        {
            break;
        }
    }
    render('site/page', 'site', compact('pages', 'page'));
}
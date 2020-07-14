<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/site.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.brighttheme.min.css">

</head>
<body>
<header id="header">
    <h1>Bem vindo</h1>
</header>

<ul id="nav">
    <li><a href="/">Home</a></li>
    <?php foreach ($data['pages'] as $item): ?>
    <li><a href="<?= $item['url']?>"><?= $item['title']?></a></li>
    <?php endforeach; ?>
    <li><a href="/contato">Contato</a></li>
</ul>

<main id="content">
    <?php include $content; ?>
</main>

<p id="footer"><small><?= date('Y'); ?>- todos os direitos reservados</small></p>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.min.js"></script>
<script>
    <?php flash(); ?>
</script>
</body>
</html>

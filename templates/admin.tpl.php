<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/resources/trix/trix.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.brighttheme.min.css">

    <title>projeto</title>
</head>
<body class="d-flex flex-column">
<div id="header">
    <nav class="navbar navbar-dark bg-dark">
        <span>
            <a href="/admin" class="navbar-brand">Admin</a>
            <span class="navbar-text">
                    Painel administrativo
            </span>
        </span>
        <a href="/admin/auth/logout" class="btn btn-secondary btn-sm ">sair</a>
    </nav>
</div>
<div id="main">
    <div class="row">
        <div class="col">
            <ul id="main-menu" class="nav flex-column nav-pills bg-secondary text-white p-2">
                <li class="nav-item">
                    <span class="nav-link"><small>MENU</small></span>
                </li>
                <li class="nav-item">
                    <a href="/admin/pages" class="nav-link <?php if (resolve('/admin/pages.*')) : ?> active <?php endif;?>">Páginas</a>
                </li>
                <li class="nav-item">
                    <a href="/admin/users" class="nav-link <?php if (resolve('/admin/users.*')) : ?> active <?php endif; ?>">Usuários</a>
                </li>
            </ul>
        </div>
        <div id="content" class="col-10">
            <?php include $content; ?>
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="/resources/trix/trix.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.min.js"></script>

<script>
    document.addEventListener('trix-attachment-add', function () {
        const attachment = event.attachment;
        if (!attachment.file)
        {
            return;
        }
        const form = new FormData();
        form.append('file', attachment.file);

        $.ajax({
            url: '/admin/upload/image',
            method: 'POST',
            data: form,
            contentType: false,
            processData: false,
            xhr: function () {
                const xhr = $.ajaxSettings.xhr();
                xhr.upload.addEventListener('progress', function (e) {
                    let  progress = e.loaded / e.total * 100;
                    attachment.setUploadProgress(progress)
                })
                return xhr;
            }
        }).done(function (response) {
            attachment.setAttributes({
                url: response,
                href: response
            })
        }).fail(function () {
            console.log('errado')
        })
    });

    <?php flash(); ?>

    const confirmEl = document.querySelector('.confirm');

    if (confirmEl) {
        confirmEl.addEventListener('click', function (e)  {
            e.preventDefault();
            if (confirm('Tem certeza que quer fazer isso?')) {
                window.location = e.target.getAttribute('href');
            }

        })
    }
</script>
</body>
</html>
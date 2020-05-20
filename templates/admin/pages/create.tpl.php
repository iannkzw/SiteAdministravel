<h3 class="mb-5" >Nova página</h3>

<form action="" method="post">

    <div class="form-group">
        <label for="pagesTitle">Título</label>
        <input type="text" name="title" id="pagesTitle" class="form-control" placeholder="Título da página" required>
    </div>

    <div class="form-group">
        <label for="pagesUrl">Url</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">/</span>
            </div>
            <input type="text" name="url" id="pagesUrl" class="form-control" placeholder="Url da página" required>
        </div>
    </div>

    <div class="form-group">
        <input type="hidden" id="pagesBody" name="body">
        <trix-editor input="pagesBody"></trix-editor>
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>

</form>

<hr>

<a href="/admin/pages" class="btn btn-secondary">voltar</a>
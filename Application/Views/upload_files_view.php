<h1>Загрузка изображений</h1>

<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
        <input class="form-control" type='file' name='file[]' class='file-drop' id='file-drop' multiple required>
        <br>
        <input class="btn btn-primary" type='submit' value='Загрузить' >
    </div>
</form>
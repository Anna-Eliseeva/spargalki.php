<pre>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        print_r($_FILES); /*В данной переменной хранятся файлы,которые пользователь
       хочет загрузить,хранятся в временной папке */
    }
    ?>

    <form action="index.php" method="post"
          enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="4096">
        <!---В данной строке указываем максимальный размер файла,который пользователь
        может загрузить --->
        <input type="file" name="userfile">
        <input type="submit">
    </form>
</pre>
<?php
if (!empty($_FILES)) {
    include 'classupload.php';

    $upload = new UploadImagem();
    $upload->width = 250;
    $upload->height = 250;

    echo $upload->salvar("upload/", $_FILES['img']);
}
?>
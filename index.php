<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Selecione uma imagem para carregar</label><br>
        <input type="file" name="myfile">
        <input type="submit" name="submit" value="Carregar">
    </form>
</body>

</html>
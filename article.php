<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href = "estilos/estilo-article.css" >
    <title>Articulo del Producto</title>
</head>
<body>

    <?php

    include("redimensionarImg.php");

    move_uploaded_file($_FILES['producto']['tmp_name'],$_FILES['producto']['name']);
    $imagen1=redimensionarImg($_FILES['producto']['name'], 510, 450);

    unlink($_FILES['producto']['name']);

    ?>

    <div class="content-all">

        <div class="content-foto">
           <?php echo '<img src="imagenes/'.$imagen1.'">'; ?>      
        </div>

        <div class="content-items">

            <div class="name">
                <?php $nombre=$_POST['nombre'];
                    echo $nombre;
                ?>
            </div>

            <div class="descripcion">
                <?php $descripcion=$_POST['descripcion'];
                    echo $descripcion;
                ?>
            </div>

            <div class="precio">
            <hr size="1">
                <?php $precio=$_POST['precio'];
                    echo "$$precio";
                ?>
            </div>

            <div class="input-content">
                <input type="button" value="COMPRAR">
                <hr class="hr-input" size="1" align="right" />
                <input type="button" value="VOLVER" onclick="history.back()">
                <hr class="hr-input" size="1" align="right" />
            </div>
    </div>

</body>
</html>
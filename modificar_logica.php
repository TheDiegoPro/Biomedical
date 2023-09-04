<?php include 'global_pdo/conexion.php';

$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";

$txtProducto = (isset($_POST['txtProducto'])) ? $_POST['txtProducto'] : "";
$txtPrecio = (isset($_POST['txtPrecio'])) ? $_POST['txtPrecio'] : "";
$txtCategoria = (isset($_POST['txtCategoria'])) ? $_POST['txtCategoria'] : "";
$txtCantidad = (isset($_POST['txtCantidad'])) ? $_POST['txtCantidad'] : "";
$txtDescripcion = (isset($_POST['txtDescripcion'])) ? $_POST['txtDescripcion'] : "";
$foto = (isset($_FILES['foto']['name'])) ? $_FILES['foto']['name'] : "";

$fecha_vencimiento = (isset($_POST['fecha_vencimiento'])) ? $_POST['fecha_vencimiento'] : "";
$numero_productos = (isset($_POST['numero_productos'])) ? $_POST['numero_productos'] : "";
$num_cajas_lote = (isset($_POST['num_cajas_lote'])) ? $_POST['num_cajas_lote'] : "";

$sentencia = $pdo->prepare("UPDATE productos SET nombre=:nombre, precio=:precio, descripcion=:descripcion, categoria=:categoria,cantidad=:cantidad, fecha_vencimiento=:fecha_vencimiento,numero_productos=:numero_productos, num_cajas_lote=:num_cajas_lote WHERE id=:id ");

    $sentencia->bindParam(':nombre', $txtProducto);
    $sentencia->bindParam(':precio', $txtPrecio);
    $sentencia->bindParam(':categoria', $txtCategoria);
    $sentencia->bindParam(':cantidad', $txtCantidad);
    $sentencia->bindParam(':descripcion', $txtDescripcion);
    $sentencia->bindParam(':fecha_vencimiento', $fecha_vencimiento);
    $sentencia->bindParam(':numero_productos', $numero_productos);
    $sentencia->bindParam(':num_cajas_lote', $num_cajas_lote);

    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();


    $Fecha = new DateTime();
    $nombreArchivo = ($foto != "") ? $Fecha->getTimestamp() . "_" . $_FILES["foto"]["name"] : "imagen.jpg";

    $tmpFoto = $_FILES["foto"]["tmp_name"];

    if ($tmpFoto != "") {
      move_uploaded_file($tmpFoto, "images/productos/" . $nombreArchivo);

      $sentencia = $pdo->prepare("SELECT imagen FROM productos WHERE id=:id");
      $sentencia->bindParam(':id', $txtID);
      $sentencia->execute();
      $producto = $sentencia->fetch(PDO::FETCH_LAZY);

      $item['imagen']='';

      if (isset($producto["imagen"])) {
        if (file_exists($producto["imagen"])) {

          if ($item['imagen'] != "imagen.jpg") {
            unlink($producto["imagen"]);
          }
        }
      }

      $sentencia = $pdo->prepare("UPDATE productos SET imagen= 'images/productos/' :foto WHERE id=:id ");
      $sentencia->bindParam(':foto', $nombreArchivo);
      $sentencia->bindParam(':id', $txtID);
      $sentencia->execute();
    }
   header('location: home_lab.php');


?>


<?php include 'global_pdo/conexion.php';
session_start();

$id_usuario = $_SESSION['usuario']['id'];

$sql = $pdo->prepare("SELECT * FROM usuarios where id = $id_usuario");
$sql->execute();
$datos_usuario = $sql->fetch();

$sql2 = $pdo->prepare("SELECT * FROM productos");
$sql2->execute();
$listaProductos = $sql2->fetchALL(PDO::FETCH_ASSOC);

$total_articulos_db = $sql2->rowCount();
//echo $total_articulos_db;
$paginas = $total_articulos_db / 20;
$paginas = ceil($paginas);
//echo $paginas;
$articulos_x_pagina = 20;

if (!$_GET) {
  header('Location:home_lab.php?pagina=1');
}

if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
  header('Location:home_lab.php?pagina=1');
}

$iniciar = ($_GET['pagina'] - 1) * $articulos_x_pagina;

$sql_articulos = 'SELECT * FROM productos LIMIT :inicar,:narticulos';
$sentencia_articulos = $pdo->prepare($sql_articulos);
$sentencia_articulos->bindParam(':inicar', $iniciar, PDO::PARAM_INT);
$sentencia_articulos->bindParam(':narticulos', $articulos_x_pagina, PDO::PARAM_INT);
$sentencia_articulos->execute();

$resultado_articulos = $sentencia_articulos->fetchAll();



//$sentencia = $pdo->prepare("SELECT * FROM `productos`");
//$sentencia->execute();
//$listaProductos = $sentencia->fetchALL(PDO::FETCH_ASSOC);

$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtunidad = (isset($_POST['txtunidad'])) ? $_POST['txtunidad'] : "";
$txtProducto = (isset($_POST['txtProducto'])) ? $_POST['txtProducto'] : "";
$txtPrecio = (isset($_POST['txtPrecio'])) ? $_POST['txtPrecio'] : "";
$txtCategoria = (isset($_POST['txtCategoria'])) ? $_POST['txtCategoria'] : "";
$txtCantidad = (isset($_POST['txtCantidad'])) ? $_POST['txtCantidad'] : "";
$txtDescripcion = (isset($_POST['txtDescripcion'])) ? $_POST['txtDescripcion'] : "";
$foto = (isset($_FILES['foto']['name'])) ? $_FILES['foto']['name'] : "";
$vencimiento = (isset($_POST['vencimiento'])) ? $_POST['vencimiento'] : "";
$no_productos = (isset($_POST['no_productos'])) ? $_POST['no_productos'] : "";
$lotes = (isset($_POST['lotes'])) ? $_POST['lotes'] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$error = array();

$accionAgregar = "";
$accionModificar = $accionEliminar = $accionCancelar = "disabled";
$mostrarModal = false;

switch ($accion) {

  case "btnAgregar":

    if ($txtProducto == "") {
      $error['Nombre'] = "Escribe el nombre";
    }
    if (count($error) > 0) {
      $mostrarModal = true;
      break;
    }

    $sentencia = $pdo->prepare("INSERT INTO productos (nombre,precio,descripcion,imagen,categoria,cantidad,fecha_vencimiento,numero_productos,num_cajas_lote) 
      VALUES (:nombre,:precio,:descripcion,'images/productos/' :foto,:categoria,:cantidad,:vencimiento,:productos,:lotes)");

    $sentencia->bindParam(':nombre', $txtProducto);
    $sentencia->bindParam(':precio', $txtPrecio);
    $Fecha = new DateTime();
    $nombreArchivo = ($foto != "") ? $Fecha->getTimestamp() . "_" . $_FILES["foto"]["name"] : "imagen.jpg";

    $tmpFoto = $_FILES["foto"]["tmp_name"];

    if ($tmpFoto != "") {
      move_uploaded_file($tmpFoto, "images/productos/" . $nombreArchivo);
    }

    $sentencia->bindParam(':descripcion', $txtDescripcion);
    $sentencia->bindParam(':foto', $nombreArchivo);
    $sentencia->bindParam(':categoria', $txtCategoria);
    $sentencia->bindParam(':cantidad', $txtCantidad);

    $sentencia->bindParam(':vencimiento', $vencimiento);
    $sentencia->bindParam(':productos', $no_productos);
    $sentencia->bindParam(':lotes', $lotes);
    $sentencia->execute();



    header("location:home_lab.php");
    break;

  case "btnEliminar":

    $sentencia = $pdo->prepare("SELECT imagen FROM productos WHERE ID=:id");
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();
    $producto = $sentencia->fetch(PDO::FETCH_LAZY);


    if (isset($producto["imagen"]) && ($item['imagen'] != "imagen.jpg")) {
      if (file_exists($producto["imagen"])) {
        unlink($producto["imagen"]);
      }
    }

    $sentencia = $pdo->prepare("DELETE FROM productos WHERE ID=:id");
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();

    header("location:home_lab.php");

    break;

  case "btnCancelar":

    header("location:home_lab.php");
    break;
}


if (isset($_SESSION['usuario'])) {

  if ($_SESSION['usuario']['Tipo_usuario'] == '2') {
  } else if ($_SESSION['usuario']['Tipo_usuario'] == '1') {

    header('location: /home.php');
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Biomedical - Home (LABORATORIO)</title>
  <?php include 'templates/header.php'; ?>

  <div class="main-nav d-none d-lg-block">
    <nav class="site-navigation text-right text-md-center" role="navigation">
      <ul class="site-menu js-clone-nav d-none d-lg-block">
        <li class="active"><a href="home_lab.php">INVENTARIO</a></li>
        <li><a href="ventas_lab.php">VENTAS</a></li>
        <li><a href="usuarios_lab.php">USUARIOS</a></li>
        <li><a href="profile_lab.php"><?php echo $datos_usuario['nombre']; ?></a></li>
    </nav>
  </div>
  <div class="icons">
    <a href="login/salir.php"><img src="images/icons/salir.png" height="25px" width="25px" alt="Cerrar Sesion" style="position: relative; bottom:5%;"></a>
    </a>
    <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
  </div>
  </div>
  </div>
  </div>
  </div>




  <!-- MODAL DE AGREGAR PRODUCTO -->

  <form action="" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 3%;">
      <div class="modal-dialog-centered modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-row">

              <input type="hidden" name="txtID" class="form-control" id="<?php echo $txtID; ?>" required>

              <div class="form-group col-md-4">
                <label for="">Producto</label>
                <input type="text" class="form-control <?php echo (isset($error['Nombre'])) ? "is-invalid" : ""; ?>" id="<?php echo $txtProducto; ?>" name="txtProducto" required>
                <div class="invalid-feedback">

                  <?php echo (isset($error['Nombre'])) ? $error['Nombre'] : ";" ?>
                </div>
              </div>

              <div class="form-group col-md-4">
                <label for="">Precio</label>
                <input type="number" class="form-control" id="<?php echo $txtPrecio; ?>" name="txtPrecio" min="1" required>
              </div>

              <div class="form-group col-md-4">
                <label for="">Categoria</label>
                <div class="form-group">
                  <select id="my-select" class="form-control" name="txtCategoria" id="<?php echo $txtCategoria; ?>">
                    <option>analgesicos</option>
                    <option>antiinflamatorios</option>
                    <option>antibioticos</option>
                    <option>antiparasitario</option>
                    <option>antiviral</option>
                    <option>antihipertensivo</option>
                    <option>anitalergicos</option>
                    <option>diureticos</option>
                    <option>protector_gastrico</option>
                    <option>vitaminas</option>
                  </select>
                </div>
              </div>

              <div class="form-group col-md-4">
                <label for="">Cantidad</label>
                <input type="number" class="form-control" id="<?php echo $txtCantidad; ?>" name="txtCantidad" min="1" required>
              </div>

              <div class="form-group col-md-12">
                <label for="">Descripción</label>
                <input type="text" class="form-control" id="<?php echo $txtDescripcion; ?>" name="txtDescripcion" required>
              </div>

              <div class="form-group col-md-4">
                <label for="">Fecha Vencimiento</label>
                <input type="text" class="form-control <?php echo (isset($error['Nombre'])) ? "is-invalid" : ""; ?>" id="<?php echo $vencimiento; ?>" name="vencimiento" required>
                <div class="invalid-feedback">

                  <?php echo (isset($error['Nombre'])) ? $error['Nombre'] : ";" ?>
                </div>
              </div>

              <div class="form-group col-md-4">
                <label for="">No.Productos</label>
                <input type="text" class="form-control" id="<?php echo $no_productos; ?>" name="numero_productos" min="1" required>
              </div>

              <div class="form-group col-md-4">
                <label for="">Cajas por Lotes</label>
                <input type="number" class="form-control" id="<?php echo $lotes; ?>" name="lotes" min="1" required>
              </div>

              <div class="form-group col-md-12">
                <label for="">Foto:</label>
                <?php

                if ($foto != "") { ?>

                  <br>
                  <img class="img-thumbnail rounded mx-auto d-block" width="100px" src="<?php echo $foto; ?>" alt="">
                  <br>
                  <br>

                <?php } ?>


                <input type="file" accept="image/*" class="form-control" id="<?php echo $foto; ?>" name="foto">
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-outline-success" <?php echo $accionAgregar; ?> value="btnAgregar" type="submit" name="accion">Agregar</button>

          </div>
        </div>
      </div>
    </div>
  </form>

  <style>
      @media (max-width: 576px) {
    #agregar{
      position:relative;
      right:5%;
      bottom:5px;
    }
    #busqueda,#busqueda2{
      position:relative;
      left:5%;
      
    }
   }

    </style>


  <div class="container">
    <!-- Button trigger modal -->


    <br>
    <br>


    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">Agregar Producto</button>
        <!--<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">+</button>-->

        <a class="navbar-brand"></a>
        <form class="d-flex" action="filtrado.php" method="$_GET">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle btn-info" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative; right:8%;">
              Categoria
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="filtrado.php?categoria=analgesicos&pagina=1">Analgesicos</a>
              <a class="dropdown-item" href="filtrado.php?categoria=antiinflamatorios&pagina=1">Antiinflamatorios</a>
              <a class="dropdown-item" href="filtrado.php?categoria=antibioticos&pagina=1">Antibioticos</a>
              <a class="dropdown-item" href="filtrado.php?categoria=antiparasitario&pagina=1">Antiparasitarios</a>
              <a class="dropdown-item" href="filtrado.php?categoria=antiviral&pagina=1">Antiviral</a>
              <a class="dropdown-item" href="filtrado.php?categoria=antihipertensivo&pagina=1">Antihipertensivo</a>
              <a class="dropdown-item" href="filtrado.php?categoria=antialergicos&pagina=1">Antialergicos</a>
              <a class="dropdown-item" href="filtrado.php?categoria=diureticos&pagina=1">Diureticos</a>
              <a class="dropdown-item" href="filtrado.php?categoria=protector_gastrico&pagina=1">Protectorgastrico</a>
              <a class="dropdown-item" href="filtrado.php?categoria=vitaminas&pagina=1">Vitaminas</a>
            </div>
          </div>

          <input class="form-control me-2" type="search" placeholder="" aria-label="Search" name="table_search" id="busqueda">
          <button class="btn btn-outline-success" type="submit" id="busqueda2">Buscar</button>
        </form>
      </div>
    </nav>

    <div class="table-responsive-md">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th>NO.</th>
            <th>IMAGEN</th>
            <th>NOMBRE</th>
            <th>PRECIO</th>
            <th>CANTIDAD</th>
            <th>FECHA DE VENCIMIENTO</th>
            <th>NUMERO DE PRODUCTOS</th>
            <th>CAJAS POR LOTE</th>
            <th>CATEGORIA</th>
            <th>ACCIÓN</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <?php foreach ($resultado_articulos as $producto) { ?>

              <td><?php echo $producto['ID']; ?></td>
              <td><img src="<?php echo $producto['imagen']; ?>" alt="" width="100px" height="100px"></td>
              <td><?php echo $producto['nombre']; ?></td>
              <td><?php echo $producto['precio']; ?></td>
              <td><?php echo $producto['cantidad']; ?></td>
              <td><?php echo $producto['fecha_vencimiento']; ?></td>
              <td><?php echo $producto['numero_productos']; ?></td>
              <td><?php echo $producto['num_cajas_lote']; ?></td>
              <td><?php echo $producto['categoria']; ?></td>


              <td>
              <div style="padding:5%;">
                <form class="form-inline" action="modificar_producto.php" method="get">
                  <input type="hidden" name="modificar" value="<?php echo $producto['ID']; ?>">
                  <input class="btn_search btn btn-outline-info my-2 my-sm-0" value="Modificar" type="submit" data-toggle="modal" data-target="#exampleModal2"></button>
                </form>

                <form action="" method="post">
                  <input type="hidden" name="txtID" value="<?php echo $producto['ID']; ?>">
                  <button class="btn btn-outline-danger" value="btnEliminar" type="submit" name="accion">Eliminar</button>
                </form>
              </div>
              </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-md-12 text-center">
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
            <a class="page-link" href="home_lab.php?pagina=<?php echo $_GET['pagina'] - 1 ?>" tabindex="-1" aria-disabled="true">Anterior</a>
          </li>

          <?php for ($i = 0; $i < $paginas; $i++) : ?>

            <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>"><a class="page-link" href="home_lab.php?pagina=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>

          <?php endfor ?>


          <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>">
            <a class="page-link" href="home_lab.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">Siguiente</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>

  <?php
  if ($mostrarModal) {
  ?>

    <script>
      $('#exampleModal').modal('show');
    </script>

  <?php } ?>

  <?php include 'templates/pie.php'; ?>
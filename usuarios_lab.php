<?php include 'global_pdo/conexion.php';
session_start();

$id_usuario= $_SESSION['usuario']['id'];

$sql=$pdo->prepare("SELECT * FROM usuarios where id = $id_usuario");
$sql->execute();
$datos_usuario = $sql->fetch();


$sql2 = $pdo->prepare("SELECT * FROM usuarios");
$sql2->execute();
$listaProductos = $sql2->fetchALL(PDO::FETCH_ASSOC);

$total_articulos_db = $sql2->rowCount();
//echo $total_articulos_db;
$paginas = $total_articulos_db / 20;
$paginas = ceil($paginas);
//echo $paginas;
$articulos_x_pagina = 20;

if (!$_GET) {
  header('Location:usuarios_lab.php?pagina=1');
}

if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
  header('Location:usuarios_lab.php?pagina=1');
}

$iniciar = ($_GET['pagina'] - 1) * $articulos_x_pagina;

$sql_articulos = 'SELECT * FROM usuarios LIMIT :inicar,:narticulos';
$sentencia_articulos = $pdo->prepare($sql_articulos);
$sentencia_articulos->bindParam(':inicar', $iniciar, PDO::PARAM_INT);
$sentencia_articulos->bindParam(':narticulos', $articulos_x_pagina, PDO::PARAM_INT);
$sentencia_articulos->execute();

$resultado_usuarios = $sentencia_articulos->fetchAll();


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
    <title>Biomedical - USUARIOS (LABORATORIO)</title>

    <?php include 'templates/header.php';?>

                    <div class="main-nav d-none d-lg-block">
                        <nav class="site-navigation text-right text-md-center" role="navigation">
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li class=""><a href="home_lab.php">INVENTARIO</a></li>
                                <li ><a href="ventas_lab.php">VENTAS</a></li>
                                <li class="active"><a href="usuarios_lab.php">USUARIOS</a></li>
                                <li><a href="profile_lab.php"><?php echo $datos_usuario['nombre'];?></a></li>
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

        <br>
        <br>

        <div class="container">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand"></a>
                <form class="d-flex" action="filtrado_usuarios.php" method="$_GET">
                    <input class="form-control me-2" type="search" placeholder="" aria-label="Search" name="table_search" id="busqueda">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
    </div>


<div class="container">
    <div class="table-responsive-md">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>NO.</th>
                        <th>NOMBRE</th>
                        <th>RIF</th>
                        <th>ESTADO</th>
                        <th>TELEFONO</th>
                        <th>POSTAL</th>
                        <th>EMAIL</th>
                        <th>
                            <center> TIPO USUARIO </center>
                        </th>
                        <th>FECHA DE REGISTRO</th>
                        <th>PRIVILEGIO</th>


                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($resultado_usuarios as $producto) { ?>
                            <form action="privilegio_logica.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">

                                <td><?php echo $producto['id']; ?></td>
                                <td><?php echo $producto['nombre']; ?></td>
                                <td><?php echo $producto['rif']; ?></td>
                                <td>
                                    <center><?php echo $producto['estado']; ?></center>
                                </td>
                                <td><?php echo $producto['telefono']; ?></td>
                                <td><?php echo $producto['postal']; ?></td>
                                <td><?php echo $producto['email']; ?></td>
                                <td><center><?php echo $producto['Tipo_usuario']; ?></center></td>
                                

                                <td><?php echo $producto['fecha_Registro']; ?></td>
                                <td><button type="submit" class="btn btn-md btn-outline-info">Cambiar</button></td>
                            </form>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            </div>
    </div>
        </div>
    </div>

    <div class="row mt-5">
    <div class="col-md-12 text-center">
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
            <a class="page-link" href="usuarios_lab.php?pagina=<?php echo $_GET['pagina'] - 1 ?>" tabindex="-1" aria-disabled="true">Anterior</a>
          </li>

          <?php for ($i = 0; $i < $paginas; $i++) : ?>

            <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>"><a class="page-link" href="usuarios_lab.php?pagina=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>

          <?php endfor ?>


          <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>">
            <a class="page-link" href="usuarios_lab.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">Siguiente</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>


    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        })
    </script>
    <?php include 'templates/pie.php';?>
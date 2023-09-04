<?php include 'global_pdo/conexion.php';
session_start();

$id_usuario = $_SESSION['usuario']['id'];

$sql = $pdo->prepare("SELECT * FROM usuarios where id = $id_usuario");
$sql->execute();
$datos_usuario = $sql->fetch();


$errors = array();


$id = $_GET["modificar"];

$sentencia = $pdo->prepare("SELECT * FROM productos WHERE id=:id");
$sentencia->bindParam(':id', $id);
$sentencia->execute();
$producto = $sentencia->fetch(PDO::FETCH_LAZY);

$txtProducto = $producto['nombre'];
$txtPrecio = $producto['precio'];
$txtCantidad = $producto['cantidad'];
$txtDescripcion = $producto['descripcion'];
$txtCategoria = $producto['categoria'];
$foto = $producto['imagen'];

$fecha_vencimiento = $producto['fecha_vencimiento'];
$numero_productos = $producto['numero_productos'];
$num_cajas_lote = $producto['num_cajas_lote'];



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
    <title>Biomedical - MODIFICACIÓN (LABORATORIO)</title>
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



    <br>
    <br>


    <div class="container" style="background-color: #C6D1DD; padding:5%; color:black; border-radius:4%;font-family:Verdana, Geneva, Tahoma, sans-serif;">
        <center>
            <h2>Modificación del Producto</h2>
        </center>
        <br>

        <center><img src="images/icons/edit.png" alt="" width="150px"></center>
        <hr>

        <br>
        <br>

        <form class="needs-validation" novalidate action="modificar_logica.php" method="POST" autocomplete="off" enctype="multipart/form-data">
        <input type="hidden" name="txtID" id="id" class="form-control" value="<?php echo $id; ?>" required>   
        
        <div class="form-row">
                <div class="col-md-4 mb-3">
                    <strong><label for="validationTooltip01">NOMBRE</label></strong>
                    <input type="text" class="form-control" id="validationTooltip01" placeholder="" value="<?php echo $txtProducto; ?>" name="txtProducto" required required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationTooltip02">PRECIO</label>
                    <input type="text" class="form-control" id="validationTooltip02" placeholder=""  value="<?php echo $txtPrecio; ?>" name="txtPrecio" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationTooltip02">CANTIDAD</label>
                    <input type="text" class="form-control" id="validationTooltip02" placeholder="" value="<?php echo $txtCantidad; ?>" name="txtCantidad" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <img class="img-fluid rounded mx-auto d-block" style="width:200px; height:auto; max-width: 100%;"  src="<?php echo $foto; ?>" alt="" style="margin-bottom: 2.5%;">


                <input type="file" id="foto" accept="image/*" class="form-control" value="<?php echo $foto; ?>" name="foto">
                <br>
                <br>

                <div class="col-md-4 mb-3">
                    <label for="validationTooltip02">FECHAS</label>
                    <input type="text" class="form-control" id="validationTooltip02" placeholder="" value="<?php echo $fecha_vencimiento; ?>" name="fecha_vencimiento" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationTooltip02">NUMERO DE PRODUCTO</label>
                    <input type="text" class="form-control" id="validationTooltip02" placeholder="" value="<?php echo $numero_productos; ?>" name="numero_productos" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationTooltip02">CAJAS TOTALES POR LOTE</label>
                    <input type="text" class="form-control" id="validationTooltip02" placeholder="" value="<?php echo $num_cajas_lote; ?>" name="num_cajas_lote" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip03">DESCRIPCIÓN</label>
                        <textarea name="txtDescripcion" class="form-control" id="" cols="28" rows="2"><?php echo $txtDescripcion;?></textarea>
                        <div class="invalid-tooltip">
                            Please provide a valid city.
                        </div>
                    </div>
                    
                    
                    <div class="col-md-6 mb-3">

                        <div class="form-group">
                            <label for="">CATEGORIA</label>
                            <select class="form-control" name="txtCategoria" id="" value="<?php echo $txtCategoria; ?>" required>
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
                </div>  
                   
            </div>
            <center><button class="btn btn-outline-success" type="submit">Modificar</button></center>
            <br>
            <center><a href="home_lab.php"><button class="btn btn-outline-danger" type="button">Volver</button></a></center>

        </form>


    </div>


    <?php include 'templates/pie.php'; ?>
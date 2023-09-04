<?php include 'global_pdo/conexion.php';
include 'login/global/funcs.php';
session_start();

if (isset($_SESSION['usuario'])) {
} else {

    header('location:login/index.php');
}

$id_usuario = $_SESSION['usuario']['id'];

$sql = $pdo->prepare("SELECT * FROM usuarios where id = $id_usuario");
$sql->execute();
$datos_usuario = $sql->fetch();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Biomedical - PERFIL</title>

    <?php include 'templates/header.php'; ?>
    <link rel="stylesheet" href="css/profile.css">


    <div class="main-nav d-none d-lg-block">
        <nav class="site-navigation text-right text-md-center" role="navigation">
            <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class=""><a href="home_lab.php">INVENTARIO</a></li>
                <li><a href="ventas_lab.php">VENTAS</a></li>
                <li><a href="usuarios_lab.php">USUARIOS</a></li>
                <li class="active"><a href="profile_lab.php"><?php echo $datos_usuario['nombre']; ?></a></li>
        </nav>
    </div>


    <style>
        #iconos {
            position: relative;
            right: 30%;
        }
    </style>
    <div class="icons">
        
        <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>

        <a href="login/salir.php"><img src="images/icons/salir.png" height="25px" width="25px" alt="Cerrar Sesion" style="position: relative; bottom:5%;"></a>

    </div>
    </div>
    </div>
    </div>


    <style>
       

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="home_lab.php">HOME</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">PERFIL</strong></div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="main-body">

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="<?php echo $datos_usuario['foto']; ?>" alt="Admin" class="rounded-circle" width="170">
                                <div class="mt-3">
                                    <h4><?php echo $datos_usuario['nombre']; ?></h4>
                                    <p class="text-secondary mb-1"></p>
                                    <p class="text-muted font-size-sm"></p>
                                    <a name="" id="" class="btn btn-outline-info btn-sm" href="profile_edit.php?id_usuario=<?php echo $id_usuario; ?>" role="button">EDITAR</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">NOMBRE</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $datos_usuario['nombre']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">CORREO</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $datos_usuario['email']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">TELEFONO</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $datos_usuario['telefono']; ?>
                                </div>
                            </div>
                            <hr>                                                   
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">DIRECCIÓN</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $datos_usuario['direccion']; ?>
                                </div>
                            </div>
                            <hr>                                                   
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">RIF</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $datos_usuario['rif']; ?>
                                </div>
                            </div>
                            <hr>                                                   
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">ESTADO</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $datos_usuario['estado']; ?>
                                </div>
                            </div>
                            <hr>                                                   
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">CODIGO POSTAL</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $datos_usuario['postal']; ?>
                                </div>
                            </div>
                            <hr>                                                   
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">FECHA DE REGISTRO</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $datos_usuario['fecha_Registro']; ?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    




<!--

    <div class="site-section">
        <div class="container">
            <div class="container emp-profile">
                <form method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-img">
                                <img src="<?php echo $datos_usuario['foto']; ?>" alt="" />
                                <div class="file btn btn-lg btn-primary">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-head">
                                <h5>
                                    <b><?php echo $datos_usuario['nombre']; ?></b>
                                </h5>
                                <h6>
                                    J - <?php echo $datos_usuario['rif']; ?>
                                </h6>

                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Información</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Dirección</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a href="profile_edit.php?id_usuario=<?php echo $id_usuario; ?>"><input type="button" class="profile-edit-btn" name="btnAddMore" value="EDITAR"></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-work">

                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label></label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php //echo $datos_usuario['id']; 
                                                ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>NOMBRE</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $datos_usuario['nombre']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>CORREO ELECTRONICO</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $datos_usuario['email']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>TELEFONO</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $datos_usuario['telefono']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>RIF</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $datos_usuario['rif']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>ESTADO</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $datos_usuario['estado']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>CODIGO POSTAL</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $datos_usuario['postal']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>DIRECCIÓN</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $datos_usuario['direccion']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Fecha de Registro</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $datos_usuario['fecha_Registro']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label></label>
                                        </div>
                                        <div class="col-md-6">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label></label><br />
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>-->



    <?php include 'templates/pie.php'; ?>
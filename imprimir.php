<?php

include 'global_pdo/conexion.php';
include 'carrito.php';
include 'login/global/funcs.php';


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>FACTURA</title>
    <link rel="stylesheet" href="css/factura.css" media="all" />
  </head>
  <body>

    

    <header class="clearfix">
      <div id="logo">
        <img src="login/img/logo1.png">
      </div>
      <div id="company">
        <h2 class="name">Biomedical</h2>
        <div>Prolongacion Circunvalacion no.2 av.16 guaijra.</div>
        <div>(412) 555-6666</div>
        <div> @gmail.com</div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Dirigido a:</div>
          <?php if(isset($_SESSION['usuario'])){ ?>
          <h2 class="name"><?php echo $_SESSION['usuario']['nombre'];?></h2>

          <div class="email"></div>
        </div>
        <div id="invoice">
          <h1>FACTURA</h1>
          <div class="date">FECHA DE EMISIÓN: <?php echo date("d"),"/",date("m"),"/",date("y");?></div>
          <div class="date"></div>
          <?php }?>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no""></th>
            <th class="desc"><b>Producto</b></th>
            <th class="unit"><b>Precio</b></th>
            <th class="qty"><b>Cantidad</b></th>
            <th class="total"><b>Total</b></th>
            
          </tr>
        </thead>

        <?php $total = 0;
               
               ?>
               
       <?php foreach ($_SESSION['CARRITO'] as $indice => $productos) { ?>

        
        <tbody>
          <tr>
           
           <td class="no"></td>
            
            <td class="desc"><?php echo $productos['nombre']; ?></td>
            <td class="unit"><center>$<?php echo $productos['precio']; ?></center></td>
            <td class="qty"><center><?php echo $productos['cantidad']; ?></center></td>
            <td class="total"><center>$<?php echo number_format($productos['precio'] * $productos['cantidad'], 2);  ?></center></td>
          </tr>
          <?php $total = $total + ($productos['precio'] * $productos['cantidad']); ?>
          <tr>

          <?php } ?>
            <td colspan="2"></td>
            <td colspan="2"><b>TOTAL</b></td>
            <td>$<?php echo number_format($total, 2); ?></td>
          </tr>
        </tfoot>
      </table>


      <div id="thanks">Gracias por Preferirnos! </div>

     
    </main>
    <?php 
                                                
                                            
                                                foreach($_SESSION['CARRITO'] as $indice=>$producto){
                                                    unset($_SESSION['CARRITO'][$indice]);} 
                                                    ?>

    <script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
  </body>
</html>


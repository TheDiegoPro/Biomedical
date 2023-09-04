<?php 
session_start();

$mensaje="";
$mensaje2="";

// ESTE PHP ES TODO EL CODIGO QUE PERMITE EL FUNCIONAMIENTO DEL CARRITO

//CONDICION QUE DICE QUE SI ES PRESIONADO EL BTN ACCION SE VA A EJECUTAR UN SWTICH PARA EVALUAR LOS CASOS
if(isset($_POST['btnaccion'])){
    switch($_POST['btnaccion']){
    
      //CASO AGREGAR: DESENCRIPTA LOS VALORES PREVIAMENTE ENCRIPTADO CON FINES DE SEGURIDAD Y DE NO PODER ALTERAR LOS VALORES DE LA BASE DE DATOS
      //HAY QUE RECORDAR QUE CADA CAMPO DE LA BASE DE DATOS QUE TENGA EL METODO OPENSSLL_ENCRYPT TIENE QUE SER DESENCRIPTADO PARA SER LEIDO CORRECTAMENTE
        case 'agregar':
        if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
           $ID=openssl_decrypt($_POST['id'],COD,KEY);
           $mensaje.="ok id correcto".$ID."</br>"; 
        }else{$mensaje.="id incorecto".$ID."</br>";}


        if(is_string( openssl_decrypt($_POST['imagen'],COD,KEY))){
         $imagen=openssl_decrypt($_POST['imagen'],COD,KEY);
         $mensaje.="ok nombre correcto ".$imagen."</br>";
      }else{$mensaje.="nombre incorecto".$imagen."</br>"; break;}

    
        if(is_string( openssl_decrypt($_POST['nombre'],COD,KEY))){
            $nombre=openssl_decrypt($_POST['nombre'],COD,KEY);
            $mensaje.="ok nombre correcto ".$nombre."</br>";
         }else{$mensaje.="nombre incorecto".$nombre."</br>"; break;}
    
         if(is_numeric( openssl_decrypt($_POST['precio'],COD,KEY))){
            $precio=openssl_decrypt($_POST['precio'],COD,KEY);
            $mensaje.="ok precio correcto".$precio."</br>";
         }else{$mensaje.="precio incorecto".$precio."</br>"; break;}
    
         if(is_numeric($_POST['cantidad'])){
            $cantidad=($_POST['cantidad']);
            $mensaje.="ok cantidad correcto".$cantidad."</br>";
         }else{$mensaje.="cantidad incorecto".$cantidad."</br>"; break;}
         
       
        if(is_numeric( openssl_decrypt($_POST['tb'],COD,KEY))){
           $tb=openssl_decrypt($_POST['tb'],COD,KEY);
           $mensaje.="ok id correcto".$tb."</br>";
        }else{$mensaje.="id incorecto".$tb."</br>";}

        if($cantidad > $tb){

         $mensaje="La cantidad seleccionada no puede ser mayor a la Disponible";

        }else{

    
         If(!isset($_SESSION['CARRITO'])){
    
            $productos=array(
                'ID'=>$ID,
                'imagen'=>$imagen,
                'nombre'=>$nombre,
                'precio'=>$precio,
                'cantidad'=>$cantidad,
                'tb'=>$tb

            );
            $_SESSION['CARRITO'][0]=$productos;
            $mensaje="Producto agregado al carrito";

         }else{
            
            $idProductos=array_column($_SESSION['CARRITO'],"ID");

            //PROCESO PARA SABER SI YA EL PRODUCTO FUE SELECCIONADO O NO
            if(in_array($ID,$idProductos)){
               
               $mensaje= "El Producto ya ha sido Seleccionado...";
            }else{


             $numeroproductos=count($_SESSION['CARRITO']);
             $productos=array(
                'ID'=>$ID,
                'imagen'=>$imagen,
                'nombre'=>$nombre,
                'precio'=>$precio,
                'cantidad'=>$cantidad,
                'tb'=>$tb
                
            );
            $_SESSION['CARRITO'][$numeroproductos]=$productos;
            $mensaje="Producto agregado al carrito";
         } 
         
         if($cantidad > $tb){
            
            $mensaje2 ="La cantidad seleccionada no puede ser mayor a la Disponible.";

         }

         }
        // $mensaje=print_r($_SESSION,true);
      }
        break;

               //ESTE ES EL CASO ELIMINAR,QUE PERMITE ELIMINAR LOS PRODUCTOS MEIDANTE EL BOTON ELIMINAR
                case "eliminar":
                    if(is_numeric( openssl_decrypt($_POST['id'],COD,KEY))){
                      $ID=openssl_decrypt($_POST['id'],COD,KEY);
                     
                      foreach($_SESSION['CARRITO'] as $indice=>$producto){
                           if($producto['ID']==$ID){
                               unset($_SESSION['CARRITO'][$indice]);
                               $mensaje = "Producto Eliminado!";
                
                           }
                
                      }
                
                   }else{
                      $mensaje.="id incorecto".$ID."</br>";
                     
                     }
                    break;
                


    }

  

}

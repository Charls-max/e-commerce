<?php

include_once 'conexion.php';

//LEER
$sql_leer = 'SELECT * FROM productos';
$gsent = $pdo->prepare($sql_leer);
$gsent->execute();
$resultado = $gsent->fetchAll();

//var_dump($resultado);

//AGREGAR 
if($_POST){
    $codigo =  $_POST['codigo'];
    $descripcion = $_POST['descripcion'];

    $sql_agregar = 'INSERT INTO productos (codigo,descripcion) VALUES (?,?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    $sentencia_agregar->execute(array($codigo,$descripcion));

    //cerramos conexión base de datos y sentencia
    $sentencia_agregar = null;
    $pdo = null;
    echo 'Agregado';
    header('location:index.php');

}

if($_GET){
    $id = $_GET['id'];
    $sql_unico = 'SELECT * FROM productos WHERE id=?';
    $gsent_unico = $pdo->prepare($sql_unico);
    $gsent_unico->execute(array($id));
    $resultado_unico = $gsent_unico->fetch();
    //var_dump($resultado_unico);
    $gsent_unico = null;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/a790fabeaf.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <title>Local#</title>
  <style>
    .w3-sidebar a {
      font-family: "Roboto", sans-serif
    }

    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .w3-wide {
      font-family: "Montserrat", sans-serif;
    }
  </style>
</head>

<!-- <body class="w3-content" style="max-width:1200px"> -->
<body class="w3-row">   

  <!-- Sidebar/menu -->
  <!-- * class w3-top; w3-center; etc -->
  <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
    <div class="w3-container w3-display-container w3-padding-16 w3-center">
      <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
      <!-- <h3 class="w3-wide"><b>LOGO</b></h3> -->
      <!-- <img src="../img/logo-tiny.png" alt="logo"> -->      
      <i class="w3-jumbo fas fa-house-user"></i>
    </div>
    <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
      <a href="#" class="w3-bar-item w3-button">Polos</a>
      <a href="#" class="w3-bar-item w3-button">Vestidos</a>
      <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
        Buzos <i class="fa fa-caret-down"></i>
      </a>
      <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
        <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Marca
          #</a>
        <a href="#" class="w3-bar-item w3-button">Marca #</a>
        <a href="#" class="w3-bar-item w3-button">Marca #</a>
        <a href="#" class="w3-bar-item w3-button">Marca #</a>
      </div>
      <a href="#" class="w3-bar-item w3-button">Casacas</a>
      <a href="#" class="w3-bar-item w3-button">Ropa de GYM</a>
      <a href="#" class="w3-bar-item w3-button">Blazers</a>
      <a href="#" class="w3-bar-item w3-button">Zapatos</a>
    </div>
    <!-- <a href="#footer" class="w3-bar-item w3-button w3-padding">Contacto</a> -->
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding"
      onclick="document.getElementById('newsletter').style.display='block'">Novedades</a>
    <a href="#footer" class="w3-bar-item w3-button w3-padding">Contacto</a>
  </nav>

  <!-- Menu superior en pequeñas pantallas -->
  <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
    <div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i
        class="fa fa-bars"></i></a>
  </header>

  <!-- Efector de apertura sidebar en pantallas pequeñas -->
  <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu"
    id="myOverlay"></div>

  <!-- !CONTENIDO! -->
  <div class="w3-main" style="margin-left:250px">

    <!-- Pantallas pequeñas -->
    <div class="w3-hide-large" style="margin-top:83px"></div>

    <!-- Superior -->
    <header class="w3-container w3-xlarge">
      <p class="w3-left">Buzos</p>
      <p class="w3-right">
        <i class="fa fa-shopping-cart w3-margin-right"></i>
        <i class="fa fa-search"></i>
      </p>
    </header>

    <!-- Imange Principal -->
    <div class="w3-display-container w3-container">
      <img src="../img/alianza.png" alt="Buzo de Alianza" style="width:100%">
      <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
        <h1 class="w3-jumbo w3-hide-small">Buzos hombre</h1>
        <h1 class="w3-hide-large w3-hide-medium">New arrivals</h1>
        <h1 class="w3-hide-small">COLECCION 2020</h1>
        <p><a href="#jeans" class="w3-button w3-black w3-padding-large w3-large">Lo quiero</a></p>
      </div>
    </div>

    <div class="w3-container w3-text-grey" id="jeans">
      <p>8 variedades</p>
    </div>

    <!-- Grilla del producto -->
    <div class="w3-row w3-grayscale">

      <div class="w3-col l3 s6">
        <!-- <div class="w3-container">
          <img src="../img/alianza2.png" style="width:100%">
          <p>Alianza Lima<br><b>S/. 24.99</b></p>
        </div> -->
        <!-- Inicio de Reemplazo del div precedente -->
        <div class="w3-container">
          <div class="w3-display-container">
            <img src="../img/alianza2.png" style="width:100%" alt="Buzo AL 2">
            <!-- <span class="w3-tag w3-display-topleft">Ultimos en stock</span> -->
            <div class="w3-display-middle w3-display-hover">
              <button class="w3-button w3-black">Lo quiero<i class="fa fa-shopping-cart"></i></button>
            </div>
          </div>
          <p>Alianza Lima<br><b>S/. 24.99</b></p>
        </div>
        <!-- Fin de Reemplazo del div precedente -->

        <!-- <div class="w3-container">
          <img src="../img/nike.png" style="width:100%">
          <p>Nike Sports<br><b>S/. 29.99</b></p>
        </div> -->
        <!-- Inicio de Reemplazo del div precedente -->
        <div class="w3-container">
          <div class="w3-display-container">
            <img src="../img/nike.png" style="width:100%">
            <!-- <span class="w3-tag w3-display-topleft">Ultimos en stock</span> -->
            <div class="w3-display-middle w3-display-hover">
              <button class="w3-button w3-black">Lo quiero<i class="fa fa-shopping-cart"></i></button>
            </div>
          </div>
          <p>Nike Sports<br><b>S/. 29.99</b></p>
        </div>
        <!-- Fin de Reemplazo del div precedente -->
      </div>

      <div class="w3-col l3 s6">
        <div class="w3-container">
          <div class="w3-display-container">
            <img src="../img/nike2.png" style="width:100%">
            <span class="w3-tag w3-display-topleft">Ultimos en stock</span>
            <div class="w3-display-middle w3-display-hover">
              <button class="w3-button w3-black">Lo quiero<i class="fa fa-shopping-cart"></i></button>
            </div>
          </div>
          <p>Nike modelo #<br><b>S/. 19.99</b></p>
        </div>

        <!-- <div class="w3-container">
          <img src="../img/nike3.png" style="width:100%">
          <p>Nike modelo #<br><b>S/. 20.50</b></p>
        </div> -->
        <!-- Inicio de Reemplazo del div precedente -->
        <div class="w3-container">
          <div class="w3-display-container">
            <img src="../img/nike3.png" style="width:100%">
            <!-- <span class="w3-tag w3-display-topleft">Ultimos en stock</span> -->
            <div class="w3-display-middle w3-display-hover">
              <button class="w3-button w3-black">Lo quiero<i class="fa fa-shopping-cart"></i></button>
            </div>
          </div>
          <p>Nike modelo #<br><b>S/. 20.50</b></p>
        </div>
        <!-- Fin de Reemplazo del div precedente -->
      </div>

      <div class="w3-col l3 s6">
        <!-- <div class="w3-container">
          <img src="../img/nike4.png" style="width:100%">
          <p>Nike modelo #<br><b>S/. 23.50</b></p>
        </div> -->
        <!-- Inicio de Reemplazo del div precedente -->
        <div class="w3-container">
          <div class="w3-display-container">
            <img src="../img/nike4.png" style="width:100%">
            <!-- <span class="w3-tag w3-display-topleft">Ultimos en stock</span> -->
            <div class="w3-display-middle w3-display-hover">
              <button class="w3-button w3-black">Lo quiero<i class="fa fa-shopping-cart"></i></button>
            </div>
          </div>
          <p>Nike modelo #<br><b>S/. 23.50</b></p>
        </div>
        <!-- Fin de Reemplazo del div precedente -->

        <div class="w3-container">
          <div class="w3-display-container">
            <img src="../img/nike7.png" style="width:100%">
            <span class="w3-tag w3-display-topleft">Oferta</span>
            <div class="w3-display-middle w3-display-hover">
              <button class="w3-button w3-black">Lo quiero<i class="fa fa-shopping-cart"></i></button>
            </div>
          </div>
          <p>Nike modelo #<br><b class="w3-text-red">S/. 14.99</b></p>
        </div>
      </div>

      <div class="w3-col l3 s6">
        <!-- <div class="w3-container">
          <img src="../img/nike5.png" style="width:100%">
          <p>Nike modelo #<br><b>S/. 16.99</b></p>
        </div> -->
        <!-- Inicio de Reemplazo del div precedente -->
        <div class="w3-container">
          <div class="w3-display-container">
            <img src="../img/nike5.png" style="width:100%">
            <!-- <span class="w3-tag w3-display-topleft">Ultimos en stock</span> -->
            <div class="w3-display-middle w3-display-hover">
              <button class="w3-button w3-black">Lo quiero<i class="fa fa-shopping-cart"></i></button>
            </div>
          </div>
          <p>Nike modelo #<br><b>S/. 16.99</b></p>
        </div>
        <!-- Fin de Reemplazo del div precedente -->

        <!-- <div class="w3-container">
          <img src="../img/nike6.png" style="width:100%">
          <p>Nike modelo #<br><b>S/. 21.99</b></p>
        </div> -->
        <!-- Inicio de Reemplazo del div precedente -->
        <div class="w3-container">
          <div class="w3-display-container">
            <img src="../img/nike6.png" style="width:100%">
            <!-- <span class="w3-tag w3-display-topleft">Ultimos en stock</span> -->
            <div class="w3-display-middle w3-display-hover">
              <button class="w3-button w3-black">Lo quiero<i class="fa fa-shopping-cart"></i></button>
            </div>
          </div>
          <p>Nike modelo #<br><b>S/. 21.99</b></p>
        </div>
        <!-- Fin de Reemplazo del div precedente -->

      </div>

    </div>

    <!-- Suscripcion -->
    <div class="w3-container w3-black w3-padding-32">
      <h1>Novedades</h1>
      <p>Para ofertas y descuentos especiales:</p>
      <p><input class="w3-input w3-border" type="text" placeholder="E-mail" style="width:100%"></p>
      <button type="button" class="w3-button w3-red w3-margin-bottom">Enviar</button>
    </div>

    <!-- Footer -->     
     <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
      <div class="w3-row-padding w3-auto">
         <div style="visibility: hidden" class="w3-col s1">
          <h4>No se muestra</h4>
          <p><a href="#">About us</a></p>
          <p><a href="#">We're hiring</a></p>
          <p><a href="#">Support</a></p>
          <p><a href="#">Find store</a></p>
          <p><a href="#">Shipment</a></p>
          <p><a href="#">Payment</a></p>
          <p><a href="#">Gift card</a></p>
          <p><a href="#">Return</a></p>
          <p><a href="#">Help</a></p>
        </div>

        <div class="w3-col w3-center w3-margin-left s4">
          <h4>Contacto</h4>
          <p>Preguntas o dudas?.</p>
          <form action="/action_page.php" target="_blank">
            <p><input class="w3-input w3-border" type="text" placeholder="Nombre" name="Name" required></p>
            <p><input class="w3-input w3-border" type="text" placeholder="E-mail" name="Email" required></p>
            <p><input class="w3-input w3-border" type="text" placeholder="Asunto" name="Subject" required></p>
            <p><input class="w3-input w3-border" type="text" placeholder="Mensaje" name="Message" required></p>
            <button type="submit" class="w3-button w3-block w3-black">Enviar</button>
          </form>
        </div>

        <div class="w3-col w3-right w3-margin-right s4">
          <h4>Nosotros</h4>
          <p><i class="fa fa-fw fa-map-marker"></i>ChiziStore</p>
          <p><i class="fa fa-fw fa-phone"></i> 999999999</p>
          <p><i class="fa fa-fw fa-envelope"></i> ex@mail.com</p>
          <h4>Aceptamos</h4>
          <p><i class="fa fa-fw fa-cc-amex"></i> Paypal</p>
          <p><i class="fa fa-fw fa-credit-card"></i> Visa y Mastercard</p>
          <br>
          <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
          <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
          <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
          <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
          <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
          <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
        </div>
      </div>
    </footer>
  

    <div class="w3-black w3-center w3-padding-24">Powered by <a href="#" title="Carlos Avellaneda" target="_blank"
        class="w3-hover-opacity">IT Developer</a></div>

    <!-- End page content -->
  </div>

  <!-- Promo -->
  <div id="newsletter" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
      <div class="w3-container w3-white w3-center">
        <i onclick="document.getElementById('newsletter').style.display='none'"
          class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
        <h2 class="w3-wide">OFERTAS</h2>
        <p>Unase a nuestro listado de ofertas.</p>
        <p><input class="w3-input w3-border" type="text" placeholder="E-mail"></p>
        <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom"
          onclick="document.getElementById('newsletter').style.display='none'">Suscribase</button>
      </div>
    </div>
  </div>

  <script>
    // Acordion 
    function myAccFunc() {
      var x = document.getElementById("demoAcc");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else {
        x.className = x.className.replace(" w3-show", "");
      }
    }

    // Clicar en "Jeans" link para abrir el acordion demo
    document.getElementById("myBtn").click();


    // Abriendo y cerrando sidebar
    function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
      document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
      document.getElementById("myOverlay").style.display = "none";
    }

    </script>

    <!-- Deshabilitando clic derecho -->
    <script type="text/javascript">
        document.oncontextmenu = function () { return false; }
    </script>    

</body>

</html>

<?php 

//cerramos conexión base de datos y sentencia
$pdo = null;
$gsent = null;

?>
<!DOCTYPE html>

<?php
require_once 'Shipper.php';
$obShipper = new Shipper();
$datos;
$mensaje = "";

if (isset($_GET['id'])) {
    
    $mensaje = "";
    $obShipper->setID($_GET['id']);
    $datos = $obShipper->SelectOne();
    
    while ($registro = $datos->fetch_assoc()) {
        $obShipper->setID($registro["ShipperID"]);
        $obShipper->setCompanyName($registro["CompanyName"]);
        $obShipper->setPhone($registro["Phone"]);
    
    }
} else {
    if (isset($_POST['id'])) {
        
        $obShipper->setID($_POST['id']);
        $obShipper->setCompanyName($_POST['CompanyName']);
        $obShipper->setPhone($_POST['Phone']);
     

        $mensaje = $obShipper->Update();
        
   }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pag Editar</title>
        <!-- 
        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>
        <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <i class="fas fa-laptop-code"></i>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Opciones del menú -->
            <div class="collapse navbar-collapse" id="navbarsPractica">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">SHIPPERS</a>
                    </li>
                </ul>
            </div>
            <!-- Fin Opciones del menú -->
        </nav>
        <!-- Fin Barra de navegación -->

        <br>

        <!-- Contenido de la página -->
        <main role="main">
            <div class="container">
                <a href="index.php" class="nav-link text-info text-right"><i class="fas fa-arrow-left"></i>&nbsp;Regresar</a>
                <h1>EDICION DE TRANSPORTISTA</h1>
                <hr>
                <h3>EDITAR:</h3>
                <br>
                <!-- Formulario para modificar al usuario -->
                <form class="needs-validation row justify-content-between" action="Editar.php" method="POST">
              
                <div>
                      <div class="form-row">
                     
                 <div class="col-md-12 mb-3">
                        
                        <label for="CompanyName">Company Name</label>
                        <input type="text" class="form-control" id="validationTooltip01" name="CompanyName" value="<?php echo $obShipper->getCompanyName(); ?>" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row ">
                    <div class="col-md-10 mb-3">
                        
                        <label for="Phone">Phone</label>
                        <input type="text" class="form-control" id="validationTooltip01" name="Phone" value="<?php echo $obShipper->getPhone(); ?>" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    
                </div>
              
                    <div class="d-flex justify-content-between">
                <button class="btn btn-warning" type="submit">Modificar</button>
                <input type="hidden" name="id" value="<?php echo $obShipper->getID(); ?>">
                  </div>
                </div> 
            </form>
 
                <!-- Fin Formulario para modificar  -->
                <?php
                if($mensaje){
                    echo '
                    <div class="alert alert-success mt-3" role="alert">
                    '.$mensaje.'
                   </div>';
                }
                ?>
            </div>
        </main>
        <!-- Fin Contenido de la página -->
   
        <!-- JS Bootstrap -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>        
    </body>
</html>
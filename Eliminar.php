<!DOCTYPE html>

<?php
require_once 'Shipper.php';
$obShipper = new Shipper();
$datos;
$mensaje = "";

if (isset($_GET['id'])) {
    $mensaje = "";
    $obShipper->setId($_GET['id']);
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
        
           $mensaje = $obShipper->Delete();
        
    } else {
        header('Location: index.php');
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Práctica: Sistema de Usuarios Básico</title>
        <!-- CSS Font Awesome -->
        <link rel="stylesheet" href="css/all.css">
        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>
        <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <i class="fas fa-laptop-code"></i>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsPractica" aria-controls="navbarsPractica" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Opciones del menú -->
            <div class="collapse navbar-collapse" id="navbarsPractica">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php"> SHIPPERS</a>
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
                <h1>Eliminacion de Tansportista</h1>
                <hr>
                <h3>¿Está seguro de que desea borrar a este Transportista?</h3>
                <!-- Formulario para modificar  -->
               <form class="needs-validation row justify-content-center" action="Eliminar.php" method="POST">
              
                <div>
                      <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" id="validationTooltip03" name="id"value="<?php echo $obShipper->getID(); ?>">
                        <div class="invalid-tooltip">
                            Please provide a valid company.
                        </div>
                    </div>
                 <div class="col-md-6 mb-3">
                        
                        <label for="CompanyName">Company Name</label>
                        <input type="text" class="form-control" id="validationTooltip01" name="CompanyName"value="<?php echo $obShipper->getCompanyName(); ?>" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row ">
                    <div class="col-md-6 mb-3">
                        
                        <label for="Phone">Phone</label>
                        <input type="text" class="form-control" id="validationTooltip01" name="Phone"value="<?php echo $obShipper->getPhone(); ?>" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    
                </div>
              
                    <div class="d-flex justify-content-between">
                <button class="btn btn-danger" type="submit">Borrar</button>
                  </div>
                </div> 
            </form>
                <!-- Fin Formulario para modificar al usuario -->
        <?php
                if($mensaje){
                   echo '<div class=" justify-content-center d-flex">
                    <div class="alert alert-success col-md-6 mt-3" role="alert">
                    '.$mensaje.'
                   </div></div>';
                }
                ?>
                
            </div>
        </main>
        <!-- Fin Contenido de la página -->

        
        <!-- JS Bootstrap -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>        
    </body>
</html>
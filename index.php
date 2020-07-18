<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CHEPPERS</title>
        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/dashboard.css">
    </head>
    <body>
        
        <!-- Fin Contenido de la página -->
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse" >
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
              <a class="nav-link active" style="color:#fff" href="Crear.PHP">
              <span data-feather="home">Crear Transportista</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <i class="fas fa-laptop-code"></i>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsPractica" aria-controls="navbarsPractica" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

           
        </nav>
        <!-- Fin Barra de navegación -->

        <br>

        <!-- Contenido de la página -->
        <main role="main">
            <div class="container">
                <h1>SHIPPERS</h1>
               
                <br>
                <h3> Datos de Transportista</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">COMPANY NAME</th>
                            <th scope="col">PHONE</th>
                            <th style="text-align: center;" scope="col">OPTION</th>
                        </tr>
                    </thead>
                     
                    <tbody>
                        <?php
                        require_once 'Shipper.php';
                        $obShipper= new Shipper();
                        $datos=$obShipper->SelectAll();
                        if($datos->num_rows >0){
                            while($registro=$datos->fetch_assoc()){
                                echo '<tr>';                             
                                echo '<td>'.$registro["ShipperID"].'</td>';
                                echo '<td>'.$registro["CompanyName"].'</td>';
                                echo '<td>'.$registro["Phone"].'</td>';                                  
                                                           
                                echo '<td style="text-align: center;">
                                <a href="Editar.PHP?id='.$registro["ShipperID"].'"> <button type="button" class="btn btn-warning">Modificar</button> </span></a> | 
                                <a href="Eliminar.php?id='.$registro["ShipperID"].'"> <button type="button" class="btn btn-danger">Eliminar</button></span></a>
                                 
                                </td>';
                               
                                echo '</tr>';
                                         
                            }
                        }
                        ?> 
                    </tbody>
                    
                </table>
                  <hr>
                  <div>
                      <a href="Crear.PHP" class="btn btn-primary mb-2"><strong>CREAR TRANSPORTISTA</strong></a>
                </div>
            </div>
        </main>
      
      
      
  </div>
</div>
       
        <!-- JS Bootstrap -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>        
    </body>
</html>
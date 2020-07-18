<!doctype html>
<html>
    <head> 
        <title> Crear </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="col-md-4  d-flex justify-content-start ">
           
            <a href="index.php"  class="btn btn-link ">Regresar</a>
               
       </div>
        <div class="container" >
            
            <form class="needs-validation row justify-content-center" action="Crear.PHP" method="POST">
              
                <div>
                     <div  class="d-flex flex-column bd-highlight mb-3">
                 <h1 class="p-3 mb-2 bg-secondary text-white" style="text-align: center">CREAR TRANSPORTISTA</h1>
                </div>
                      <div class="form-row">
                    <div class="col-md-8 mb-5">
                        <label for="validationTooltip03">Company Name</label>
                        <input type="text" class="form-control" id="validationTooltip03" name="CompanyName">
                        <div class="invalid-tooltip">
                            Please provide a valid company.
                        </div>
                    </div>
                 
                </div>
                <div class="form-row ">
                    <div class="col-md-6 mb-5">
                        
                        <label for="validationTooltip01">Phone</label>
                        <input type="text" class="form-control" id="validationTooltip01" name="Phone" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                    
                </div>
              
                    <div class="d-flex justify-content-between">
                <button class="btn btn-primary" type="submit">CREAR</button>
                  </div>
                </div> 
            </form>
                <?php
                if(isset($_POST["CompanyName"])&& isset($_POST["Phone"])){
                    require_once 'Shipper.php';
                    $obShipper = new Shipper();
                    $obShipper->setcompanyName ($_POST["CompanyName"]);
                    $obShipper->setphone ($_POST["Phone"]);
                    $resultado= $obShipper->Insert();
                    echo $resultado;
                }
                ?>
        </div>
    </body>


</html>
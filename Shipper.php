<?php


class Shipper {
    private $ID;
    private $ShipperID;
    private $CompanyName;
    private $Phone;
    public function __construct() {
        $this->ID=0;
        $this->CompanyName="";
        $this->Phone="";
    }
    public function getID() {
        return $this->ID;
    }
    public function setID($pID) {
        $this->ID= $pID;
    }
      public function getCompanyName() {
        return $this->CompanyName;
    }
    public function setCompanyName($pcompanyName) {
        $this->CompanyName= $pcompanyName;
    }
      public function getPhone() {
        return $this->Phone;
    }
    public function setPhone($pphone) {
        $this->Phone= $pphone;
    }
    public function SelectAll() {
        $conn= new mysqli("localhost","root","","northwind");
        if($conn->connect_error){
            die("Error al conectarse a la BD".$conn->connect_error);
        }
        $sql="SELECT ShipperID,CompanyName,Phone FROM shippers ";
        $result=$conn->query($sql);
        $conn->close();
        return $result;
    }
     public function Insert() {
        $conn= new mysqli("localhost","root","","northwind");
        if($conn->connect_error){
            die("Error al conectarse a la BD".$conn->connect_error);
        }
        $sql="INSERT INTO shippers(CompanyName,Phone )VALUES('$this->CompanyName','$this->Phone');";
        $result=$conn->query($sql);
        if($result){
            $conn->close();
        return "Los valores han sido agregados";} else {
                 $conn->close();
                 
        return "Error al ingresar los datos"; 
            }
        }
    public function SelectOne() {
        $conn= new mysqli("localhost","root","","northwind");
        if($conn->connect_error){
            die("Error al conectarse a la BD".$conn->connect_error);
        }
        $sql="SELECT ShipperID,CompanyName,Phone FROM shippers WHERE ShipperID=".$this->ID.";";
        $result=$conn->query($sql);
            $conn->close();
            return $result;
        
            }
    public function Update() {
        $conn= new mysqli("localhost","root","","northwind");
        if($conn->connect_error){
            die("Error al conectarse a la BD".$conn->connect_error);
        }
        $sql="UPDATE shippers SET CompanyName='".$this->CompanyName."',Phone='".$this->Phone."'  WHERE ShipperID=".$this->ID.";";
        $result=$conn->query($sql);
        if($result){
            $conn->close();
        return "usuario modificado";} else {
    $conn->close();
        return "usuario no modificado";}

        }
         public function DELETE() {
        $conn= new mysqli("localhost","root","","northwind");
        if($conn->connect_error){
            die("Error al conectarse a la BD".$conn->connect_error);
        }
        $sql="DELETE FROM shippers WHERE ShipperID=".$this->ID.";";
        $result=$conn->query($sql);
        if($result){
            $conn->close();
            return "Transportista Borrado";
        }else{
            $conn->close();
            return "Transportista No Borrado";
        }
            }
        }
    
?>
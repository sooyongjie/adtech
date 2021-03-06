<?php

//The Subject interface
interface RegisterCheck
{
    public function request(string $name, string $pass): void;
}

//The RealSubject, the final output / execution
class RealInsert implements RegisterCheck
{
    public function request(string $name, string $pass): void
    {
        include("../db_connect.php");
        $insertquery = "INSERT INTO client (`clientName`, `password`, `status`) VALUES ('$name', '$pass', 1)";
        $db->query($insertquery);
    }
}

//The Proxy has an interface identical to the RealSubject.
class CheckingInformation implements RegisterCheck
{
    private $realinsert;

    //Constructor
    public function __construct(RealInsert $realinsert)
    {
        $this->realinsert = $realinsert;
    }

    public function request(string $Newuser, string $Newpass): void
    {
        include("../db_connect.php");
        $query = "SELECT * FROM `client` WHERE `clientName` = '$Newuser'";
        $result = $db->query($query);

        if ($result->num_rows == 1){
            $_SESSION['errMsg'] = "The username has been taken.";
            header("Location: register.php"); 
        }else{
            $this->realinsert->request($Newuser, $Newpass);
        }
    }
}
?>
<?php
abstract class Filter
{
    abstract public function FilterMethod(): Status;
    public function getFilter(): string
    {
        $product = $this->FilterMethod();
        $result = $product->Filter($arr=[]);

        return $result;
    }
}
/*
class ConcreteFilterComplete extends Filter
{
    public function FilterMethod(): Status
    {
        return new CompletedService();
    }
}


class ConcreteFilterProg extends Filter
{
    public function FilterMethod(): Status
    {
        return new OnGoing();
    }
}

class ConcreteFilterPaid extends Filter
{
    public function FilterMethod(): Status
    {
        return new PaidService();
    }
}
*/
class ConcreteFilterPend extends Filter
{
    public function FilterMethod(): Status
    {
        return new PendingService();
    }
}

interface Status
{
    public function Filter($arr=[]): string;
}
/*
class CompletedService implements Status
{
    public function Filter(): string
    {
        include_once("../db_connect.php");
        $query = "SELECT * FROM request WHERE `uid` = 1 AND `status` = 'Completed'";
        $result = $db->query($query);
        $arr = array();
        if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) {
        array_push($arr, $row['reqID'], $row['category'],$row['description'],$row['status']);
        echo $arr[$row][0] . "\n";
        echo $arr[$row][1]. "\n";
        echo $arr[$row][2]. "\n";
        echo $arr[$row][3]. "\n";
        }
    }
        return "";
    }
}

class OnGoing implements Status
{
    public function Filter(): string
    {
        include_once("../db_connect.php");
        $Aquery = "SELECT * FROM request WHERE `uid` = 1 AND `status` = 'Assigned'";
        $result = $db->query($Aquery);
        $arr = array();
        if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) {
        array_push($arr, $row['reqID'], $row['category'],$row['description'],$row['status']);
        echo $arr[$row][0] . "\n";
        echo $arr[$row][1]. "\n";
        echo $arr[$row][2]. "\n";
        echo $arr[$row][3]. "\n";
        }
    }
        return "";
    }
}

class PaidService implements Status
{
    public function Filter(): string
    {
        include_once("../db_connect.php");
        $Pquery = "SELECT * FROM request WHERE `uid` = 1 AND `status` = 'Paid'";
        $result = $db->query($Pquery);
        $arr = array();
        if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) {
        array_push($arr, $row['reqID'], $row['category'],$row['description'],$row['status']);
        echo $arr[$row][0] . "\n";
        echo $arr[$row][1]. "\n";
        echo $arr[$row][2]. "\n";
        echo $arr[$row][3]. "\n";
        }
    }
        return "";
    }
}
*/
class PendingService implements Status
{
    public function Filter($arr=[]): string
    {
        include_once("../db_connect.php");
        $Pequery = "SELECT * FROM request WHERE `uid` = 1 AND `status` = 'Pending'";
        $result = $db->query($Pequery);
        if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) {
        $arr = array($row['reqID'], $row['category'],$row['description'],$row['status']);
        print_r($arr);
        }
    }
        return $arr;
    }
}

function client(Filter $f){
    $f->FilterMethod();
    echo $f->getFilter();
}

echo "\n\n";
//client(new ConcreteFilterProg());
//client(new ConcreteFilterPaid());
//client(new ConcreteFilterPaid());
client(new ConcreteFilterPend());
?>
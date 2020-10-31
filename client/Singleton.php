<?php
if(isset($_POST['clientName'])) {
    $_POST['clientName'] = $_POST['clientName'];
}
else if(isset($_SESSION['clientName'])) {
    $_POST['clientName'] = $_SESSION['clientName'];
}

class Account
{
    private static $instances = [];
    private $a;
    //private $c;

    protected function __construct() {
        $this->a = $_POST['clientName'];
    }

    public static function getInstance(): Account
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }
/*
    public function setwork($id){
        $this->c = $id;
    }
*/
    public function getwork(){
        return $this->a;
    }

/*
    public function getwork2(){
        return $this->c;
    }
*/
}
?>
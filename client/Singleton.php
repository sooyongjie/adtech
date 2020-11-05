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

    protected function __construct() {
        $this->a = $_POST['clientName'];
    }

    public static function getInstance(): Account
    {
        $OwnClass = static::class;
        if (!isset(self::$instances[$OwnClass])) {
            self::$instances[$OwnClass] = new static();
        }

        return self::$instances[$OwnClass];
    }

    public function getUserName(){
        return $this->a;
    }
}
?>
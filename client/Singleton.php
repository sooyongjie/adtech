<?php

class Account
{
    private static $instances = [];
    private $a;

    protected function __construct() {
        $this->a = $_SESSION['clientName'];
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
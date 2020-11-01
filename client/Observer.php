<head>
<link rel="stylesheet" type="text/css" href="../css/fontawesome/all.css">
</head>
<?php
interface NotificationBell{

// Attach an observer to the subject.
public function attach(Observer $observer);

// Notify all observers about an event.
public function notify();
}

interface Observer{
public function call(NotificationBell $subject);
}

//Publisher
class Subject implements NotificationBell
{
    public $num;
    private $observers;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(Observer $observer): void
    {
        $this->observers->attach($observer);
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->call($this);
        }
    }

    public function CompletedService(): void
    {
        include_once("../db_connect.php");
        $query = "SELECT * FROM request WHERE `uid` = '".$_SESSION['cID']."' AND `status` = 'Completed'";
        $result = $db->query($query);
        if ($result->num_rows > 0) { 
            $this->num = $result->num_rows;
        }else{
            $this->num = 0;
        }
        $this->notify();
    }
}

//Concrete Sub
class ConcreteObserverA implements Observer
{
    public function call(NotificationBell $subject): void
    {
        if($subject->num > 0){
        ?>
        <div class="bell" onclick="location.href='completed-request.php'">
        <i class="fas fa-bell"><span class="badge"><?php echo $subject->num ?></span></i>
        </div>
        <?php
        }
    }
}

?>

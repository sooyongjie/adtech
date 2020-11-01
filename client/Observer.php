<head>
<link rel="stylesheet" type="text/css" href="../css/fontawesome/all.css">
</head>
<?php
interface Sub{

// Attach an observer to the subject.
public function attach(Ob $observer);

// Notify all observers about an event.
public function notify();
}

interface Ob{
public function call(Sub $subject);
}

//Publisher
class Subject implements Sub
{
    public $num;
    private $observers;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(Ob $observer): void
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
class ConcreteObserverA implements Ob
{
    public function call(Sub $subject): void
    {
        if($subject->num > 0){
        ?>
        <i class="fas fa-bell" onclick="location.href='completed-request.php'"><span class="badge">new</span></i>
        <?php
        }
    }
}

function Notification(){
    $subject = new Subject();
    $o1 = new ConcreteObserverA();
    $subject->attach($o1);
    $subject->CompletedService();
  }
  <p class = "bell"><?php Notification() ?></p>
?>

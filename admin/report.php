<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/admin/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/detail-view.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin/report.css" />
    <?php
    include_once("../head.php");
    ?>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg=="
      crossorigin="anonymous"
    ></script>
</head>

<body>
    <?php
    $file = "report.php";
    include_once("nav.php");
    $_SESSION['curDate'] = date('Y-m-d');
    if(isset($_POST['startDate'])) {
        $_SESSION['startDate'] = $_POST['startDate']."-01";
        $_SESSION['endDate'] = date('Y-m-t', strtotime($_POST['startDate']."-01"));
    } else {
        $_SESSION['startDate'] = date('Y-m')."-01";
        $_SESSION['endDate'] = date('Y-m-t');
    }
    ?>
    <div class="container">
        <div class="content overtime">
            <div class="heading">
                <h2>Overtime; Temp: <?php echo $_SESSION['startDate'].", ".$_SESSION['endDate']; ?></h2>
                <form action="report.php" method="post" class="search-bar">
                    <input type="month" name="startDate" value="<?php echo date('Y-m', strtotime($_SESSION['startDate']."-01")) ?>">
                    <i class="far fa-search" onclick="document.querySelector('.search-bar').submit()"></i>
                </form>
            </div>
            <div class="card">
                <?php 
                include_once("func/report.php");
                $overtime = getOvertime();
                if($overtime) {
                    ?>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Hours</th>
                            <th>Total</th>
                        </tr> <?php
                    foreach($overtime as $row) { ?>
                        <tr>
                            <td><?php echo $row["empName"] ?></td>
                            <td><?php echo $row["hours"] ?></td>
                            <td><?php echo $row["rate"] ?></td>
                        </tr>
                        <?php
                    } ?>
                    </table>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="content">
            <h2>Feedback Ratings</h2>
            <div class="card report-card">
                <form id='ratings'>
                    <?php 
                    $rating = getRatings();
                    // echo implode(" ", $array)
                    if($rating) {
                        foreach($rating as $row) { ?>
                            <input type="hidden" value="<?php echo $row ?>"> <?php
                        }
                        ?>
                        <canvas id="ratingsChart" width="9" height="8"></canvas>
                        <?php
                    }
                    ?>
                </form>
            </div>
        </div>
        <div class="content">
            <h2>Workload</h2>
            <div class="card report-card">
                <?php 
                $workload = getWorkload(); 
                if($workload) {
                    ?>
                    <table>
                        <tr>
                            <th>Employee</th>
                            <th>Number of Jobs</th>
                        </tr>
                    <?php
                    foreach($workload as $row) { ?> 
                        <tr>
                            <td><?php echo  $row['empName'] ?></td>
                            <td><?php echo  $row['NumberOfJobs'] ?></td>
                        </tr> <?php
                    } ?>
                    </table> <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>
<script src="js/report.js"></script>
<script src="js/replace-window-state.js"></script>
</html>
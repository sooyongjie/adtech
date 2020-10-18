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
    ?>
    <div class="container">
        <div class="content overtime">
            <h2>Overtime</h2>
            <div class="card">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Hours</th>
                        <th>Total</th>
                    </tr>
                    <?php 
                    include_once("func/report.php");
                    $overtime = getOvertime();
                    // echo implode(" ", $array)
                    foreach($overtime as $row) { ?>
                        <tr>
                            <td><?php echo $row["empName"] ?></td>
                            <td><?php echo $row["hours"] ?></td>
                            <td><?php echo $row["rate"] ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="content">
            <h2>Feedback Ratings</h2>
            <div class="card report-card">
                <?php 
                include_once("func/report.php");
                $rating = getRatings();
                // echo implode(" ", $array)
                echo "<form id='ratings'>";
                foreach($rating as $row) { ?>
                    <input type="hidden" value="<?php echo $row ?>">
                    <?php
                }
                echo "</form>";
                ?>
                <canvas id="ratingsChart" width="9" height="8"></canvas>
            </div>
        </div>
        <div class="content">
            <h2>Something else</h2>
            <div class="card report-card">
                <p>adw</p>
            </div>
        </div>
    </div>
</body>
<script src="js/report.js"></script>
</html>
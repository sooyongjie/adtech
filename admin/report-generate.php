<!DOCTYPE html>
<html lang="en">

<head>
    <title>Report</title>
    <link rel="stylesheet" type="text/css" href="../css/admin/report-generate.css" />
    <?php
    include_once("../head.php");
    session_start();
    ?>
</head>

<body>
    
    <div class="container">
        <div class="report-info">
            <h3><?php echo date("F Y", strtotime($_SESSION['startDate'])) ?> Report</h3>
            <p>Start date: <?php echo $_SESSION['startDate'] ?></p>
            <p>End date: <?php echo $_SESSION['endDate'] ?></p>
        </div>
        <div class="overtime">
            <h4>Overtime</h4>
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
            } ?>
        </div>
        <div class="ratings">
            <h4>Feedback Ratings</h4>
            <?php
            // ratings
            $rating = getRatings();
            // echo implode(" ", $array)
            if($rating) { 
                ?>
                <table>
                    <tr>
                        <th>Stars</th>
                        <th>Count</th>
                    </tr>
                    <tr>
                        <td>1 Star</td>
                        <td><?php echo $rating["1"] ?></td>
                    </tr>
                    <tr>
                        <td>2 Star</td>
                        <td><?php echo $rating["2"] ?></td>
                    </tr>
                    <tr>
                        <td>3 Star</td>
                        <td><?php echo $rating["3"] ?></td>
                    </tr>
                    <tr>
                        <td>4 Star</td>
                        <td><?php echo $rating["4"] ?></td>
                    </tr>
                    <tr>
                        <td>5 Star</td>
                        <td><?php echo $rating["5"] ?></td>
                    </tr>
                </table>
                <?php
            }
            ?>
        </div>
        <div class="comments">
            <h4>Feedback Comments</h4>
            <?php 
            $comments = getComments(); 
            if($comments) {
                ?>
                <table>
                    <tr>
                        <th>Feedback ID</th>
                        <th>Comments</th>
                    </tr>
                <?php
                foreach($comments as $row) { ?> 
                    <tr>
                        <td><?php echo  $row['feedbackNo'] ?></td>
                        <td><?php echo  $row['feedbackComment'] ?></td>
                    </tr> <?php
                } ?>
                </table> <?php
            }
            ?>
        </div>
        <div class="workload">
            <h4>Workload</h4>
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
        <?php insertToDatabase(); ?>
    </div>
</body>
<script src="js/replace-window-state.js"></script>
<script>
    window.addEventListener('load', () => {
        promptPrint()
    })
    promptPrint = () => {
        if (confirm("Do you want to print the report?")) {
            window.print()
        }
    }
</script>
</html>
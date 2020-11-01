<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/admin/dashboard.css" />
    <?php
    include_once("../head.php");
    ?>
</head>

<body>
    <?php
    $file = "feedback.php";
    include_once("nav.php");
    ?>
    <div class="container">
        <div class="heading">
            <h2>Feedback</h2>
            <form action="feedback-search.php" method="post" class="search-bar" autocomplete="off">
                <input type="number" name="search" placeholder="Search requests">
                <i class="far fa-search" onclick="document.getElementById('.search-bar').submit()"></i>
            </form>
        </div>        
        <div class="card new-requests">
            <?php
            include_once("func/feedback.php");
            $feedback = getAllFeedback();
            ?>
            <table>
                <tr>
                    <th onclick="document.querySelector('#feedbackNo').submit()">Feedback#</th>
                    <th onclick="document.querySelector('#reqID').submit()">Request ID</th>
                    <th onclick="document.querySelector('#feedbackComment').submit()">Comments</th>
                    <th onclick="document.querySelector('#feedbackRating').submit()">Rating</th>
                    <th class="tr-button-heading"></th>
                </tr>
            <?php
            foreach($feedback as $row) {
                ?>
                <tr id="<?php echo "row-".$row['feedbackNo'] ?>" class="<?php echo $row['feedbackNo'] ?>" onmouseover="showButton(this)" onmouseout="hideButton(this)">
                    <td><?php echo '#'.$row['feedbackNo'] ?></td>
                    <td>
                        <form action="request-view.php" method="post" id="<?php echo $row['reqID'] ?>">
                            <input type="hidden" name="reqID" value="<?php echo $row['reqID'] ?>">
                        </form>
                        <a onclick="document.getElementById('<?php echo $row['reqID'] ?>').submit()"><?php echo '#'.$row['reqID'] ?></a>
                    </td>
                    <td><?php echo $row['feedbackComment'] ?></td>
                    <td><?php echo $row['feedbackRating'] ?></td>
                    <td class="submit-btn">
                        <form action="" method="POST">
                            <input type="hidden" name="reqID" value="<?php echo $row['reqID'] ?>">
                        </form> 
                    </td>
                </tr>
                <?php
            }
            ?>
            </table>
            <div class="pagination">
                <?php 
                $count = countRows(); 
                $num = round($count[0]['count']/5);
                if ($num == 0) {
                    $num = 1;
                }
                for ($i = 0; $i < $num; $i++) {
                    ?>
                    <button>
                        <a href="?offset=<?php echo $i ?>"><?php echo $i+1 ?></a>
                    </button>
                    <?php
                }
                ?>
                </div>
            </div>
        </div>
    <form action="func/sort.php" method="post" id="feedbackNo">
        <input type="hidden" name="sort" value="feedbackNo">
        <input type="hidden" name="page" value="feedback.php">
    </form>
    <form action="func/sort.php" method="post" id="reqID">
        <input type="hidden" name="sort" value="reqID">
        <input type="hidden" name="page" value="feedback.php">
    </form>
    <form action="func/sort.php" method="post" id="feedbackComment">
        <input type="hidden" name="sort" value="feedbackComment">
        <input type="hidden" name="page" value="feedback.php">
    </form>
    <form action="func/sort.php" method="post" id="feedbackRating">
        <input type="hidden" name="sort" value="feedbackRating">
        <input type="hidden" name="page" value="feedback.php">
    </form>
</body>
<script src="js/dashboard.js"></script>

</html>
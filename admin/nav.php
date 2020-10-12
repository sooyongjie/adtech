<nav>
    <h1>Ad<span>tech</span></h1>
    <?php
    if(basename($file, ".php") == "dashboard") {
        ?>
        <div class="button active">
            <div class="button-l" onclick="location.href='dashboard.php'">
                <i class="fas fa-clipboard-list fa-lg "></i>
                <p>Requests</p>
            </div>
            <div class="button-r">
                <i class="fas fa-angle-right"></i>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="button">
            <div class="button-l" onclick="location.href='dashboard.php'">
                <i class="fas fa-clipboard-list fa-lg "></i>
                <p>Requests</p>
            </div>
        </div>
        <?php
    }
    if(basename($file, ".php") == "feedback") {
    ?>
    <div class="button">
        <div class="button-l" onclick="location.href='feedback.php'">
            <i class="fas fa-comment-alt"></i>
            <p>Feedback</p>
        </div>
        <div class="button-r">
            <i class="fas fa-angle-right"></i>
        </div>
    </div>
    <?php
    } else {
        ?>
        <div class="button">
            <div class="button-l" onclick="location.href='feedback.php'">
                <i class="fas fa-comment-alt"></i>
                <p>Feedback</p>
            </div>
        </div>
        <?php
    }
    if(basename($file, ".php") == "report") {
        ?>
        <div class="button">
            <div class="button-l" onclick="location.href='report.php'">
                <i class="fas fa-chart-bar"></i>
                <p>Report</p>
            </div>
            <div class="button-r">
                <i class="fas fa-angle-right"></i>
            </div>
        </div>
        <?php
        } else {
            ?>
            <div class="button">
                <div class="button-l" onclick="location.href='report.php'">
                    <i class="fas fa-chart-bar"></i>
                    <p>Report</p>
                </div>
            </div>
        <?php
        }
    ?>
</nav>
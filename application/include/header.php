<?php
include_once "../config/conn.db.php";
$hasData = false;
$sql = "SELECT *FROM reminder where user=28 and isRead='false'";
$data = array();
$conn = new DatabaseConnection();
$res = $conn->getConnection()->query($sql);
if ($res) {
    while ($rows = $res->fetch_assoc())
        $data[] = $rows;
}

if (count($data)>0)
$hasData = true;

?>

<div id="main-wrapper">

    <!--**********************************
    Nav header start
***********************************-->
    <div class="nav-header">

        <a href="../view/dashboard.php" class="brand-logo">
            e-Doctor-Appointment
            <!-- <img class="logo-abbr" src="../.././images/logo.png" alt="">
            <img class="logo-compact" src="../.././images/logo-text.png" alt="">
            <img class="brand-title" src="../.././images/logo-text.png" alt=""> -->
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>

    <!--**********************************
    Nav header end
***********************************-->

    <!-- Header start
        ***********************************-->
    <div class="header">
        <div class="header-content">

            <nav class="navbar navbar-expand">
                <?php
                if ($hasData) {
                ?>
                    <div class="alert alert-success w-100 mt-3">
                        <i class="fa-solid fa-bell mr-2"></i>
                        <strong><a href='#' class='text-dark fw-bold'>Reminder!</a></strong> You have an appointment reminder.
                    </div>
                <?php
                }

                ?>

                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="search_bar dropdown">

                            <div class="dropdown-menu p-0 m-0">

                            </div>
                        </div>
                    </div>

                    <ul class="navbar-nav header-right">

                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link profile" href="../">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>

                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
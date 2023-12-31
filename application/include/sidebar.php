<!--**********************************
            Sidebar start
        ***********************************-->

<?php

include_once "../config/conn.db.php";
$_current_id = $_SESSION['user_id'];
$hasData = false;
$sql = "SELECT COUNT(*) as count FROM reminder where user='$_current_id' and isRead='false'";
$data = array();
$conn = new DatabaseConnection();
$res = $conn->getConnection()->query($sql);
if ($res) {
        $row = $res->fetch_assoc();
        $data = array("count" => $row['count']);
}


// if its admin
if ($_SESSION['type'] == "admin") {
?>
        <div class="quixnav">
                <div class="quixnav-scroll">
                        <ul class="metismenu" id="menu">
                                <li class="nav-label first text-light">Super Admin</li>
                                <li><a href="../view/dashboard.php" aria-expanded="false">
                                                <i class="fa-solid fa-gauge"></i><span class="nav-text">Dashboard</span></a>

                                </li>
                                <li><a href="../view/doctors.php" aria-expanded="false">
                                                <i class="fa-solid fa-user-doctor"></i><span class="nav-text">Doctors</span></a>

                                </li>
                                <li><a href="../view/admin.php" aria-expanded="false">
                                                <i class="fa-solid fa-user-pen"></i><span class="nav-text">Admins</span></a>

                                </li>
                                <li><a href="../view/hospital.php" aria-expanded="false">
                                                <i class="fa-solid fa-hospital"></i></i><span class="nav-text">Hospitals</span></a>
                                </li>
                                <li><a href="../view/patient.php" aria-expanded="false">
                                                <i class="fa-solid fa-suitcase-medical"></i><span class="nav-text">Patients</span></a>

                                </li>
                                <li><a href="../view/profision.php" aria-expanded="false">
                                                <i class="fa-solid fa-user-tie"></i><span class="nav-text">Profession</span></a>

                                </li>
                                <li><a href="../view/schedule.php" aria-expanded="false"><i class="fa-solid fa-calendar-days"></i><span class="nav-text">Schedule</span></a>
                                </li>
                                <li><a href="../view/diagnose.php" aria-expanded="false">
                                                <i class="fa-solid fa-capsules"></i><span class="nav-text">Diagnose</span></a>

                                </li>
                                <li><a href="../view/apointment.php" aria-expanded="false">
                                                <i class="fa-solid fa-calendar-check"></i><span class="nav-text">Appointment</span></a>
                                </li>

                        </ul>
                        <ul class="metismenu" id="menu">
                                <li class="nav-label first text-light">Other Settings</li>
                                <li><a href="../view/report.doctors.php" aria-expanded="false">
                                                <i class="fa-solid fa-flag"></i><span class="nav-text">Report</span></a>

                                </li>
                                <li><a href="../view/reminders_01.php" aria-expanded="false">
                                                <i class="fa-solid fa-bell"></i><span class="nav-text">reminders</span></a>

                                </li>
                                <li><a href="../view/reviews.doctors.php" aria-expanded="false">
                                                <i class="fa-solid fa-star"></i><span class="nav-text">Reviews</span></a>

                                </li>
                                <li><a href="../view/profile.php" aria-expanded="false">
                                                <i class="fa-solid fa-user"></i><span class="nav-text">Profile</span></a>

                                </li>



                        </ul>
                </div>


        </div>


<?php

} else if ($_SESSION['type'] == "doctor") {
?>
        <div class="quixnav">
                <div class="quixnav-scroll">
                        <ul class="metismenu" id="menu">
                                <li class="nav-label first text-light">Doctor</li>
                                <li><a href="../doctor/dashboard.php" aria-expanded="false">
                                                <i class="fa-solid fa-gauge"></i><span class="nav-text">Dashboard</span></a>

                                </li>




                                <li><a href="../doctor/apointments.php" aria-expanded="false">
                                                <i class="fa-solid fa-calendar-check"></i><span class="nav-text">Appointments</span></a>
                                </li>
                                <li><a href="../doctor/schedule.php" aria-expanded="false"><i class="fa-solid fa-calendar-days"></i><span class="nav-text">Schedule</span></a>
                                </li>
                                <li><a href="../doctor/reminders.php" aria-expanded="false">
                                                <i class="fa-solid fa-bell"></i><span class="nav-text">Reminder</span></a>

                                </li>
                                <li><a href="../doctor/reviews.doctors.php" aria-expanded="false">
                                                <i class="fa-solid fa-star"></i><span class="nav-text">Reviews</span></a>

                                </li>
                                <li><a href="../doctor/report.php" aria-expanded="false">
                                                <i class="fa-solid fa-calendar-check"></i><span class="nav-text">Reports</span></a>
                                </li>

                        </ul>
                </div>


        </div>
<?php

} else if ($_SESSION['type'] == "patient") {
?>
        <div class="quixnav">
                <div class="quixnav-scroll">
                        <ul class="metismenu" id="menu">
                                <li class="nav-label first text-light">Patient</li>
                                <li><a href="../patient/active_doctors.php" aria-expanded="false">
                                                <i class="fa-solid fa-user-doctor"></i><span class="nav-text">Doctors</span></a>
                                </li>
                                <li><a href="../patient/apointment.php" aria-expanded="false">
                                                <i class="fa-solid fa-calendar-check"></i><span class="nav-text">My
                                                        Appointments</span></a>
                                </li>

                        </ul>
                        <ul class="metismenu" id="menu">
                                <li class="nav-label first text-light">other Settings</li>
                                <li><a href="../view/dashboard.php" aria-expanded="false">
                                                <i class="fa-solid fa-gauge"></i><span class="nav-text">My Profile</span></a>
                                </li>
                                <li><a href="../patient/reminders.php" aria-expanded="false">
                                                <?php
                                                if ($data['count'] == 0) {
                                                ?>
                                                        <i class="fa-solid fa-bell"></i><span class="nav-text">My Reminders</span>
                                        </a>
                                <?php
                                                } else {
                                ?>
                                        <i class="fa-solid fa-bell"></i><span class="nav-text">My Reminders &nbsp;
                                                <?php echo $data['count'] ?>
                                        </span></a>
                                <?php
                                                }


                                ?>
                                <!-- <i class="fa-solid fa-bell"></i><span class="nav-text">My Reminders</span></a> -->
                                </li>



                        </ul>
                </div>


        </div>
<?php

} else {
        header("location: ../index.php");
        exit();
}





?>

<!--**********************************
            Sidebar end
        ***********************************-->
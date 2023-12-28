<!--**********************************
            Sidebar start
        ***********************************-->

<?php

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
                <li><a href="../view/dashboard.php" aria-expanded="false">
                        <i class="fa-solid fa-gauge"></i><span class="nav-text">Report</span></a>

                </li>
                <li><a href="../view/reminders_01.php" aria-expanded="false">
                        <i class="fa-solid fa-gauge"></i><span class="nav-text">reminders</span></a>

                </li>
                <li><a href="../view/reviews.doctors.php" aria-expanded="false">
                        <i class="fa-solid fa-gauge"></i><span class="nav-text">Reviews</span></a>

                </li>
                <li><a href="../view/dashboard.php" aria-expanded="false">
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
                <li><a href="../view/dashboard.php" aria-expanded="false">
                        <i class="fa-solid fa-gauge"></i><span class="nav-text">Dashboard</span></a>

                </li>

                <li><a href="../doctor/dr_patients.php" aria-expanded="false">
                        <i class="fa-solid fa-user-doctor"></i><span class="nav-text">Patients</span></a>
                </li>

                <li><a href="../doctor/schedule.php" aria-expanded="false"><i class="fa-solid fa-calendar-days"></i><span class="nav-text">Schedule</span></a>
                </li>
                <li><a href="../doctor/dr_appointments.php" aria-expanded="false">
                        <i class="fa-solid fa-calendar-check"></i><span class="nav-text">Appointments</span></a>
                </li>
                <li><a href="../doctor/dr_appointments.php" aria-expanded="false">
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
                <li><a href="../view/dashboard.php" aria-expanded="false">
                        <i class="fa-solid fa-user-doctor"></i><span class="nav-text">Doctors</span></a>
                </li>
                <li><a href="../doctor/dr_appointments.php" aria-expanded="false">
                        <i class="fa-solid fa-calendar-check"></i><span class="nav-text">My Appointments</span></a>
                </li>

            </ul>
            <ul class="metismenu" id="menu">
                <li class="nav-label first text-light">Settings</li>
                <li><a href="../view/dashboard.php" aria-expanded="false">
                        <i class="fa-solid fa-gauge"></i><span class="nav-text">My Profile</span></a>
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
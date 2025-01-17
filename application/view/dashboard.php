<?php
include_once '../include/session.php';
include_once "../include/permission.auth.php";

Permission::checkAuthPermissionSource("admin");
include '../include/links.php';
include '../include/header.php';
include '../include/sidebar.php';


?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body bg-light">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card text-light" style="background: #525CEB;">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content text-light">
                            <div class="stat-content">
                                <div class="stat-text text-light">Total Doctors</div>
                                <div class="stat-digit text-light">
                                    <h2 class='doctors text-light fw-bold'></h2>
                                </div>
                                <i class="fa-solid fa-user-pen"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card text-light" style="background: #7E30E1;">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text text-light">Total Users</div>
                            <div class="stat-digit text-light">
                                <h2 class='admins text-light fw-bold'></h2>
                            </div>
                            <i class="fa-solid fa-user-pen"></i>
                        </div>
                        <!-- <div class="progress">
                            <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card text-light" style="background: #49108B;">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text text-light">Patients</div>
                            <div class="stat-digit text-light">
                                <h2 class='patients text-light fw-bold'></h2>
                            </div>
                            <i class="fa-solid fa-suitcase-medical"></i>
                        </div>
                        <!-- <div class="progress">
                            <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card text-light" style="background: #11235A">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text text-light">Registered Hospitals</div>
                            <div class="stat-digit text-light">
                                <h2 class='hospitals text-light fw-bold'></h2>
                            </div>
                            <i class="fa-solid fa-hospital"></i></i>
                        </div>
                        <!-- <div class="progress">
                            <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> -->
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
        </div>

        <div class="row">

            <div class="col-12">
                <div class="card bg-light border-0" style='border-radius: 18px; box-shadow: -1px 1px 53px -1px rgba(206,206,206,0.75);
-webkit-box-shadow: -1px 1px 53px -1px rgba(206,206,206,0.75);
-moz-box-shadow: -1px 1px 53px -1px rgba(206,206,206,0.75);'>

                    <div class="card-body">
                        <h5 class='fw-bold'>Pending Appointments</h5>
                        <p class='text-muted'>View Pending appointments/ active </p>

                        <div class="no-app my-2"></div>
                        <table class="table table-bordered pending">
                            <thead>
                                <tr>

                                    <th scope="col" class='fw-bold'>Date</th>
                                    <th scope="col" class='fw-bold'>Doctor</th>
                                    <th scope="col" class='fw-bold'>Patient</th>
                                    <th scope="col" class='fw-bold'>Status</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                            <tfoot>
                                <tr>

                                    <th scope="col" class='fw-bold'>Date</th>
                                    <th scope="col" class='fw-bold'>Doctor</th>
                                    <th scope="col" class='fw-bold'>Patient</th>
                                    <th scope="col" class='fw-bold'>Status</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col-12">
                <div class="card bg-light border-0" style='border-radius: 18px; box-shadow: -1px 1px 53px -1px rgba(212,224,239,0.75);
-webkit-box-shadow: -1px 1px 53px -1px rgba(212,224,239,0.75);
-moz-box-shadow: -1px 1px 53px -1px rgba(212,224,239,0.75);'>
                    <!-- <div class="card-header">
                        <h5>Unverified Doctors</h5>
                    </div> -->
                    <div class="card-body">

                        <h5 class='fw-bold' style='color: #940B92; font-weight: bolder'>unverified Doctors</h5>
                        <p class='text-muted'>View Pending accounts <a href='./doctors.php' class='btn'>view more</a> </p>
                        <hr>
                        <div class="no-unver my-2"></div>
                        <div class="row un-verify">

                        </div>

                    </div>
                </div>

            </div>

            <div class="col-12">
                <div class="card bg-light border-0" style='border-radius: 18px; box-shadow: -1px 1px 53px -1px rgba(206,206,206,0.75);
-webkit-box-shadow: -1px 1px 53px -1px rgba(206,206,206,0.75);
-moz-box-shadow: -1px 1px 53px -1px rgba(206,206,206,0.75);'>

                    <div class="card-body">
                        <h5 class='fw-bold'>Today's Schedules</h5>
                        <p class='text-muted'>only you can view (today's date)</p>
                        <div class="no-sch my-2"></div>
                        <table class="table table-bordered todays">
                            <thead>
                                <tr>

                                    <th scope="col">Date</th>
                                    <th scope="col">From Time</th>
                                    <th scope="col">To Time</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Doctor</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->

<?php
include '../include/footer.php';


?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script src='../js/jquery-3.3.1.min.js'></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="../iziToast-master/dist/js/iziToast.js"></script>
<script src="../iziToast-master/dist/js/iziToast.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(() => {

        const countRowNumbers = (tableName, label) => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/counters.api.php",
                data: {
                    action: "count",
                    table: tableName,
                },
                success: (res) => {
                    console.log(res)
                    label.html(res.rowNumber);
                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }
        const getUnverifiedDoctors = () => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/counters.api.php",
                data: {
                    action: "unverifiedDoctors",

                },
                success: (res) => {
                    console.log(res)
                    $('.no-unver').html('')
                    if (res.data.length == 0) {
                        $('.no-unver').html(`
                        <div class='alert alert-primary'>
                        <strong>currently, there are no unverified doctors</strong>
                        </div>
                        `)
                        return;
                    }

                    var tr = "<tr>"
                    res.data.forEach(value => {
                        $('.un-verify').append(`
                       <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="card text-light border-0" style='background: #537FE7'>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="info">
                                                <h6 class='text-light fw-bold'>Dr. ${value.name}</h6>
                                                <span>${value.pro_name}</span>
                                            </div>
                                            <img src="../uploads/${value.profile_image}" alt="" class="img-fluid rounded-circle" style='width: 70px; height: 70px'>

                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                       `)
                    })

                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }
        const getPendingAppointments = () => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/counters.api.php",
                data: {
                    action: "getPendingAppointments",

                },
                success: (res) => {
                    console.log(res)
                    $('.no-app').html('')
                    if (res.data.length == 0) {
                        $('.no-app').html(`
                        <div class='alert alert-primary'>
                        <strong>currently, there are no pending appointments</strong>
                        </div>
                        `)
                        return;
                    }
                    var tr = "<tr>"
                    res.data.forEach(value => {
                        tr += `<td>${value.appo_date}</td>`
                        tr += `<td>Dr, ${value.Doctor}</td>`
                        tr += `<td>${value.Patient}</td>`

                        tr += `<td><span class="badge bg-danger">${value.status}</span></td>`
                        tr += '</tr>'
                    })
                    $(".pending tbody").html(tr)
                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }
        const getTodaysSchedule = () => {
            let currentDate = new Date();


            let year = currentDate.getFullYear();
            let month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Adding 1 because months are zero-based
            let day = String(currentDate.getDate()).padStart(2, '0');


            let formattedDate = `${year}-${month}-${day}`;
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/counters.api.php",
                data: {
                    action: "getTodaysSchedule",
                    date: formattedDate

                },
                success: (res) => {
                    console.log(res)
                    $('.no-sch').html('')
                    if (res.data.length == 0) {
                        $('.no-sch').html(`
                        <div class='alert alert-primary'>
                        <strong>currently, there are no today's schedule</strong>
                        </div>
                        `)
                        return;
                    }
                    var tr = "<tr>"
                    res.data.forEach(value => {
                        tr += `<td>${value.date}</td>`
                        tr += `<td>${value.from_time}</td>`
                        tr += `<td>${value.to_time}</td>`
                        tr += `<td><span class="badge rounded-pill bg-dark">${value.duration}m</span></td>`

                        tr += `<td><span class="badge bg-success">${value.Doctor}</span></td>`
                        tr += '</tr>'
                    })
                    $(".todays tbody").html(tr)
                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }


        // callers
        countRowNumbers("admins", $(".admins"))
        countRowNumbers("doctors", $(".doctors"))
        countRowNumbers("patients", $(".patients"))
        countRowNumbers("hospitals", $(".hospitals"))
        getUnverifiedDoctors()
        getPendingAppointments()
        getTodaysSchedule()


    })
</script>
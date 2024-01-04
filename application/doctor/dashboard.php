<?php
include '../include/session.php';
include_once "../include/permission.auth.php";

Permission::checkAuthPermissionSource("doctor");
include '../include/links.php';
include '../include/header.php';
include '../include/sidebar.php';
?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body bg-light">
    <!-- row -->
    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card text-light" style="background: #79155B;">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content text-light">
                            <div class="stat-text text-light">Total Appointments </div>
                            <div class="stat-digit text-light appointments">

                                8500
                            </div>
                            <!-- <i class="fa-solid fa-user-doctor"></i> -->
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card text-light" style="background: #2E4374;">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text text-light">Pending Appointments</div>
                            <div class="stat-digit text-light pending"> 7800</div>
                            <!-- <i class="fa-solid fa-user-pen"></i> -->
                        </div>
                        <!-- <div class="progress">
                            <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card text-light" style="background: #5B0888;">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text text-light">Active Appointments</div>
                            <div class="stat-digit text-light active"> 500</div>
                            <!-- <i class="fa-solid fa-suitcase-medical"></i> -->
                        </div>
                        <!-- <div class="progress">
                            <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card text-light" style="background: #004225;">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text text-light">Completed</div>
                            <div class="stat-digit text-light completed"> 900</div>
                            <!-- <i class="fa-solid fa-hospital"></i></i> -->
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
                <div class="card border-0 bg-light" style='border-radius: 18px; box-shadow: -1px 1px 53px -1px rgba(179,180,186,0.75);
-webkit-box-shadow: -1px 1px 53px -1px rgba(179,180,186,0.75);
-moz-box-shadow: -1px 1px 53px -1px rgba(179,180,186,0.75);'>
                    <div class="card-header">
                        <strong>Active Appointments</strong>
                    </div>
                    <div class="card-body body-dash">
                        <table class="table table-bordered">
                            <thead>
                                <tr>

                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>


                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card border-0 bg-light" style='border-radius: 18px; box-shadow: -1px 1px 53px -1px rgba(179,180,186,0.75);
-webkit-box-shadow: -1px 1px 53px -1px rgba(179,180,186,0.75);
-moz-box-shadow: -1px 1px 53px -1px rgba(179,180,186,0.75);'>
                    <div class="card-header">
                        <strong>Visualizations</strong>
                    </div>
                    <div class="card-body body-dash">
                        <div class="row">
                            <div class="col-6" id="chart_div">

                            </div>
                            <div class="col-6" id="calamado">

                            </div>
                        </div>
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
        google.charts.load('current', {
            'packages': ['corechart']
        });

        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawAnotherChart);

        function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Review');
            data.addColumn('number', 'Number Of Reviews');
            getReviewNumber(res => {
                res.data.forEach(value => {
                    console.log("all ", `[${value.review}, ${value.number}]`)
                    data.addRows([
                        [`${value.review}`, Number(value.number)]
                    ]);
                })

                console.log("review", res.data)
                // Set chart options
                var options = {
                    'title': 'Here is number of reviews from your appointments',
                    'width': 900,
                    'height': 540,
                    is3D: true,
                };

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);

            })


        }

        function drawAnotherChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Symptom');
            data.addColumn('number', 'Number Of symptoms');
            getDiagnosesNumber(res => {
                res.data.forEach(value => {
                    console.log("symptoms ", `[${value.name}, ${value.number}]`)
                    data.addRows([
                        [`${value.name}`, Number(value.number)]
                    ]);
                })


                console.log("review", res.data)
                // Set chart options
                var options = {
                    'title': 'The most symptoms for your appointments',
                    'width': 900,
                    'height': 540,
                    is3D: true,
                };

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.PieChart(document.getElementById('calamado'));
                chart.draw(data, options);
            })


        }



        const countRowNumbers = (tableName, label, options) => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/counters.api.php",
                data: {
                    action: "countDashboardNumbers",
                    table: tableName,

                    status: options.status,
                    getStatus: options.getStatus
                },
                success: (res) => {
                    console.log(res)
                    label.text(res.rowNumber);
                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }

        function getReviewNumber(response) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/counters.api.php",
                data: {
                    action: "countReviews",
                },
                success: (res) => {
                    response(res)
                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }

        function getDiagnosesNumber(response) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/counters.api.php",
                data: {
                    action: "countDiagnoseVisual",
                },
                success: (res) => {
                    response(res)
                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }
        const activeAppointments = () => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/appointments.api.php",
                data: {
                    action: "activeAppointments",
                },
                success: (res) => {
                    if (res.data.length > 0) {
                        var tr = '<tr>'
                        res.data.forEach(value => {
                            tr += `<td>${value.Date}</td>`
                            tr += `<td>${value.status}</td>`

                            tr += '</tr>';
                        })
                        $('.table tbody').html(tr)
                    } else {
                        $('.body-dash').html(`
                        <div class='alert alert-info'>
                        <strong>Currently, there are no active appointments available at the moment</strong>
                        </div>

                        `)
                    }

                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }
        activeAppointments()


        // callers
        countRowNumbers("appointment", $(".appointments"), {
            getStatus: "no"
        })
        countRowNumbers("appointment", $(".pending"), {
            status: "Pending",
            getStatus: "yes"
        })
        countRowNumbers("appointment", $(".active"), {
            status: "inprogress",
            getStatus: "yes"
        })
        countRowNumbers("appointment", $(".completed"), {
            status: "completed",
            getStatus: "yes"
        })




    })
</script>
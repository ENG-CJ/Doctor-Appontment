<?php
include_once '../include/session.php';
include_once "../include/permission.auth.php";

Permission::checkAuthPermissionSource("admin");
include '../include/links.php';
include '../include/header.php';
include '../include/sidebar.php';
?>

h



<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span class="ml-1">Here is a List of Appointments</span>
                </div>
            </div>
            <!-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Apointment</a></li>
                        </ol>
                    </div> -->
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Appointments</h5>
                        <button id="addNew" data-toggle="modal" data-target="#exampleModal" class="btn btn-dark float-right create">
                            <i class="fa-regular fa-flag"></i>

                            Make Appointment</button>
                    </div>
                    <div class="card-block table-border-style p-3">
                        <div class="table-responsive list_appointments">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>

                                        <th>Diagnose</th>
                                        <th>Patient</th>
                                        <th>Doctor</th>

                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>

                            </table>
                            <!-- <button class="mt-4 btn btn-success viewReminder">
                                <i class="fa-solid fa-bell mr-3"></i>
                                Reminders</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade editAppointmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <i class="fa-solid fa-circle-info mr-2"></i><strong>
                        Before making any edits to an appointment, please specify the desired profession or specialty of the doctor you are looking for.
                    </strong>
                </div>
                <hr>
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Select Profession</label>
                        <select class='profession form-control proffision_selection filterPro'>
                            <option value="">Select</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Select Doctor</label>
                        <select class='doctor form-control doctors'>
                            <option value="">Select</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Select Patient</label>
                        <select class='doctor form-control patients'>
                            <option value="">Select</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Appointment date (Doctor's schedule)</label>
                        <select class='form-control date'>
                            <option value="">Select</option>
                        </select>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="message-text" class="col-form-label">Time</label>
                        <input type="time" class="form-control time" id="recipient-name">
                        <input type="text" hidden class="form-control id" id="recipient-name">
                    </div> -->
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Diagnose</label>
                        <select class='doctor form-control diagnose'>
                            <option value="">Select</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Descriptions</label>
                        <textarea class='form-control description' placeholder="Please describe your symptoms"></textarea>
                    </div>
                    <input type='text' hidden class='id mr-2' id="show" />


                    <div class="mt-5">
                        <div class='alert alert-primary'>Reminder Method.</div>
                        <div class="d-flex">
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input method" type="radio" name="method" id="email" value="email">
                                <label class="form-check-label" for="email">Via Email</label>
                            </div>
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input method" type="radio" name="method" id="call" value="call">
                                <label class="form-check-label" for="call">Via Call</label>
                            </div>
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input method" type="radio" name="method" id="system" value="in_system">
                                <label class="form-check-label" for="system">In-System</label>
                            </div>
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input class="form-check-input method" type="radio" checked name="method" id="not" value="none">
                                <label class="form-check-label" for="not">Do not remind me</label>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-primary edit">Edit</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg viewModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View And Print</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body body-content">

            </div>
            <div class="modal-footer">
                <button type='button' class="btn btn-success print">Print</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade err-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLongTitle">
                    <i class="fa-solid fa-triangle-exclamation mr-2 text-danger"></i>
                    Printing Error
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-2">
                <div class="alert alert-danger">
                    <strong>You can only print the appointment details after the doctor has confirmed it. Printing is not available for appointments that are still inprogress confirmation</strong>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary ok">Ok</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-muted" id="exampleModalLongTitle">
                    Confirmation Status
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-2">
                <div class="my-2">
                    <strong class='text-muted'>The confirmation should be based on the status of the appointment, which can be either "In progress" or "Completed."</strong>
                </div>

            </div>
            <input type="text" hidden class='id-value'>
            <div class="modal-footer">
                <button type="button" class="btn btn-success completed">Completed</button>
                <button type="button" class="btn btn-warning inprogress">In Progress</button>
                <button type="button" class="btn btn-secondary default">Default</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade reminder-modal-email" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLongTitle">
                    Send Reminder Message
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-2">
                <div class="alert alert-danger">
                    <strong>You can only print the appointment details after the doctor has confirmed it. Printing is not available for appointments that are still inprogress confirmation</strong>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary ok">Ok</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade reminder-modal-system" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-lg bounceInLeft" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLongTitle">
                    Config Reminder Message
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-2">
                <div class="my-2">
                    <label for="">Title [Optional]</label>
                    <input type="text" name="" value="Reminder" id="title" class="form-control title">
                    <input type="text" hidden name="" class="form-control patientID">
                    <input type="text" hidden name="" class="form-control appo_id">
                </div>

                <div class="my-2">
                    <label for="">message *</label>
                    <textarea name="" id="" placeholder="Message Description (required)" cols="5" rows="6" class="message form-control"></textarea>
                </div>

                <div class="my-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input sendEmail" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Send Email Instead Of Reminder!</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-success configure">configure</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade reminder-info" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLongTitle">
                    <i class="fa-solid fa-bell text-success mr-2"></i>
                    Reminder!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-2">
                <div class="alert alert-success">
                    <strong>You have an appointment reminder.</strong><br>

                    <div class="my-3">
                        <button class="btn btn-danger markAsRead">Mark All as read</button>
                        <button class="btn btn-primary viewReminder">View</button>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">

                <button type="button" class="btn btn-primary ok">Ok</button>
            </div> -->
        </div>
    </div>
</div>
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
<script src='../printThis.js'></script>
<script src='../js/utils.js'></script>
<script>
    $(document).ready(function() {

        var canSend = false;
        $('.sendEmail').on("change", (e) => {
            canSend = e.target.checked;
            console.log(e.target.checked)
        })

        var method = "";
        $('.method').on("change", function(e) {
            method = e.target.value;
        })
        $('.viewReminder').on("click", function(e) {
            window.location.href = "./reminders.php";
        })

        $(".markAsRead").click(() => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "updateReminderData",
                },
                url: "../Api/appointments.api.php",
                success: (res) => {
                    displayToast("Reminder Marked as read", "success", 2000);
                    $(".reminder-info").modal("hide");

                    // console.log(res);
                },
                error: (res) => {
                    console.log(res);
                }
            })
        })
        var audio = new Audio("../audios/reminder.mpeg")
        const getReminderData = () => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "getReminderData",
                },
                url: "../Api/appointments.api.php",
                success: (res) => {

                    if (res.hasData) {
                        {

                            audio.play();
                            $(".reminder-info").modal("show");
                        }
                    } else {
                        $(".reminder-info").modal("hide");
                    }
                    // console.log(res);
                },
                error: (res) => {
                    console.log(res);
                }
            })
        }
        setInterval(getReminderData, 7000)


        function readPatients() {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {

                    action: "readPatientsData",
                },
                url: "../Api/patient.api.php",
                success: (res) => {
                    console.log(res);

                    var {
                        data
                    } = res;
                    var tr = "<tr>";
                    var option = "<option value=''>Select Patient</option>";
                    if (data.length > 0) {

                        data.forEach(value => {

                            option += `<option value="${value.pat_id}">${value.name}</option>`;


                        })

                        $('.patients').html(option)

                    } else {
                        var option = "<option value=''>Select Patient</option>";
                        $('.patients').html(option)

                    }




                },
                error: (err) => {
                    console.log(err);
                }
            })
        }
        readPatients()
        $(document).on("click", "a.confirm", function() {

            var id = $(this).attr("statusID");
            $('.id-value').val(id)
            $(".statusModal").modal("show")


        })
        $('.completed').click(() => updateAppointmentStatus("completed"))
        $('.inprogress').click(() => updateAppointmentStatus("inprogress"))
        $('.default').click(() => updateAppointmentStatus("Pending"))
        $('.create').click(() => window.location.href = "./active_doctors.php")



        function updateAppointmentStatus(status) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "updateAppointmentStatus",
                    status: status,
                    id: $('.id-value').val()
                },
                url: "../Api/appointments.api.php",
                success: (res) => {

                    console.log(res)
                    loadAppointments()
                    $('.statusModal').modal("hide")
                    // alert(res.message)
                },
                error: (res) => {
                    console.log(res)
                }
            })
        }

        $('.edit').click(() => {
            if ($('.doctors').val() == "" || $('.date').val() == "" || $('.diagnose').val() == "" ||
                $('.description').val() == "" || $('.patients').val() == "")
                displayToast("In order to update an appointment, please ensure that all the required fields are filled and not left empty.", "error", 4000);
            else {

                var data = {
                    date: $(".date").val(),
                    diagnose: $(".diagnose").val(),
                    dr: $(".doctors").val(),
                    pat_id: $(".patients").val(),
                    id: $(".id").val(),
                    reminder: method,
                    description: $('.description').val(),
                    action: "updateAppointment",
                }
                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    data: data,
                    url: "../Api/appointments.api.php",
                    success: (res) => {

                        console.log(res)
                        loadAppointments()
                        displayToast("Appointment Has been updated", "success", 3000);
                        $(".editAppointmentModal").modal("hide")
                    },
                    error: (res) => {
                        console.log(res)
                        displayToast(res.responseText, "error", 5000);
                    }
                })
            }
        })
        $('.doctors').change((e) => {
            if ($('.doctors').val() == "") {
                $(".date").attr("disabled", true)
                option2 = "<option value=''>Waiting...</option>"

                $('.date').css({
                    border: "1px solid grey"
                })
                $('.date').html(option2)
            } else {
                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        action: "readScheduleSelectedDoctor",
                        dr_id: $('.doctors').val()
                    },
                    url: "../Api/doctor.api.php",
                    success: (res) => {
                        if (res.data.length > 0) {
                            $(".date").attr("disabled", true)
                            option = `<option value='${res.data[0].date}'>${res.data[0].date}</option>`
                            $('.date').html(option)
                            $('.date').css({
                                border: "1px solid grey"
                            })
                        } else {

                            option2 = "<option value=''>Related Data Error (No Appointment Date)</option>"
                            $('.date').css({
                                border: "1px solid red"
                            })
                            $(".date").attr("disabled", true)
                            // $('.doctors').html(option)
                            $('.date').html(option2)
                        }
                        console.log(res)
                    },
                    error: (res) => {

                    }
                })
            }
        })
        $(".filterPro").change((e) => {
            if ($('.filterPro').val() == "") {
                loadDoctors()

                $(".date").attr("disabled", true)
                option2 = "<option value=''>Waiting...</option>"

                $('.date').css({
                    border: "1px solid grey"
                })
                $('.date').html(option2)

                $(".doctors").attr("disabled", false)


                $('.doctors').css({
                    border: "1px solid grey"
                })

            } else {
                $(".doctors").val("")
                $(".date").val("")
                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        action: "filterProfession",
                        pro: $('.filterPro').val()
                    },
                    url: "../Api/proffision.api.php",
                    success: (res) => {
                        if (res.data.length > 0) {
                            $(".doctors").attr("disabled", false)
                            $(".date").attr("disabled", true)
                            option = "<option value=''>Select Doctor</option>"
                            option2 = "<option value=''>Waiting...</option>"
                            res.data.forEach(value => {
                                option += `<option value='${value.drID}'>${value.drName}</option>`
                            })
                            $('.doctors').css({
                                border: "1px solid grey"
                            })
                            $('.date').css({
                                border: "1px solid grey"
                            })
                            $('.doctors').html(option)
                            $('.date').html(option2)
                        } else {
                            option = "<option value=''>No Doctors Found</option>"
                            option2 = "<option value=''>Related Data Error</option>"
                            $(".doctors").attr("disabled", true)
                            $(".date").attr("disabled", true)
                            $('.doctors').html(option)
                            $('.date').css({
                                border: "1px solid red"
                            })
                            $('.doctors').css({
                                border: "1px solid red"
                            })
                            $('.date').html(option2)
                        }
                        console.log(res)
                    },
                    error: (res) => {

                    }
                })
            }

        })

        function readDiagnoses() {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {

                    action: "readDiagnose",
                },
                url: "../Api/diagnose.api.php",
                success: (res) => {
                    console.log(res);

                    var {
                        data
                    } = res;
                    var tr = "<tr>";
                    var option = "<option value=''>Select Diagnose</option>";
                    if (data.length > 0) {

                        data.forEach(value => {

                            option += `<option value="${value.diganose_id}">${value.name}</option>`;


                        })
                        //  option += `<option value="all">All</option>`;

                        $('.diagnose').html(option)

                    } else {
                        var option = "<option value=''>Select Diagnose</option>";
                        $('.diagnose').html(option)

                    }




                },
                error: (err) => {
                    console.log(err);
                }
            })
        }
        readDiagnoses()

        function loadDoctors() {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/schedule.api.php",
                data: {
                    action: "loadDoctors",
                },
                success: (res) => {
                    console.log(res)

                    var htmlOptions = "<option value=''>Select Doctor</option>"
                    res.data.forEach(value => {
                        htmlOptions += `<option value='${value.dr_id}'>${value.name}</option>`
                    })
                    $(".doctors").html(htmlOptions)
                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }
        loadDoctors()

        function readEditAppointmentData(id, response) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/appointments.api.php",
                data: {
                    action: "readEditAppointmentData",
                    id: id,
                },
                success: (res) => {
                    $('.date').css({
                        border: "1px solid grey"
                    })

                    $('.date').attr("disabled", false)
                    // readSchedules()
                    console.log(res)

                    response(res)
                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }

        function getDoctorProffision() {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "readProffision",
                },
                url: "../Api/proffision.api.php",
                success: (res) => {
                    console.log(res);
                    var {
                        data
                    } = res;
                    option = ` <option value="" selected>Select</option>`
                    data.forEach(values => {
                        option += `<option value="${values.pro_name}">${values.pro_name}</option>`
                    });
                    $(".proffision_selection").html(option);
                },
                error: (err) => {
                    console.log(err);
                }
            })
        };
        getDoctorProffision()


        $(".report").click(() => window.location.href = "./report.php");
        $(".ok").click(() => $('.err-modal').modal("hide"));
        $(".print").click(() => {
            if ($(".state").text().toLocaleLowerCase() == "inprogress") {
                $('.viewModal').modal("hide")
                $('.err-modal').modal("show")
                return;
            }
            $(".body-content").printThis({
                importCSS: true
            })
        });

        $(document).on("click", "a.viewAppo", function() {
            var id = $(this).attr("viewID");
            readPrintableData(id, (res) => {
                $('.body-content').html(`
                
                                         <img src="http://localhost/Doctor-Appontment/application/uploads/logo_2.png" alt="" class="img-fluid" style='height: 260px; width: 100%;'>

                <br>
                <br>
                <br>
                <h6>Patient Details</h6>
                <table style="border-collapse: collapse; width: 100%;" class='mb-4'>
                    <thead>
                        <tr>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Name</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Gender</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Mobile</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${res.data[0].patName}</td>
                            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${res.data[0].gender}</td>
                            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${res.data[0].mobile}</td>
                            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${res.data[0].address}</td>
                        </tr>
                       
                    </tbody>
                </table>

                <h6>Appointment Details</h6>
                <table style="border-collapse: collapse; width: 100%;" class="mb-3">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">#ID</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Date</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Diagnose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${res.data[0].appo_id}</td>
                            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${res.data[0].appo_date}</td>
                            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${res.data[0].diagnose_name}</td>
                        </tr>
                       
                    </tbody>
                </table>
                <h6>Starts And Ends</h6>
                <table style="border-collapse: collapse; width: 100%;" class="mb-3">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">From Time</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">To Time</th>
                            <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${res.data[0].from_time}</td>
                            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${res.data[0].to_time}</td>
                            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">${res.data[0].duration}m</td>
                        </tr>
                       
                    </tbody>
                </table>
                <div class="my-1">
                    <strong>Card Price : </strong><span>$${res.data[0].card_price}</span>
                </div>
                <div class="my-1">
                    <strong>Confirmation Status: </strong><span class='state'>${res.data[0].status}</span>
                </div>
                <div class="my-1">
                    <strong class='text-muted'>Pointed Doctor: </strong>
                    <div class="d-flex align-items-center my-3">
                    <img src="http://localhost/Doctor-Appontment/application/uploads/${res.data[0].image}" class="img-fluid rounded-circle" style="width: 50px; height: 50px;"/>
                    <p class='mt-3 ml-2'>Dr. ${res.data[0].drName}, ${res.data[0].hosName}</p>
                    </div>


                </div>
                <hr>
                <div class="my-1">
                    <p>Processed By : <strong>Doctor Care (e-Doctor Appointment) 💖</strong></p>
                </div>
                <div class="my-2">
                    <div class="alert alert-warning">
                        <strong>Note: Please utilize this form/sheet to ensure that the correct patient is present for their scheduled appointment..</strong>
                    </div>
                </div>
                
                `)
                $('.viewModal').modal("show")

            })

        })

        function readPrintableData(id, response) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    id: id,
                    action: "readPrintableData",
                },
                url: "../Api/appointments.api.php",
                success: (res) => {
                    console.log(res)
                    response(res)
                },
                error: (res) => {
                    console.log(res)
                }
            })
        }

        function readSchedules() {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {

                    action: "readSchedules",
                },
                url: "../Api/schedule.api.php",
                success: (res) => {
                    console.log(res)
                    var op = '<option value="">Select</option>'
                    res.data.forEach(value => {
                        op += `<option value="${value.date}">${value.date}</option>`

                    })
                    $(".date").html(op)
                },
                error: (res) => {
                    console.log(res)
                }
            })
        }
        // readSchedules()
        $(document).on("click", "a.deleteAppointment", function() {
            var id = $(this).attr("delID");
            swal({
                    title: "Remove This Appointment",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            method: "POST",
                            dataType: "JSON",
                            data: {
                                id: id,
                                action: "deleteAppointment",
                            },
                            url: "../Api/appointments.api.php",
                            success: (res) => {
                                console.log(res)
                                swal("Data has been removed", {
                                    icon: "success",
                                });
                                loadAppointments();
                            },
                            error: (res) => {
                                console.log(res)
                            }
                        })

                    } else {
                        // swal("Your imaginary file is safe!");
                    }
                });


        })
        $(document).on("click", "a.editAppointment", function() {
            var id = $(this).attr("editID");


            readEditAppointmentData(id, res => {
                // readSchedules()
                var op = `<option value='${res.data[0].appo_date}'>${res.data[0].appo_date}</option>`
                console.log(res)
                const selectElement = document.querySelector('.doctors');
                let isValuePresent = false;
                for (let i = 0; i < selectElement.options.length; i++) {
                    if (selectElement.options[i].value === res.data[0].dr_id) {
                        isValuePresent = true;
                        break; // Exit the loop if the value is found
                    }
                }

                if (isValuePresent)
                    $(".doctors").val(res.data[0].dr_id)
                else
                    $(".doctors").val("")


                $(".patients").val(res.data[0].pat_id)
                $(".id").val(res.data[0].appo_id)
                $(".date").html(op)
                $('.date').attr("disabled", true)
                $(".diagnose").val(res.data[0].diagnose_id)
                $(".description").val(res.data[0].symptom_description)
                // alert(res.data[0].appo_date)

                if (res.data[0].reminder.toLocaleLowerCase() == "none") {
                    $("#none").attr("checked", true);
                    method = res.data[0].reminder
                } else if (res.data[0].reminder.toLocaleLowerCase() == "in_system") {
                    $("#system").attr("checked", true);
                    method = res.data[0].reminder
                } else if (res.data[0].reminder.toLocaleLowerCase() == "call") {
                    $("#call").attr("checked", true);
                    method = res.data[0].reminder
                } else if (res.data[0].reminder.toLocaleLowerCase() == "email") {
                    $("#email").attr("checked", true);
                    method = res.data[0].reminder
                }


                $(".editAppointmentModal").modal("show")

            })


        })

        const loadAppointments = () => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    "action": "loadAppointmentsForDoctor"
                },
                url: "../Api/appointments.api.php",
                success: (res) => {
                    var tr = "<tr>"
                    var {
                        data
                    } = res;
                    if (data.length == 0) {
                        $('.list_appointments').html(`
                       <div class="alert alert-info" role="alert">
   Currently, there are no available appointments for you.<a href="./active_doctors.php" class="alert-link">Please schedule an appointment now</a> or click <strong>Make booking</strong> Button
</div>
                        
                        `)
                        return;
                    }
                    data.forEach(value => {
                        tr += `<td>${value.appo_id}</td>`
                        tr += `<td>${value.appo_date}</td>`
                        // tr += `<td>${value.time}</td>`
                        tr += `<td>${value.diagnose}</td>`
                        tr += `<td class='patient_name'>${value.patient}</td>`
                        tr += `<td>${value.doctor}</td>`
                        if (value.status.toLowerCase() == "pending")
                            tr += `<td>
                        
                            <a class='btn btn-danger text-light confirm' statusID='${value.appo_id}'>${value.status}</a>
                            </td>`
                        else if (value.status.toLowerCase() == "completed")
                            tr += `<td >
                         <a class='btn btn-success text-light confirm' statusID='${value.appo_id}'>${value.status}</a>
                            </td>`
                        else if (value.status.toLowerCase() == "inprogress")
                            tr += `<td>
                         <a class='btn btn-warning confirm' statusID='${value.appo_id}'>${value.status}</a></td>`
                        else
                            tr += `<td>
                        
                            <a class='btn btn-danger text-light confirm' statusID='${value.appo_id}'>${value.status}</a>
                            </td>`


                        tr += `<td>
                     <a class='btn btn-danger text-light deleteAppointment' delID=${value.appo_id}><i class="fa-solid fa-rotate-left"></i></a>
                     <a class="btn btn-primary viewAppo text-light" viewID=${value.appo_id}><i class="fa-solid fa-eye"></i></a>
                     </td>`


                        tr += '</tr>'
                    })
                    $(".table tbody").html(tr);
                    $(".table").DataTable();

                    console.log("data is ", data)
                },
                error: (res) => {
                    console.log("There is an error")
                    console.log(res)
                },
            })
        }
        const loadAppointmentsForAdmin = () => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    "action": "loadAppointmentsForAdmin"
                },
                url: "../Api/appointments.api.php",
                success: (res) => {
                    var tr = "<tr>"
                    var {
                        data
                    } = res;
                    console.log("now data is ", data)
                    if (data.length == 0) {
                        $('.list_appointments').html(`
                       <div class="alert alert-info" role="alert">
   Currently, there are no available appointments.
</div>
                        
                        `)
                        return;
                    }
                    data.forEach(value => {
                        tr += `<td>${value.appo_id}</td>`
                        tr += `<td>${value.appo_date}</td>`
                        // tr += `<td>${value.time}</td>`
                        tr += `<td>${value.diagnose}</td>`
                        tr += `<td patientID="${value.pat_id}" appo_id="${value.appo_id}" stateInfo="${value.status}" reminder_data="${value.reminder}" class='patient_name' tooltip="reminder" title="click to send or configure reminder message">${value.patient}</td>`
                        tr += `<td>${value.doctor}</td>`
                        if (value.status.toLowerCase() == "pending")
                            tr += `<td>
                        <span class="badge rounded-pill bg-danger">${value.status}</span>
                          
                            </td>`
                        else if (value.status.toLowerCase() == "completed")
                            tr += `<td >
                          <span class="badge rounded-pill bg-success">${value.status}</span>
                            </td>`
                        else if (value.status.toLowerCase() == "inprogress")
                            tr += `<td>

                         <span class="badge rounded-pill bg-warning">${value.status}</span>
                         </td>`
                        else
                            tr += `<td>
                        
                             <span class="badge rounded-pill bg-danger">${value.status}</span>
                            </td>`
                        tr += `<td>
                     <a class='btn btn-success text-light editAppointment' editID=${value.appo_id}><i class="fa-solid fa-pencil"></i></a>
                     <a class="btn btn-primary viewAppo text-light" viewID=${value.appo_id}><i class="fa-solid fa-eye"></i></a>
                     </td>`


                        tr += '</tr>'
                    })
                    $(".table tbody").html(tr);
                    $(".table").DataTable();

                    console.log("data is ", data)
                },
                error: (res) => {
                    console.log("There is an error")
                    console.log(res)
                },
            })
        }
        loadAppointmentsForAdmin()

        const findSpecificReminder = (data, response) => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: data,
                url: "../Api/appointments.api.php",
                beforeSend: () => {
                    $(".configure").attr("disabled", true);
                },
                success: (res) => {
                    $(".configure").attr("disabled", false);
                    response(res)
                },
                error: (res) => {
                    displayToast(res.responseText, "error", 5000);
                    $(".configure").attr("disabled", false);
                    console.log(res)
                }
            })
        }

        $(".configure").click(() => {
            if ($(".message").val() == "")
                displayToast("Fill Required Fields", "error", 3000);
            else if (canSend) {

                var data = {
                    "title": $(".title").val(),
                    "message": $(".message").val(),
                    user_id: $(".patientID").val(),
                    action: "sendEmailPatch"
                }
                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    data: data,
                    url: "../Api/appointments.api.php",
                    beforeSend: () => {
                        $(".configure").attr("disabled", true);
                    },
                    success: (res) => {
                        $(".configure").attr("disabled", false);
                        if (res.error != "") {
                            displayToast(res.error, "error", 4000);
                            return;
                        }
                        displayToast("Email Was Sent To the Selected Patient", "success", 4000);
                        $('.reminder-modal').modal("hide");
                        readReminders();
                    },
                    error: (res) => {
                        $(".configure").attr("disabled", false);
                        displayToast(res.responseText, "error", 5000);
                        console.log(res)
                    }
                })
            } else {
                var data = {
                    "title": $(".title").val(),

                    "message": $(".message").val(),
                    appo_id: $(".appo_id").val(),
                    user_id: $(".patientID").val(),
                    action: "configureReminder"
                }
                findSpecificReminder({
                    user_id: $(".patientID").val(),
                    appo_id: $(".appo_id").val(),
                    action: "findReminderData"
                }, res => {
                    $(".configure").attr("disabled", false);
                    if (res.hasData) {
                        displayToast("Reminder with this appointment and patient has already created", "error", 4000);
                        return;
                    }
                    $.ajax({
                        method: "POST",
                        dataType: "JSON",
                        data: data,
                        url: "../Api/appointments.api.php",
                        beforeSend: () => {
                            $(".configure").attr("disabled", true);
                        },
                        success: (res) => {
                            $(".configure").attr("disabled", false);
                            displayToast("Reminder Configured", "success", 4000);
                            $('.reminder-modal-system').modal("hide");
                        },
                        error: (res) => {
                            $(".configure").attr("disabled", false);
                            displayToast(res.responseText, "error", 5000);
                            console.log(res)
                        }
                    })
                })

            }
        })

        $(document).on("click", ".patient_name", function() {
            $(".sendEmail").prop("checked", false);
            canSend = false;
            $(".title").val("Reminder");
            $(".loop_number").val(2);
            $(".message").val("");
            loadAppointmentsForAdmin()
            setTimeout(() => {
                var state = $(this).attr("stateInfo");
                var user_id = $(this).attr("patientID");

                var appo_id = $(this).attr("appo_id");
                var data = $(this).attr("reminder_data");
                $(".patientID").val(user_id)
                $(".appo_id").val(appo_id)
                if (data == "none")
                    swal("This Patient have not any reminder method", {
                        icon: "info"
                    });
                else if (data == "call")
                    swal("it seems this method is call method, so, get the patient details and call directly", {
                        icon: "info"
                    });
                else if (state.toLowerCase() == "inprogress" || state.toLowerCase() == "completed")
                    swal("You can't remind the user, an appointment that has already completed or inprogress", {
                        icon: "info"
                    });

                else
                    $(".reminder-modal-system").modal("show")
            }, 2000);



        })

    })
</script>
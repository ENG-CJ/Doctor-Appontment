<?php
include '../include/session.php';
include_once "../include/permission.auth.php";

Permission::checkAuthPermissionSource("patient");
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
        <div class="info-message">

        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Appointments</h5>
                        <button id="addNew" data-toggle="modal" data-target="#exampleModal" class="btn btn-dark float-right booking">
                            <i class="fa-regular fa-calendar-check mr-2 text-light"></i>
                            Make Booking</button>
                    </div>
                    <div class="card-block table-border-style p-3">
                        <div class="table-responsive list_appointments">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <!-- <th>Time</th> -->
                                        <th>Diagnose</th>
                                        <th>Doctor</th>
                                        <!-- <th>Patient</th> -->
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>

                            </table>
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
                    <input type='text' hidden class='id mr-2' id="show" />

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
<div class="modal fade bd-example-modal-lg reviewModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" hidden class='id-value'>
                <input type="text" hidden class='appo_id'>
                <strong class='mb-2'> Please provide your feedback on whether you are satisfied or unsatisfied with the doctor's appointment.</strong>
                <br> <button class='btn btn-outline-success satisfied'><i class="fa-solid fa-thumbs-up mr-2"></i></button>
                <button class='btn btn-outline-danger unsatisfied'><i class="fa-solid fa-thumbs-down"></i></button>

            </div>
            <div class="modal-footer">


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
                    <strong>You can only print the appointment details after the doctor has confirmed it. Printing is not available for appointments that are still pending confirmation</strong>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary ok">Ok</button>
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
        var method = '';
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
        // $(document).on("click", 'a.completedReview', function() {
        //     $('.reviewModal').modal("show")

        // })

        $(document).on("click", "a.completedReview", function() {
            var id = $(this).attr("rev");
            fetchAppointment(id, res => {
                $('.id-value').val(res.data[0].dr_id)
                $('.appo_id').val(id)
                $(".reviewModal").modal("show")
            })


        })
        $('.satisfied').click(() => {
            validateReview(res => {
                if (res.data.length > 0) {
                    swal("Oops!", "Since you have already provided a review for the appointment, it is not possible to submit a second review for the same appointment. Thank you for your feedback.", "error");
                    return;
                }
                $('.reviewModal').modal("hide")
                swal("Could you please provide a brief description of the reasons for your satisfaction?", {
                        content: "input",
                    })
                    .then((value) => {
                        if (value == "") {
                            swal(
                                "We could'nt Processed your action, please provide description", "", "error", {

                                });
                            return;
                        }
                        makeReview("satisfied", value)
                        swal(
                            "Thank you for feedback!", "", "success", {

                            });
                    });

                // makeReview("satisfied")
                // swal(
                //     "Thank you for feedback!", "", "success", {});
            })

        })
        $('.unsatisfied').click(() => {
            validateReview(res => {
                if (res.data.length > 0) {
                    swal(
                        "Oops!", "Since you have already provided a review for the appointment, it is not possible to submit a second review for the same appointment. Thank you for your feedback.",
                        "error", {

                        });
                    return;
                }
                $('.reviewModal').modal("hide")
                swal("Could you please provide a brief description of the reasons for your dissatisfaction?", {
                        content: "input",
                    })
                    .then((value) => {
                        if (value == "") {
                            swal(
                                "We could'nt Processed your action, please provide description", "", "error", {

                                });
                            return;
                        }
                        makeReview("unsatisfied", value)
                        swal(
                            "Thank you for feedback!", "", "success", {

                            });
                    });

            })

        })




        function makeReview(review, description = '') {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "makeReview",
                    review: review,
                    description: description,
                    id: $('.id-value').val(),
                    appo_id: $('.appo_id').val(),
                },
                url: "../Api/appointments.api.php",
                success: (res) => {
                    $('.reviewModal').modal("hide")
                    // alert(res.message)
                },
                error: (res) => {
                    console.log(res)
                }
            })
        }

        function validateReview(response) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "validateReview",
                    appo_id: $('.appo_id').val()

                },
                url: "../Api/appointments.api.php",
                success: (res) => {

                    response(res)
                },
                error: (res) => {
                    console.log(res)
                }
            })
        }

        function fetchAppointment(id, response) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "fetchAppointment",
                    id: id
                },
                url: "../Api/appointments.api.php",
                success: (res) => {

                    response(res)
                },
                error: (res) => {
                    console.log(res)
                }
            })
        }


        $('.edit').click(() => {
            if ($('.doctors').val() == "" || $('.date').val() == "" || $('.diagnose').val() == "" ||
                $('.description').val() == "")
                alert("In order to update an appointment, please ensure that all the required fields are filled and not left empty.")
            else {

                var data = {
                    date: $(".date").val(),
                    diagnose: $(".diagnose").val(),
                    dr: $(".doctors").val(),
                    reminder: method,
                    id: $(".id").val(),
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
                        displayToast("Appointment has been updated", "success", 4000)
                        $(".editAppointmentModal").modal("hide");
                    },
                    error: (res) => {
                        console.log(res)
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
                            if (res.data.length > 1) {
                                $(".date").attr("disabled", false)
                                var op = `<option value=''>Select Appointment Date</option>`
                                res.data.forEach(value => {
                                    op += ` <option value='${value.date}'>${value.date}</option>`

                                })
                                $('.date').css({
                                    border: "1px solid grey"
                                })
                                $(".date").html(op)

                            } else {
                                $(".date").attr("disabled", true)
                                option = `<option value='${res.data[0].date}'>${res.data[0].date}</option>`
                                $('.date').html(option)
                                $('.date').css({
                                    border: "1px solid grey"
                                })
                            }
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

        function getCardPriceAndTiming(date, id, response) {

            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "getCardPriceAndTiming",
                    dr: id,
                    date: date

                },
                url: "../Api/appointments.api.php",
                success: (res) => {
                    response(res)
                },
                error: (err) => {
                    console.log(err);
                }
            })
        };
        getDoctorProffision()


        $(".booking").click(() => window.location.href = "./active_doctors.php");
        $(".ok").click(() => $('.err-modal').modal("hide"));
        $(".print").click(() => {
            if ($(".state").text().toLocaleLowerCase() == "pending") {
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

                getCardPriceAndTiming(res.data[0].appo_date, res.data[0].drID, response => {

                    $('.body-content').html(`
                
                 <div class='text-center'>
                 <h4>Doctor Care Appointment</h4>
                 <span>View & Print Doctor's Data</span>
                 </div>
                <br>
                <br>
                <br>
                  <div class="mb-2">
                    <strong>Card Number : </strong><h3 class='float-right'>${res.data[0].card}</h3>
                    <p class='text-muted fw-bold'>This card number serves as your unique identifier within the appointment queue.</p>
                </div>
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
                <table style="border-collapse: collapse; width: 100%;">
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
                <div class="my-1">
                    <strong>Card Price : </strong><span>$${response.data[0].card_price}</span><br>
                    <strong>Duration in minutes : </strong><span>${response.data[0].duration}m</span>
                </div>
                <div class="my-1">
                    <strong>Confirmation Status: </strong><span class='state'>${res.data[0].status}</span>
                </div>
                <div class="my-1">
                    <strong class='text-muted'>Pointed Doctor: </strong>
                    <p>Dr. ${res.data[0].drName}, ${res.data[0].hosName}</p>


                </div>
                <hr>
                <div class="my-1">
                    <p>Processed By : <strong>Doctor Care (e-Doctor Appointment) 💖</strong></p>
                </div>
                <div class="my-2">
                    <div class="alert alert-warning">
                        <strong>Note: Please ensure that you arrive at the hospital or doctor's office on time as the card price and timing are fixed.</strong>
                    </div>
                </div>
                
                `)
                    $('.viewModal').modal("show")
                })




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
                    title: "Undo Appointment",
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
                $(".doctors").val(res.data[0].dr_id)
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
                    "action": "loadAppointmentsForPatient"
                },
                url: "../Api/appointments.api.php",
                success: (res) => {
                    var tr = "<tr>"
                    var {
                        data
                    } = res;
                    console.log("data is ", data)
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
                        tr += `<td>${value.doctor}</td>`
                        if (value.status.toLowerCase() == "pending")
                            tr += `<td class='text-danger'>${value.status}</td>`
                        else if (value.status.toLowerCase() == "completed") {
                            tr += `<td>
                            <a href="#" class='text-success fw-bold completedReview' rev=${value.appo_id}>${value.status}</a>
                            </td>`

                        } else if (value.status.toLowerCase() == "inprogress")
                            tr += `<td class='text-info'>${value.status}</td>`
                        else
                            tr += `<td class='text-danger'>${value.status}</td>`
                        tr += `<td><a class='btn btn-success text-light editAppointment' editID=${value.appo_id}>Edit</a>
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
        loadAppointments()
    })
</script>
<?php
include_once '../include/session.php';
include_once "../include/permission.auth.php";

Permission::checkAuthPermissionSource("patient");
include '../include/links.php';
include '../include/header.php';
include '../include/sidebar.php';
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">

                </div>
            </div>

        </div>
        <!-- row -->
        <h6>Make an appointment </h6>
        <p class='text-muted'>NB: This appointment will automatically or the owner disabled when the time is reached.</p>
        <div class="card border-0 bg-light" style='border-radius: 18px; box-shadow: -1px 1px 53px -1px rgba(179,180,186,0.75);
-webkit-box-shadow: -1px 1px 53px -1px rgba(179,180,186,0.75);
-moz-box-shadow: -1px 1px 53px -1px rgba(179,180,186,0.75);'>
            <div class="card-header"><strong>Selected Doctor</strong></div>
            <div class="card-body">
                <div class="row doctor_details">

                </div>
            </div>
        </div>
        <div class="card border-0 bg-light" style='border-radius: 18px; box-shadow: -1px 1px 53px -1px rgba(179,180,186,0.75);
-webkit-box-shadow: -1px 1px 53px -1px rgba(179,180,186,0.75);
-moz-box-shadow: -1px 1px 53px -1px rgba(179,180,186,0.75);'>
            <div class="card-header"><strong>Available Schedules For The Selected Doctor</strong></div>
            <div class="card-body">
                <div class="row available_schedules">
                    <table class="table table-striped">
                        <thead>
                            <tr>

                                <th scope="col">Date</th>
                                <th scope="col">From Time</th>
                                <th scope="col">To Time</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                    <div class="my-2 other-description">

                    </div>
                </div>
            </div>
        </div>
        <div class="card border-0 bg-light" style='border-radius: 18px; box-shadow: -1px 1px 53px -33px rgba(179,180,186,0.75);
-webkit-box-shadow: -1px 1px 53px -33px rgba(179,180,186,0.75);
-moz-box-shadow: -1px 1px 53px -33px rgba(179,180,186,0.75);'>
            <div class="card-header"><strong>Doctor Reviews</strong></div>
            <div class="card-body p-3">
                <div class="row p-2">
                    <table class="table-striped satisfactions">
                        <thead>
                            <tr>

                                <th scope="col">Satisfied</th>
                                <th scope="col">unsatisfied</th>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                    <div class="my-2">

                    </div>
                </div>
                <div class="row descriptions">


                </div>


            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">

                    <div class="card-block table-border-style p-3">
                        <div class="row">

                            <div class="col-6">
                                <label for="">Appointment Date (Based On Doctor Schedule)</label>
                                <!-- <input type="date" name="" id="" class='form-control date'> -->
                                <select name="" id="" class="form-control date">
                                    <!-- <option value="">Date</option> -->
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="">Diagnose</label>
                                <select name="" id="" class="form-control diagnose">
                                    <option value="">Select Doctor</option>
                                </select>
                            </div>
                            <!-- <div class="col-12 my-2">
                                <label for="">Patient</label>
                                <select name="" id="" class="form-control patients">
                                    <option value="">Select Patient</option>
                                </select>
                            </div> -->


                            <div class="col-12 mt-4">
                                <label for="">Symptoms Description *</label>
                                <textarea class='form-control description' placeholder="Please describe your symptoms in advance."></textarea>
                            </div>
                            <div class="col-12 mt-5">
                                <div class='alert alert-primary'>You can use the "reminder" method to prompt when the appointment is due.</div>
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

                            <div class="col-12 mt-4">
                                <button class='btn btn-success create'>Create</button>
                                <button class='btn btn-primary backBtn'>Back</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_GET['dr_id'])) {
?>
    <input type='text' class='dr' hidden value="<?php echo $_GET['dr_id'] ?>" />
<?php
}
if (isset($_SESSION['user_id'])) {
?>
    <input type='text' class='current_patient' hidden value="<?php echo $_SESSION['user_id'] ?>" />
<?php
}

?>
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
    $(document).ready(function() {
        var methodType = "none"
        $(".method").on("change", function(e) {
            methodType = e.target.value
        })

        function getScheduleRange(getResponse) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "getScheduleRange",
                    dr_id: $(".dr").val(),
                    date: $(".date").val(),
                },
                url: "../Api/schedule.api.php",
                success: (res) => {
                    getResponse(res);
                },
                error: (err) => {
                    console.log(err);
                }
            })

        }

        function loadDescriptions(getResponse) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "loadDescriptions",
                    dr_id: $(".dr").val(),

                },
                url: "../Api/appointments.api.php",
                success: (res) => {
                    getResponse(res);
                },
                error: (err) => {
                    console.log(err);
                }
            })

        }
        loadDescriptions(res => {
            console.log("now response is ", res)
            if (res.data.length > 0) {
                res.data.forEach(value => {
                    if (value.description != "" || value.description != null) {
                        $('.descriptions').append(`

 <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <p>${value.description}</p>
                            </div>
                        </div>
                    </div>
`)
                    }

                })
            }

        })

        function countReviews(getResponse) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "countReviews",
                    dr_id: $(".dr").val(),
                },
                url: "../Api/appointments.api.php",
                success: (res) => {
                    getResponse(res);
                },
                error: (err) => {
                    console.log(err);
                }
            })

        }
        countReviews(res => {
            var tr = "<tr>"
            tr += `<td class='text-success fw-bold'>${res.satisfied}</td>`
            tr += `<td class='text-danger fw-bold'>${res.unsatisfied}</td>`
            tr += "</tr>"

            $('.satisfactions tbody').html(tr)
        })

        function getNumberOfAppointments(getRes) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "getNumberOfAppointments",
                    dr_id: $(".dr").val(),
                    date: $(".date").val(),
                },
                url: "../Api/appointments.api.php",
                success: (res) => {
                    getRes(res);
                },
                error: (err) => {
                    console.log(err);
                }
            })

        }

        function getSpecificPatientAppointment(getRes) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "getSpecificPatient",
                    pat_id: $(".current_patient").val(),
                    date: $(".date").val(),
                    dr: $(".dr").val(),
                },
                url: "../Api/appointments.api.php",
                success: (res) => {
                    getRes(res);
                },
                error: (err) => {
                    console.log(err);
                }
            })

        }
        $(document).on("click", ".create", function() {
            if ($(".date").val() == "" || $(".diagnose").val() == "" || $(".description").val() == "" || $(".patients").val() == "" || $(".dr").val() == "") {
                displayToast("All Fields Are required", "error", 4000);
                return;
            }

            var data = {
                appointment_date: $('.date').val(),
                diagnose: $('.diagnose').val(),
                // time: formatTime($('.time').val()),
                description: $(".description").val(),
                reminder: methodType,
                // pat_id: $('.patients').val(),
                dr_id: $('.dr').val(),
                action: "makeAppointmentForPatient"
            }
            getScheduleRange(res => {
                console.log(res)
                getNumberOfAppointments(res2 => {
                    if (res.range == res2.rows) {

                        swal("No Space Available!", "The desired number of appointments has been reached for this particular schedule");
                    } else {
                        getSpecificPatientAppointment(result => {
                            if (result.rows > 0)
                                swal("Oops!", "You are not allowed to schedule multiple appointments on the same date", "error");
                            else {
                                $.ajax({
                                    method: "POST",
                                    dataType: "JSON",
                                    data: data,
                                    url: "../Api/appointments.api.php",
                                    success: (res) => {
                                        swal("Booked ✔!", "Your appointment has been scheduled..", "success");
                                    },
                                    error: (err) => {
                                        console.log(err);
                                    }
                                })
                            }

                        })

                    }
                })
            })


        });

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

        function readScheduleSelectedDoctor() {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    dr_id: $(".dr").val(),
                    action: "readScheduleSelectedDoctor",
                },
                url: "../Api/doctor.api.php",
                success: (res) => {
                    console.log(res);

                    var {
                        data
                    } = res;
                    var tr = "<tr>";
                    var option = "<option value=''>Date</option>";
                    if (data.length > 0) {
                        $(".create").attr("disabled", false)
                        $('.date').attr("disabled", false);
                        data.forEach(value => {
                            tr += `<td>${value.date}</td>`
                            tr += `<td>${value.from_time}</td>`
                            tr += `<td>${value.to_time}</td>`
                            tr += `<td>${value.available}</td>`
                            option += `<option value="${value.date}">${value.date}</option>`;
                            tr += "</tr>";
                            $('.other-description').html(`
                        Duration of this appointment will be : <strong>${value.duration}minutes</strong><br>
                       Price ($) : <strong>$${value.card_price}</strong>
                        
                        `)
                        })

                        $('.table tbody').html(tr)
                        $('.date').append(option)


                    } else {
                        $(".create").attr("disabled", true);
                        $('.date').attr("disabled", true);
                        $('.date').html("<option>No Schedule Dates Are available</option>");

                        $('.available_schedules').html(`
                        <div class='p-3'>
                        <div class='alert alert-info'>
                        <strong>At the moment, this doctor does not have a schedule in place, which means that you are unable to make any appointments.</strong>
                        
                        </div>
                        </div>
                        
                        `)
                    }




                },
                error: (err) => {
                    console.log(err);
                }
            })
        }
        readScheduleSelectedDoctor()

        $(".backBtn").click(() => window.location.href = "active_doctors.php")

        function readSelectedDoctor() {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    dr_id: $(".dr").val(),
                    action: "readSelectedDoctor",
                },
                url: "../Api/doctor.api.php",
                success: (res) => {
                    console.log(res);
                    var {
                        data
                    } = res;
                    $(".doctor_details").html(`
                    <div class="col-6">
                  <div class="all-detals d-flex">
                        <div class="left mr-3">
                        <img src="../uploads/${data[0].profile_image}" alt="" class="img-fluid" style="border-radius: 30px;border: 1px solid green; width: 220px; height: 300px">
                    </div>
                    <div class="right">
                        <strong>Full Name</strong>
                        <p class='ml-2'>${data[0].drName}</p>
                        <strong>Emergency Number</strong>
                        <p class='ml-2'>${data[0].mobile}</p>
                        <strong>Profession</strong>
                        <p class='ml-2'>${data[0].pro_name}</p>
                        <strong>Hospital (work-in)</strong>
                        <p class='ml-2'>${data[0].hosName}</p>
                    </div>
                  </div>

                    </div>
                  
                    <div class="col-6">
                        <strong>Description (Qualifications)</strong>
                        <p>${data[0].drDescription}.</p>
                    </div>
                    
                    `)

                },
                error: (err) => {
                    console.log(err);
                }
            })
        }
        readSelectedDoctor()


        function formatTime(time) {
            var time = time.split(":");
            var hours = parseInt(time[0]);
            var minutes = parseInt(time[1]);

            var modifiedHours = hours - 12;
            if (modifiedHours < 0)
                modifiedHours += 12;
            convertedTime = modifiedHours + ":" + minutes.toString().padStart(2, '0');
            console.log(hours)
            return convertedTime + getTimePeriod(hours);
        }

        function getTimePeriod(time) {
            if (parseInt(time) < 12)
                return "AM";
            return "PM";
        }
    })
</script>